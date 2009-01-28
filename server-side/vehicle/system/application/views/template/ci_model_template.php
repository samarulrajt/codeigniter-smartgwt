<?php echo "<?php"?>

class <?=ucwords($object_name)?> extends Model {

    <?php foreach($fields as $field):?>
  //<?php echo "Type: ".$field->type."\n"  ?>
    var $<?=$field->name?> = '';

	<?php endforeach;?>

    function <?=ucwords($object_name)?>()
    {
        parent::Model();
    }

    function read()
    {
        // BEGIN FILTER CRITERIA CHECK
        // If any of the following properties are set before <?=ucwords($object_name)?>->get() is called from the controller then we will include
        // a where statement for each of the properties that have been set.

        <?php foreach($fields as $field):?>
        if ($this-><?=$field->name?>)
        {
            $this->db->where("<?=$field->name?>", $this-><?=$field->name?>);
        }
        <?php endforeach;?>

        // END FILTER CRITERIA CHECK

        // This will execute the query and collect the results and other properties of the query into an object.
        $query = $this->db->get("<?=($object_name)?>");

        return $query->result();
    }

    function save()
    {
        // When we insert or update a record in CodeIgniter, we pass the results as an array:
        $db_array = array(
<?php foreach($fields as $field):?>
    <?php if(!$field->isKey): ?>
            "<?=$field->name?>" => $this-><?=$field->name?>,
    <?php endif;?>
<?php endforeach;?>
      );

<?php foreach($fields as $field):?>
 <?php if($field->isKey): ?>
        // If key was set in the controller, then we will update an existing record.
        if ($this-><?=$field->name?>)
        {
            $this->db->where("<?=$field->name?>", $this-><?=$field->name?>);
            $this->db->update("<?=($object_name)?>", $db_array);
        }
        // If key was not set in the controller, then we will insert a new record.
        else
        {
            $this->db->insert("<?=($object_name)?>", $db_array);
        }
 <?php endif;?>
<?php endforeach;?>     
    }


    function delete()
    {
<?php foreach($fields as $field):?>
 <?php if($field->isKey): ?>
        // As long as <?=($object_name)?>-><?=$field->name?> was set in the controller, we will delete the record.
        if ($this-><?=$field->name?>) {
            $this->db->where("<?=$field->name?>", $this-><?=$field->name?>);
            $this->db->delete("<?=($object_name)?>");
        }
 <?php endif;?>
<?php endforeach;?>

    }
}

<?php echo "?>"?>
