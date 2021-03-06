<?php
//Model is generated by MVC Schema Engine

/**
* @property CI_Loader $load
* @property CI_Input $input
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
*/ 

class Xe extends Model {

    //Type: Long
    var $STT_XE = '';

    //Type: String
    var $SO_DANG_KY_XE = '';

    //Type: String
    var $MS_MODEL_XE = '';

    //Type: String
    var $MS_THIET_BI = '';

    //Type: Integer
    var $THE_TICH_THAT = '';

    //Type:
    var $NGAY_CAP_NHAT = '';

    var $IMAGE_VEHICLE = "";


    function Xe()
    {
        parent::Model();
    }

    function read()
    {
        // BEGIN FILTER CRITERIA CHECK
        // If any of the following properties are set before Xe->get() is called from the controller then we will include
        // a where statement for each of the properties that have been set.

        if ($this->STT_XE)
        {
            $this->db->where("STT_XE", $this->STT_XE);
        }
        if ($this->SO_DANG_KY_XE)
        {
            $this->db->where("SO_DANG_KY_XE", $this->SO_DANG_KY_XE);
        }
        if ($this->MS_MODEL_XE)
        {
            $this->db->where("MS_MODEL_XE", $this->MS_MODEL_XE);
        }
        if ($this->MS_THIET_BI)
        {
            $this->db->where("MS_THIET_BI", $this->MS_THIET_BI);
        }
        if ($this->THE_TICH_THAT)
        {
            $this->db->where("THE_TICH_THAT", $this->THE_TICH_THAT);
        }
        if ($this->NGAY_CAP_NHAT)
        {
            $this->db->where("NGAY_CAP_NHAT", $this->NGAY_CAP_NHAT);
        }

        // END FILTER CRITERIA CHECK

        // This will execute the query and collect the results and other properties of the query into an object.
        $query = $this->db->get("xe");

        return $query->result();
    }

    function SO_DANG_KY_XE_suggestion() {
        $term = $this->input->post("q");
        $limit = $this->input->post("limit");

        $this->db->limit($limit);
        $this->db->like("SO_DANG_KY_XE", $term);

        $objects = $this->db->get("xe")->result();

        foreach($objects as $obj)
        {
            echo $obj->SO_DANG_KY_XE."$$".$obj->IMAGE_VEHICLE. "\n";
        }
    }


    //TODO: check XSS and SQL injection here
    function readByPagination()
    {
        $limit = $this->input->post('rows');
        $page = $this->input->post('page');
        $sidx = $this->input->post('sidx');
        $sord = $this->input->post('sord');
        $this->SO_DANG_KY_XE = $this->input->post('SO_DANG_KY_XE');

        if(!$sidx) $sidx =1;
        $count = $this->db->count_all('xe');

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

        //filter by MS_MODEL_XE
        if($this->SO_DANG_KY_XE){
            $this->db->where("SO_DANG_KY_XE = ", $this->SO_DANG_KY_XE);
        }
        $objects = $this->db->get("xe")->result();

        //echo  $this->db->last_query();

        $rows =  array();

        foreach($objects as $obj)
        {
            $cell = array();
            array_push($cell, $obj->STT_XE);
            array_push($cell, $obj->SO_DANG_KY_XE);
            array_push($cell, $obj->MS_MODEL_XE);
            array_push($cell, $obj->MS_THIET_BI);
            array_push($cell, $obj->THE_TICH_THAT);
            array_push($cell, $obj->NGAY_CAP_NHAT);
            array_push($cell, $obj->IMAGE_VEHICLE);
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
                    "SO_DANG_KY_XE" => $this->SO_DANG_KY_XE,
                    "MS_MODEL_XE" => $this->MS_MODEL_XE,
                    "MS_THIET_BI" => $this->MS_THIET_BI,
                    "THE_TICH_THAT" => $this->THE_TICH_THAT,
                    "NGAY_CAP_NHAT" => $this->NGAY_CAP_NHAT ,
                    "IMAGE_VEHICLE" => $this->IMAGE_VEHICLE
        );

        $saveSuccess = false;

        // If key was set in the controller, then we will update an existing record.
        if ($this->STT_XE)
        {
            $this->db->trans_start();
            $this->db->where("STT_XE", $this->STT_XE);
            $this->db->update("xe", $db_array);
            if($this->db->affected_rows() > 0) {
                $saveSuccess = true;
            }
            else {
                $saveSuccess = false;
            }
            $this->db->trans_complete();
        }
        else
        {
            $this->db->trans_start();
            echo $this->SO_DANG_KY_XE;
            $this->db->insert("xe", $db_array);
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
        // As long as xe->STT_XE was set in the controller, we will delete the record.
        if ($this->STT_XE) {
            $this->db->where("STT_XE", $this->STT_XE);
            $this->db->delete("xe");
            if($this->db->affected_rows() > 0) {
                $saveSuccess = true;
            }
            else {
                $saveSuccess = false;
            }
        }
        // As long as xe->SO_DANG_KY_XE was set in the controller, we will delete the record.
        if ($this->SO_DANG_KY_XE) {
            $this->db->where("SO_DANG_KY_XE", $this->SO_DANG_KY_XE);
            $this->db->delete("xe");
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