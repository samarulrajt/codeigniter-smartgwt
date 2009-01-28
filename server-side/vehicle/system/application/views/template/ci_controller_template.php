<?php echo "<?php"?>

class <?=ucwords($object_name)?>_c extends Controller
{
    function <?=ucwords($object_name)?>_c()
    {
         parent::Controller();
         $this->load->model('<?=$object_name?>');
    }

    function create()
    {

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
                echo $row->username."<br>";
                echo $row->session_id."<br>";
                echo $row->ip_address."<br>";
                echo $row->user_agent."<br>";
                echo $row->last_activity."<br>";
            }
         }
    }

    function read()
    {
        $rows = $this-><?=$object_name?>->read();
        foreach($rows as $row)
        {
            echo $row->username."<br>";
            echo $row->session_id."<br>";
            echo $row->ip_address."<br>";
            echo $row->user_agent."<br>";
            echo $row->last_activity."<br>";
        }
    }

    function update()
    {


    }

    function delete()
    {

    }


    
}
<?php echo "?>"?>
