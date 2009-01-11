<?php
require_once 'VehicleModel.php';
require_once 'LoginService.php';
require_once 'JSON_RFC.php';


class MainApp extends Controller {
	private $loginService;

	function MainApp()
	{
		parent::Controller();
		$this->load->helper('json');
		$this->load->helper('string');
		$this->load->library("parser");
		$this->load->helper('url');
		//session_start();
		$this->loginService = new LoginService();
	}

	/*	function index()
	 {
		$data['title'] = "Ung dung quan ly xe (Demo)";
		$data['heading'] = "test !!";
		$query = $this->db->query("Select * from students");
		$data['query'] = $this->db->get('students');


		$data_for_template = array('blog_entries' => array(
		array('title' => 'Title 1', 'body' => 'Body 1'),
		array('title' => 'Title 2', 'body' => 'Body 2'),
		array('title' => 'Title 3', 'body' => 'Body 3'),
		array('title' => 'Title 4', 'body' => 'Body 4'),
		array('title' => 'Title 5', 'body' => 'Body 5')
		)
		);
		//$tem = $this->parser->parse('template/blog_template', $data_for_template, true);
		$my_data = array(
		array(
		'id' => 1,
		'name' => 'Yakko Warner' ),
		array(
		'id' => 2,
		'name' => 'Wakko Warner' ),
		array(
		'id' => 3,
		'name' => 'Dot Warner' )
		);

		$this->json = json_init();

		$modelxe = new stdClass();
		$modelxe->vehicleModelID = 1001;

		$obj = new stdClass();
		$obj->a_string = '"he":llo}:{world';
		$obj->an_array = array(1, 2, 3);
		$obj->obj = new stdClass();
		$obj->obj->a_number = 123;



		$input = '{ "name": "Triều", "abc": 12, "foo": "'.date("Y/m/d", time()).'", "bool0": false, "bool1": true, "arr": [ 1, 2, 3, null, 5 ], "float": 1.234500 }';
		$val = json_decode3($input);

		//$data['encoded_data'] = $val->foo;// $this->json->encode($modelxe); //$query->result_array() );
		//$tem = $this->load->view('json', $data,true);
		$data['tem'] = quotes_to_entities($input);

		$this->load->view('student_view',$data);
		}*/

	function index() {
		$jsonReq = file_get_contents("php://input");
		$rfc = new JSON_RFC($jsonReq);


		//non check session here
		if ($rfc->rfc_object == "LoginService")
		{
			if(isset($rfc->rfc_data))
			{
				if($rfc->rfc_method == "doLogin")
				{
					$this->loginService->setLogin($rfc->rfc_data);
					$this->loginService->doLogin();
					return;
				}
			}

		}


		//check security key, TODO:need public/private key here
		if( $this->loginService->isSessionKeyValid($rfc->rfc_session))
		{
			//call method by using queryStringon URL
			if(isset($rfc->query_string))
			{
				redirect($rfc->rfc_object."/".$rfc->rfc_method.$rfc->query_string.$rfc->rfc_session);
				return;
			}
			//call method by sending JSON object to server
			//so we need find object and its method manually
			elseif(isset($rfc->rfc_data))
			{					
				if($rfc->rfc_object == "VehicleModel")
				{
					$obj = new VehicleModel();
					if($rfc->rfc_method == "add")
					{
						$newdata = array(   'username'  => 'johndoe',
					                   'email'     => 'johndoe@some-site.com',
					                   'logged_in' => TRUE
						);

						//$this->session->set_userdata($newdata);
						//$session_id = $this->session->userdata('session_id');
						//$_SESSION["johndoe"] = $session_id;
						//echo $session_id;
						$obj->add($rfc->rfc_data);
					}
					elseif ($rfc->rfc_method == "insertModelVehicle") {
						echo "OK";
					}
				}
			}

		}
		else {
			echo "YOU HAVE NO ANTHENTICATION !";
		}

	}



	function getStudent($sessionID)
	{
		if(isset($_SESSION['johndoe']))
		{
			if($_SESSION["johndoe"] == $sessionID )
			echo 'Login OK';
		}
		else
		echo 'Login FAIL';
	}


}

?>