<?php

/**
 * @author Trieu
 *
 */
class VehicleModel extends Controller {
	private $vehicleModelID = -1;


	function VehicleModel(){
		parent::Controller();

		$this->load->helper('json');
		$this->load->helper('string');
		$this->load->helper('rfc_session');
		$this->load->library("parser");
		$vehicleModelID = -1;;		
	}

	function setVehicleModelID($ID)
	{
		$this->vehicleModelID = $ID;
	}

	function getVehicleModelByID($id,$session)
	{
		if(isLogin($session))
		{
			$jsonObj = new stdClass();
			$jsonObj->ID = 1001;
			$data['encoded_data'] =  jsonEncode($jsonObj);
			$this->load->view('json', $data);
		}
	}

	function add($obj)
	{
		//$obj = json_decode3($json_object);
		//$jsonReq = '{"name":"'.$obj->name.' is a man"}';
		$jsonReq = null;
		$data['encoded_data'] =  $jsonReq;
		$this->load->view('json', $data);
	}
	
	function test($session) {
		$data = strip_tags("<script>alert('hacked')</script>2 my name is ".$_POST['myname']);
		if($session === "1234")
			echo $data; 
		else
			echo "WRONG";
	}
	
}
?>