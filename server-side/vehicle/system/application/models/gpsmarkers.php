<?php
class Gpsmarkers extends Model {

      //Type: Long
    var $ID = '';

	  //Type: Long
    var $IDNKHT = '';

	  //Type: 
    var $LAT = '';

	  //Type: 
    var $LNG = '';

	  //Type: String
    var $TYPE = '';

	  //Type: Long
    var $GPS_TIME = '';

	
    function Gpsmarkers()
    {
        parent::Model();
    }

    function getGpsmarkersObject()
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


                       if ($this->ID)
          {
            return ($query->row());
          }
          else
          {
            return ($query->result());
          }
                                                                              
        
        foreach($query->result() as $row)
        {
                        echo $row->ID."<br>";
                        echo $row->IDNKHT."<br>";
                        echo $row->LAT."<br>";
                        echo $row->LNG."<br>";
                        echo $row->TYPE."<br>";
                        echo $row->GPS_TIME."<br>";
                    }
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

         // If key was set in the controller, then we will update an existing record.
        if ($this->ID)
        {
            $this->db->where("ID", $this->ID);
            $this->db->update("gpsmarkers", $db_array);
        }
        // If key was not set in the controller, then we will insert a new record.
        else
        {
            $this->db->insert("gpsmarkers", $db_array);
        }
           
    }


    function delete()
    {
         // As long as gpsmarkers->ID was set in the controller, we will delete the record.
        if ($this->ID) {
            $this->db->where("ID", $this->ID);
            $this->db->delete("gpsmarkers");
        }
      
    }
}

?>