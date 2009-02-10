<?php

/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
*/

class VehicleDBUtils extends Model {

	
    function VehicleDBUtils()
    {
        parent::Model();
        $this->load->helper("form");
    }

    function getform_dropdownMS_MODEL_XE()
    {
        $this->db->select("LOAI_MODEL");
        $this->db->select("MS_MODEL_XE");       
        $query = $this->db->get("model_xe");
        $options = array();
        foreach ($query->result() as $row) {
            $options[$row->MS_MODEL_XE] = $row->LOAI_MODEL." - ".$row->MS_MODEL_XE;
        }
        
        return form_dropdown("MS_MODEL_XE", $options);
    }

 

   

   
}

?>