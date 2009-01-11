<?php
/**
 * @author Trieu
 *
 */
class JSON_RFC {
	public  $rfc_session = "";
	public  $rfc_object = "";
	public  $rfc_method = "";
	public  $rfc_data;
	public  $query_string;

	function JSON_RFC($jsonRequest) {
		$rfc = jsonDecode($jsonRequest);
		$rfc_data = new stdClass();
		if(is_string($rfc->rfc_session) && is_string($rfc->rfc_object)&& is_string($rfc->rfc_method)&& isset($rfc->rfc_data) )
		{
			$this->rfc_session = $rfc->rfc_session;
			$this->rfc_object = $rfc->rfc_object;
			$this->rfc_method = $rfc->rfc_method;
			$this->rfc_data = $rfc->rfc_data;
		}
		elseif(is_string($rfc->rfc_session) && is_string($rfc->rfc_object)&& is_string($rfc->rfc_method)&& isset($rfc->query_string) )
		{
			$this->rfc_session = $rfc->rfc_session;
			$this->rfc_object = $rfc->rfc_object;
			$this->rfc_method = $rfc->rfc_method;
			$this->query_string = $rfc->query_string;
		}
	}
}
?>