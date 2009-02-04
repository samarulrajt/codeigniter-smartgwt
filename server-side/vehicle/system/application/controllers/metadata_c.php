<?php
/**
* @property CI_Loader $load
* @property CI_Form_validation $form_validation
* @property CI_Input $input
* @property CI_Email $email
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property VehicleDBUtils $VehicleDBUtils
*/ 

class Metadata_c extends Controller
{
    //message in vietnamese, TODO: add I18N later
    var $messageSuccess = "Thành công";
    var $messageFail    = "Thất bại";

    function Metadata_c()
    {
         parent::Controller();
         $this->load->model('metadata');
         $this->load->model('VehicleDBUtils');

         $this->load->helper('form');
         $this->load->helper('object2array');
         $this->load->library('form_validation');
    }



    private function get_form_view()
    {
        $attributes = array('id' => 'main_form');
        $form =  form_open("",$attributes);

        //$form = $form . form_fieldset('Metadata: ');

        $inputmask_script = "";
                   $form = $form . "<label><span>id</span>\n";

           $the_field = new stdClass();
           $the_field->name = "id";          
           $the_field->value = "";
           $the_field->id = "id";

           //add class for validation here
           $the_field->class = "input-text";
           
           $the_field->class = $the_field->class . ' required';
 $the_field->class = $the_field->class . ' number'; 

           $the_field->onchange = "Metadata.setData(this.name,this.value);";
          
           $form = $form . form_input(parseObjectToArray($the_field))."\n";;

           $form = $form . "</label>". "\n";

           //add input mask here

                   $form = $form . "<label><span>tablename</span>\n";

           $the_field = new stdClass();
           $the_field->name = "tablename";          
           $the_field->value = "";
           $the_field->id = "tablename";

           //add class for validation here
           $the_field->class = "input-text";
           
           $the_field->class = $the_field->class . ' required';
 

           $the_field->onchange = "Metadata.setData(this.name,this.value);";
          
           $form = $form . form_input(parseObjectToArray($the_field))."\n";;

           $form = $form . "</label>". "\n";

           //add input mask here

                   $form = $form . "<label><span>use_scaffolding</span>\n";

           $the_field = new stdClass();
           $the_field->name = "use_scaffolding";          
           $the_field->value = "";
           $the_field->id = "use_scaffolding";

           //add class for validation here
           $the_field->class = "input-text";
           
           $the_field->class = $the_field->class . ' required';
 $the_field->class = $the_field->class . ' number'; 

           $the_field->onchange = "Metadata.setData(this.name,this.value);";
          
           $form = $form . form_input(parseObjectToArray($the_field))."\n";;

           $form = $form . "</label>". "\n";

           //add input mask here

                
        //$form = $form . form_fieldset_close();
        $form = $form.form_close()."\n";

        $js_script = "<script type='text/javascript'>  jQuery(function($){". $inputmask_script ."});</script>" ;
        $form = $form.$js_script;
        return $form;
    }

    function index()
    {
        $data['form_view'] = $this->get_form_view();
        $this->load->view('metadata_v',$data);
        
    }  

    function readMetadata($priKey)
    {
        if(isset ($priKey))
        {
                   $this->metadata->id = $priKey;
                                                
            $rows = $this->metadata->read();
            foreach($rows as $row)
            {
                        echo $row->id."<br>";
                        echo $row->tablename."<br>";
                        echo $row->use_scaffolding."<br>";
                        }
         }
    }

    function create()
    {
                        $this->metadata->tablename = $this->input->xss_clean($this->input->post('tablename'));
                    $this->metadata->use_scaffolding = $this->input->xss_clean($this->input->post('use_scaffolding'));
            
            if($this->metadata->save())
                echo $this->messageSuccess; 
            else
                echo $this->messageFail;
           
      
    }

    function read()
    {
        //$data['objects'] = $this->metadata->read();
        $data['form_view'] = $this->get_form_view();
        $this->load->view('metadata_v',$data);
    }

    function read_json_format()
    {
        echo json_encode($this->metadata->readByPagination());
    }

    function update()
    {
        $this->metadata->id = $this->input->xss_clean($this->input->post('id'));
        $this->metadata->tablename = $this->input->xss_clean($this->input->post('tablename'));
        $this->metadata->use_scaffolding = $this->input->xss_clean($this->input->post('use_scaffolding'));
           
        if($this->metadata->save())
            echo $this->messageSuccess;
        else
            echo $this->messageFail;
        
    }

    function delete()
    {
            $this->metadata->id = $this->input->xss_clean($this->input->post('id'));
                        
        if($this->metadata->delete())
            echo $this->messageSuccess;
        else
            echo $this->messageFail;
        
    }


    
}
?>