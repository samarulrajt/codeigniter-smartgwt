<?php
class LoginService extends Controller{
	var $username;
	var $password;
	var $sess_table_name = "sys_sessions";
	var $now;


	function LoginService() {
		parent::Controller();
		$this->load->helper('json');
		$this->load->library('session');
		$this->CI =& get_instance();
		$this->CI->load->database();

		// Set the "now" time.  Can either be GMT or server time, based on the
		// config prefs.  We use this to set the "last activity" time
		$this->now = time();
	}

	public function setLogin($json)
	{
		$this->username = $json->username;
		$this->password = $json->password;
	}

	//test authorized method
	public function go($test1,$test2,$session) {
		if($this->isSessionKeyValid($session)){
			echo $test1."-Logined-".$test2;
		}
		else {
			echo "No authorization";
		}
	}


	public function doLogin() {
		if($this->username == "admin" && $this->password == "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918")
		{
			$session_id = $this->setSession($this->username);
			$jsonReq = array("session" => $session_id );
			echo jsonEncode($jsonReq);
		}
		else
		{
			echo '{"session":"@@@"}';
		}
	}

	function logout($session_id)
	{
		$this->load->database();
		$this->db->delete($this->sess_table_name, array('session_id' => $session_id));
		echo $this->db->affected_rows();
	}

	//call at login process only, with the right Authentication
	private function setSession($username)
	{
		$sessid = '';
		while (strlen($sessid) < 32)
		{
			$sessid .= mt_rand(0, mt_getrandmax());
		}

		// To make the session ID even more secure we'll combine it with the user's IP
		$agent = substr($this->CI->input->user_agent(), 0, 50);
		$sessid = md5($username.$this->CI->input->ip_address().$agent.$this->now);

		$this->userdata = array(
							'username'		=> $username,
							'session_id' 	=>$sessid,
							'ip_address' 	=> $this->CI->input->ip_address(),
							'user_agent' 	=> $agent,
							'last_activity'	=> $this->now						
		);
		//check if user already login, delete his/her session, create the new one

		if($this->isUserLogin($username)) {
			$this->killSession($username);
		}		
		$this->CI->db->query($this->CI->db->insert_string($this->sess_table_name, $this->userdata));
		return $sessid;
	}



	//use to manually check only, FIXME anti auto summit by Bot
	public function isLogin($session_id)
	{
		if($this->isSessionKeyValid($session_id))
		echo "1";
		else
		echo "0";
	}

	private function isUserLogin($username)
	{
		$sql = 'SELECT COUNT(*) as inSession FROM '.$this->sess_table_name." WHERE username = ".$this->db->escape($username);
		$inSession = 0;
		$query = $this->db->query($sql);
		foreach ($query->result() as $row)
		{
			$inSession = $row->inSession;
		}
		if($inSession == 1)
		return TRUE;
		else
		return FALSE;
	}

	private function killSession($username) {
		$sql = 'DELETE FROM '.$this->sess_table_name.' WHERE username = '.$this->db->escape($username);
		$this->db->query($sql);

	}

	public function isSessionKeyValid($session_id)
	{
		$this->load->database();
		$sql = 'SELECT COUNT(*) as inSession FROM '.$this->sess_table_name." WHERE session_id = ".$this->db->escape($session_id);
		$query = $this->db->query($sql);
		$inSession = 0;
		foreach ($query->result() as $row)
		{
			$inSession = $row->inSession;
		}
		if($inSession == 1)
		return TRUE;
		else
		return FALSE;
	}
}
?>