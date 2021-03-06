<?php
//Controller is generated by MVC Schema Engine

/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property VehicleDBUtils $VehicleDBUtils
* @property Diadiem $diadiem*/ 

class c_Diadiem extends Controller
{
    //message in vietnamese, TODO: add I18N later
    var $messageSuccess = "Thành công";
    var $messageFail    = "Thất bại";

    function c_Diadiem()
    {
         parent::Controller();
         $this->load->model('diadiem');
         $this->load->model('VehicleDBUtils');

         $this->load->helper('form');
         $this->load->helper('object2array');
         $this->load->library('form_validation');
    }

    function index()
    {       
        $this->load->view('scaffolding_form/v_diadiem');        
    }  

    function readDiadiem($priKey)
    {
        if(isset ($priKey))
        {
                   $this->diadiem->diemdiemID = $priKey;
                                                                
            $rows = $this->diadiem->read();
            foreach($rows as $row)
            {
                        echo $row->diemdiemID."<br>";
                        echo $row->lat."<br>";
                        echo $row->lon."<br>";
                        echo $row->diachi."<br>";
                        }
         }
    }

    function create()
    {
                        $this->diadiem->lat = $this->input->xss_clean($this->input->post('lat'));
                    $this->diadiem->lon = $this->input->xss_clean($this->input->post('lon'));
                    $this->diadiem->diachi = $this->input->xss_clean($this->input->post('diachi'));
            
    if($this->diadiem->save())
        echo $this->messageSuccess;
    else
        echo $this->messageFail;         
      
    }

    function read()
    {
        $this->load->view('v_diadiem');
    }

    function read_json_format()
    {
        echo json_encode($this->diadiem->readByPagination());
    }

    function update()
    {
        $this->diadiem->diemdiemID = $this->input->xss_clean($this->input->post('diemdiemID'));
        $this->diadiem->lat = $this->input->xss_clean($this->input->post('lat'));
        $this->diadiem->lon = $this->input->xss_clean($this->input->post('lon'));
        $this->diadiem->diachi = $this->input->xss_clean($this->input->post('diachi'));
           
        if($this->diadiem->save())
            echo $this->messageSuccess;
        else
            echo $this->messageFail;
        
    }

    function delete()
    {
            $this->diadiem->diemdiemID = $this->input->xss_clean($this->input->post('diemdiemID'));
                                
        if($this->diadiem->delete())
            echo $this->messageSuccess;
        else
            echo $this->messageFail;
        
    }


    
}
?>