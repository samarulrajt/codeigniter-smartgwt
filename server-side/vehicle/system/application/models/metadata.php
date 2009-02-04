<?php
/**
* @property CI_Loader $load
* @property CI_Input $input
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
*/ 

class Metadata extends Model {

      //Type: Integer
    var $id = '';

	  //Type: String
    var $tablename = '';

	  //Type: Byte
    var $use_scaffolding = '';

	
    function Metadata()
    {
        parent::Model();
    }

    function read()
    {
        // BEGIN FILTER CRITERIA CHECK
        // If any of the following properties are set before Metadata->get() is called from the controller then we will include
        // a where statement for each of the properties that have been set.

                if ($this->id)
        {
            $this->db->where("id", $this->id);
        }
                if ($this->tablename)
        {
            $this->db->where("tablename", $this->tablename);
        }
                if ($this->use_scaffolding)
        {
            $this->db->where("use_scaffolding", $this->use_scaffolding);
        }
        
        // END FILTER CRITERIA CHECK

        // This will execute the query and collect the results and other properties of the query into an object.
        $query = $this->db->get("metadata");

        return $query->result();
    }


    //TODO: check XSS and SQL injection here
    function readByPagination()
    {
        $limit = $this->input->post('rows');
        $page = $this->input->post('page');
        $sidx = $this->input->post('sidx');
        $sord = $this->input->post('sord');

        if(!$sidx) $sidx =1;
        $count = $this->db->count_all('metadata');

        if( $count >0 ) {
            $total_pages = ceil($count/$limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page=$total_pages;
        $start = $limit * $page - $limit;

        $this->db->limit($limit, $start);
        $this->db->order_by("$sidx", "$sord");
        $objects = $this->db->get("metadata")->result();
        $rows =  array();

        foreach($objects as $obj)
        {
            $cell = array();
                            array_push($cell, $obj->id);
                            array_push($cell, $obj->tablename);
                            array_push($cell, $obj->use_scaffolding);
                        $row = new stdClass();
            $row->id = $cell[0];
            $row->cell = $cell;
            array_push($rows, $row);
        }

        $jsonObject = new stdClass();
        $jsonObject->page =  $page;
        $jsonObject->total = $total_pages;
        $jsonObject->records = $count;
        $jsonObject->rows = $rows;      



        return $jsonObject;
    }

    function save()
    {
        // When we insert or update a record in CodeIgniter, we pass the results as an array:
        $db_array = array(
                    "tablename" => $this->tablename,
                    "use_scaffolding" => $this->use_scaffolding,
          );

      $saveSuccess = false;

         // If key was set in the controller, then we will update an existing record.
        if ($this->id)
        {
            $this->db->trans_start();
            $this->db->where("id", $this->id);
            $this->db->update("metadata", $db_array);
            if($this->db->affected_rows() > 0) {
                $saveSuccess = true;
            }
            else {
                $saveSuccess = false;
            }
            $this->db->trans_complete();
        }
        // If key was not set in the controller, then we will insert a new record.
        else
        {
            $this->db->trans_start();
            $this->db->insert("metadata", $db_array);
            if($this->db->affected_rows() > 0) {
                $saveSuccess = true;
            }
            else {
                $saveSuccess = false;
            }
            $this->db->trans_complete();
        }
   
        return $saveSuccess;
    }


    function delete()
    {
        $saveSuccess = false;
         // As long as metadata->id was set in the controller, we will delete the record.
        if ($this->id) {
            $this->db->where("id", $this->id);
            $this->db->delete("metadata");
            if($this->db->affected_rows() > 0) {
                $saveSuccess = true;
            }
            else {
                $saveSuccess = false;
            }
        }
           return $saveSuccess;
    }
}

?>