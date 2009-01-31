<?php echo "<?php"?>

class <?=ucwords($object_name)?>_c extends Controller
{
    //message in vietnamese, TODO: add I18N later
    var $messageSuccess = "Thành công";
    var $messageFail    = "Thất bại";

    function <?=ucwords($object_name)?>_c()
    {
         parent::Controller();
         $this->load->model('<?=$object_name?>');
         $this->load->helper('form');
         $this->load->helper('object2array');
         $this->load->library('form_validation');
    }



    private function get_form_view()
    {
        $attributes = array('id' => 'main_form');
        $form =  form_open("",$attributes);

        //$form = $form . form_fieldset('<?=ucwords($object_name)?>: ');

        $inputmask_script = "";
        <?php foreach($fields as $field):?>
           $form = $form . "<label><span><?=$field->name?></span>\n";

           $the_field = new stdClass();
           $the_field->name = "<?=$field->name?>";          
           $the_field->value = "";
           $the_field->id = "<?=$field->name?>";

           //add class for validation here
           $the_field->class = "input-text required number";
           $the_field->onchange = "<?=ucwords($object_name)?>.setData(this.name,this.value);";
          
           $form = $form . form_input(parseObjectToArray($the_field))."\n";;

           $form = $form . "</label>". "\n";

           //add input mask here
           $inputmask_script = $inputmask_script . "$('#<?=$field->name?>').mask('99/99/9999');";
        <?php endforeach;?>
        
        //$form = $form . form_fieldset_close();
        $form = $form.form_close()."\n";

        $js_script = "<script type='text/javascript'>  jQuery(function($){". $inputmask_script ."});</script>" ;
        $form = $form.$js_script;
        return $form;
    }

    function index()
    {
        $data['form_view'] = $this->get_form_view();
        $this->load->view('<?=$object_name?>_v',$data);
        
    }  

    function read<?=ucwords($object_name)?>($priKey)
    {
        if(isset ($priKey))
        {
        <?php foreach($fields as $field):?>
        <?php if($field->isKey): ?>
   $this-><?=$object_name?>-><?=$field->name?> = $priKey;
        <?php endif;?>
        <?php endforeach;?>

            $rows = $this-><?=$object_name?>->read();
            foreach($rows as $row)
            {
            <?php foreach($fields as $field):?>
            echo $row-><?=$field->name?>."<br>";
            <?php endforeach;?>
            }
         }
    }

    function create()
    {
    <?php foreach($fields as $field):?>
    <?php if(!$field->isKey): ?>
        $this-><?=$object_name?>-><?=$field->name?> = $this->input->xss_clean($this->input->post('<?=$field->name?>'));
    <?php endif;?>
    <?php endforeach;?>
    
            if($this-><?=$object_name?>->save())
                echo $this->messageSuccess; 
            else
                echo $this->messageFail;
           
      
    }

    function read()
    {
        //$data['objects'] = $this-><?=$object_name?>->read();
        $data['form_view'] = $this->get_form_view();
        $this->load->view('<?=$object_name?>_v',$data);
    }

    function read_json_format()
    {
        echo json_encode($this-><?=$object_name?>->readByPagination());
    }

    function update()
    {
    <?php foreach($fields as $field):?>
    $this-><?=$object_name?>-><?=$field->name?> = $this->input->xss_clean($this->input->post('<?=$field->name?>'));
    <?php endforeach;?>
       
        if($this-><?=$object_name?>->save())
            echo $this->messageSuccess;
        else
            echo $this->messageFail;
        
    }

    function delete()
    {
    <?php foreach($fields as $field):?>
    <?php if($field->isKey): ?>
    $this-><?=$object_name?>-><?=$field->name?> = $this->input->xss_clean($this->input->post('<?=$field->name?>'));
    <?php endif;?>
    <?php endforeach;?>

        if($this-><?=$object_name?>->delete())
            echo $this->messageSuccess;
        else
            echo $this->messageFail;
        
    }


    
}
<?php echo "?>"?>
