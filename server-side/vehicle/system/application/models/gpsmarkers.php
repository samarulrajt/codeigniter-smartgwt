<?php
class Gpsmarkers extends Model {

      //Type: Long
    var $ID = '';

	  //Type: Long
    var $IDNKHT = '';

	  //Type: Float
    var $LAT = '';

	  //Type: Float
    var $LNG = '';

	  //Type: String
    var $TYPE = '';

	  //Type: Long
    var $GPS_TIME = '';

	
    function Gpsmarkers()
    {
        parent::Model();
    }

    function read()
    {
        // BEGIN FILTER CRITERIA CHECK
        // If any of the following properties are set before Gpsmarkers->get() is called from the controller then we will include
        // a where statement for each of the properties that have been set.

                if ($this->ID)
        {
            $this->db->where("ID", $this->ID);
        }
                if ($this->IDNKHT)
        {
            $this->db->where("IDNKHT", $this->IDNKHT);
        }
                if ($this->LAT)
        {
            $this->db->where("LAT", $this->LAT);
        }
                if ($this->LNG)
        {
            $this->db->where("LNG", $this->LNG);
        }
                if ($this->TYPE)
        {
            $this->db->where("TYPE", $this->TYPE);
        }
                if ($this->GPS_TIME)
        {
            $this->db->where("GPS_TIME", $this->GPS_TIME);
        }
        
        // END FILTER CRITERIA CHECK

        // This will execute the query and collect the results and other properties of the query into an object.
        $query = $this->db->get("gpsmarkers");

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
        $count = $this->db->count_all('gpsmarkers');

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
        $objects = $this->db->get("gpsmarkers")->result();
        $rows =  array();

        foreach($objects as $obj)
        {
            $cell = array();
                            array_push($cell, $obj->ID);
                            array_push($cell, $obj->IDNKHT);
                            array_push($cell, $obj->LAT);
                            array_push($cell, $obj->LNG);
                            array_push($cell, $obj->TYPE);
                            array_push($cell, $obj->GPS_TIME);
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
                    "IDNKHT" => $this->IDNKHT,
                    "LAT" => $this->LAT,
                    "LNG" => $this->LNG,
                    "TYPE" => $this->TYPE,
                    "GPS_TIME" => $this->GPS_TIME,
          );

      $saveSuccess = false;

         // If key was set in the controller, then we will update an existing record.
        if ($this->ID)
        {
            $this->db->trans_start();
            $this->db->where("ID", $this->ID);
            $this->db->update("gpsmarkers", $db_array);
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
            $this->db->insert("gpsmarkers", $db_array);
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
         // As long as gpsmarkers->ID was set in the controller, we will delete the record.
        if ($this->ID) {
            $this->db->where("ID", $this->ID);
            $this->db->delete("gpsmarkers");
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