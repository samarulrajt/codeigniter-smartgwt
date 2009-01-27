<?php
class Sys_sessions extends Model {

      //Type: String
    var $username = '';

	  //Type: String
    var $session_id = '';

	  //Type: String
    var $ip_address = '';

	  //Type: String
    var $user_agent = '';

	  //Type: Long
    var $last_activity = '';

	
    function Sys_sessions()
    {
        parent::Model();
    }

    function getSys_sessionsObject()
    {
        // BEGIN FILTER CRITERIA CHECK
        // If any of the following properties are set before Sys_sessions->get() is called from the controller then we will include
        // a where statement for each of the properties that have been set.

                if ($this->username)
        {
            $this->db->where("username", $this->username);
        }
                if ($this->session_id)
        {
            $this->db->where("session_id", $this->session_id);
        }
                if ($this->ip_address)
        {
            $this->db->where("ip_address", $this->ip_address);
        }
                if ($this->user_agent)
        {
            $this->db->where("user_agent", $this->user_agent);
        }
                if ($this->last_activity)
        {
            $this->db->where("last_activity", $this->last_activity);
        }
        
        // END FILTER CRITERIA CHECK

        // This will execute the query and collect the results and other properties of the query into an object.
        $query = $this->db->get("sys_sessions");


                       if ($this->username)
          {
            return ($query->row());
          }
          else
          {
            return ($query->result());
          }
                                                                 
        
        foreach($query->result() as $row)
        {
                        echo $row->username."<br>";
                        echo $row->session_id."<br>";
                        echo $row->ip_address."<br>";
                        echo $row->user_agent."<br>";
                        echo $row->last_activity."<br>";
                    }
    }

    function save()
    {
        // When we insert or update a record in CodeIgniter, we pass the results as an array:
        $db_array = array(
                    "session_id" => $this->session_id,
                    "ip_address" => $this->ip_address,
                    "user_agent" => $this->user_agent,
                    "last_activity" => $this->last_activity,
          );

         // If key was set in the controller, then we will update an existing record.
        if ($this->username)
        {
            $this->db->where("username", $this->username);
            $this->db->update("sys_sessions", $db_array);
        }
        // If key was not set in the controller, then we will insert a new record.
        else
        {
            $this->db->insert("sys_sessions", $db_array);
        }
          
    }


    function delete()
    {
         // As long as sys_sessions->username was set in the controller, we will delete the record.
        if ($this->username) {
            $this->db->where("username", $this->username);
            $this->db->delete("sys_sessions");
        }
     
    }
}

?>