<?php

class Upload extends Controller {

    public static $upload_path = './resources/images/';

	function Upload()
	{
		parent::Controller();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('utils/upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = Upload::$upload_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
        $config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('utils/upload_form', $error);
		}
		else
		{
            $arr_rs = $this->upload->data();
            $img_src = base_url()."resources/images/".$arr_rs['file_name'];
			$data = array('upload_data' => $arr_rs , "img_src" => $img_src );

			$this->load->view('utils/upload_success', $data);
		}
	}
}
?>