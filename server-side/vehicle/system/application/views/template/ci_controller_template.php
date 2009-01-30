<?php echo "<?php"?>

class <?=ucwords($object_name)?>_c extends Controller
{
    function <?=ucwords($object_name)?>_c()
    {
         parent::Controller();
         $this->load->model('<?=$object_name?>');
         $this->load->helper('form');
         $this->load->helper('object2array');
    }



    private function get_form_view()
    {
        $form =  form_open();

        $form = $form . form_fieldset('<?=ucwords($object_name)?>: ');
        $form = $form . "<p>" ;

        <?php foreach($fields as $field):?>
           $form = $form . form_label('<?=$field->name?>', '<?=$field->name?>') ."\n";

           $the_field = new stdClass();
           $the_field->name = "<?=$field->name?>'";
           $the_field->style = "margin:5px;";
           $the_field->value = "";
           $the_field->id = "txt_<?=$field->name?>";
           
           $js = "onchange='<?=ucwords($object_name)?>.setData(this.name,this.value);'";
           $form = $form . form_input(parseObjectToArray($the_field), $js)."\n";;

           $form = $form . "<br>". "\n";
        <?php endforeach;?>

        $form = $form . "</p>" ;
        $form = $form . form_fieldset_close();
        $form = $form.form_close()."\n";

        return $form;
    }

    function index()
    {
        $data['form_view'] = get_form_view();
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
            echo "done";
        else
            echo "fail";
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
        $this-><?=$object_name?>->save();
    }

    function delete()
    {
    <?php foreach($fields as $field):?>
    <?php if($field->isKey): ?>
    $this-><?=$object_name?>-><?=$field->name?> = $this->input->xss_clean($this->input->post('<?=$field->name?>'));
    <?php endif;?>
    <?php endforeach;?>
        $this-><?=$object_name?>->delete();
    }


    
}
<?php echo "?>"?>
