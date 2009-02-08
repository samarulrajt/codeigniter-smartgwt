<?php
/**
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property Metadata $metadata
 *
 */

class metadatabase extends Controller{

    function metadatabase(){
        parent::Controller();
        $this->load->database();
        $this->load->library('parser');
        $this->load->helper('url');
        $this->lang->load('fields','vietnamese');
        $this->load->model("metadata");
    }

    function tables() {
        $tables = $this->db->list_tables();
        foreach ($tables as $table)
        {
            echo "<h1>".$table."</h1><br/>";
            $fields = $this->db->field_data($table);
            $table_object = new Table($table);

            foreach ($fields as $field)
            {
                $table_object->addField($field->name, DBUtils::MySQLTypeMapping2Java($field->type) );
                echo $field->name;	echo "<br/>";
                echo $field->type;	echo "<br/>";
                echo $field->max_length;	echo "<br/>";
                echo $field->primary_key;	echo "<br/>";
            }
            echo "<br/>";	echo "<br/>";

            $this->createJSO($table_object);
        } ;
    }

    function testPDO() {
        $tables = $this->db->list_tables();
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=demo","trieu","1234");
            foreach ($tables as $table)
            {
                $res =  $dbh->query("SELECT * FROM ".$table);
                $ncols =  $res->columnCount();
                for ($i=0; $i < $ncols; $i++) {
                    $meta_data = $stmt->getColumnMeta($i);
                }
            }
        } catch (PDOException  $e) {
            echo "Error connection to DB ".$e->getMessage();
        }
    }

    function use_scaffolding($tablename) {
        if(isset ($tablename))  {
            $this->metadata->tablename = $tablename;
            $rows = $this->metadata->read();
            foreach($rows as $row) {                
                return $row->use_scaffolding == 1;
            }
        }
        return false;
    }

     function isInMetadata($tablename) {
        if(isset ($tablename))  {
            $this->metadata->tablename = $tablename;
            $rows = $this->metadata->read();
             if(sizeof($rows)>0) {
                return true;
            }
        }
        return false;
    }

    //the power of my solution is here
    function gwt_igniter($option)
    {
        if(!isset ($option)){
            echo "Please add your option jso or ci_model";
            return;
        }
        // Configuration
        $host = 'localhost:3306';
        $user = 'trieu';
        $pass = '1234';
        $database = 'demo';

        // Connect to the MySQL database
        $conn = mysql_connect($host, $user, $pass) or die("Could not connect to database\n");
        mysql_select_db($database, $conn) or die("Could not connect to $database\n");

        // Query to get list of tables
        $result = mysql_query("SHOW TABLES FROM $database", $conn);
        if($result)
        {
            $output = array();
            while($row = mysql_fetch_array($result))
            {
                $tableName = $row[0];
                if( $tableName== "metadata"  ) {
                    echo $tableName." <b>Skipped</b><br>";
                    continue;
                }
                else if(!$this->isInMetadata($tableName) && $option == "o") {
                    $this->metadata->tablename = $tableName;
                    $this->metadata->use_scaffolding = 0;
                    $this->metadata->save();
                }
                else if(!$this->use_scaffolding($tableName)){
                    echo $tableName." <b>Skipped</b><br>";
                    continue;
                }

                $table_object = new Table($tableName);//create table object
                if($this->lang->line($tableName)) {
                    $table_object->table_fullname = $this->lang->line($tableName);
                } else {
                    $table_object->table_fullname = $tableName;
                }
                echo "<h1>".$table_object->table_fullname."</h1>";

                // Get meta data
                $cols = mysql_query("SHOW COLUMNS FROM $tableName", $conn);
                if($cols)
                {
                    while($col = mysql_fetch_assoc($cols))
                    {
                        // Add this table to our associative array
                        if(!array_key_exists($tableName, $output)) {
                            $output[$tableName] = array();
                        }
                        // Add the column definition to our associative array
                        $output[$tableName][$col['Field']] = $col['Type'];

                        // add field for table object
                        $field_object = new TableField();

                        $field_object->name = $col['Field'];
                        $lan_key = $tableName.".".$col['Field'];
                        if($this->lang->line($lan_key)) {
                            $field_object->fullname = $this->lang->line($lan_key);
                        } else {
                            $field_object->fullname = $col['Field'];
                        }

                        $field_object->type = DBUtils::MySQLTypeMapping2Java($col['Type']);
                        $field_object->isNumber = DBUtils::isNumber($col['Type']);
                        $field_object->isDate = DBUtils::isDate($col['Type']);


                        $field_object->isString = DBUtils::isString($col['Type']);

                        if($col["Key"] == "PRI")
                        {
                            $field_object->setIsKey( true);
                        }
                        else if($col['Key'] == "MUL")
                        {
                            $field_object->setIsForeignKey(true);
                        }
                        else if($col['Key'] == "UNI")
                        {
                            $field_object->setIsUnique(true);
                        }
                        if( $col['Extra'] == "auto_increment")
                        {
                            $field_object->isAutoIncrement = true;
                        }

                        if( $col['Null'] == "NO")
                        {
                            $field_object->isRequire = true;
                        }
                        if( $col['Default'] )
                        {
                            $field_object->default = $col['Default'];
                        }

                        //add max length
                        $l = DBUtils::StringLength($col['Type']);
                        if($l > 0 )
                        {
                            $field_object->maxLength = $l;
                        }

                        $table_object->addField1($field_object);
                    }
                    mysql_free_result($cols);

                    //  if($option === "jso")
                    {
                        //   $this->createJSO($table_object);
                    }
                    //  else if($option === "ci_model")
                    {
                        $this->createCIModel($table_object);
                    }
                    //  else if($option === "ci_controller")
                    {
                        $this->createCIController($table_object);
                    }

                    {
                        $this->createCIView($table_object);
                    }

                    {
                        // $this->createCI_Language($table_object);
                    }

                    //$this->createMenu($table_object);

                    echo "<hr/>";
                }
            }
            // Output results
            foreach($output as $table => $cols)
            {
                echo "===== $table =====<br/>";
                foreach($cols as $field => $type)
                {
                    echo "$field : $type<br/>";
                }
            }
        }
        // Free result
        if($result)
        mysql_free_result($result);
        // Close connection
        if($conn)
        mysql_close($conn);
    }

    /**
     * @param $table
     * @return unknown_type
     */
    function createJSO($table_object){
        echo "<h3>Created JSO object: ".$table_object->table_name."</h3>";
        $metadata['object_name'] = $table_object->table_name;
        $metadata['fields'] = $table_object->fields;
        $stringData = $this->load->view('template/gwt_jso_template', $metadata, true);
        $this->createJavaFile($table_object->table_name,$stringData);
    }

        /**
     * @param $table
     * @return unknown_type
     */
    function createMenu($table_object){
        $metadata['object_name'] = $table_object->table_name;
        $stringData = $this->load->view('template/gwt_menu_template', $metadata, true);
        $this->appendJavaFile($table_object->table_name,$stringData);
    }

    function createCIModel($table_object) {
        echo "<h3>Created CI Model: ".$table_object->table_name."</h3>";
        $metadata['object_name'] = $table_object->table_name;
        $metadata['fields'] = $table_object->fields;
        $stringData = $this->load->view('template/ci_model_template', $metadata, true);
        $this->createPHPFile($table_object->table_name,$stringData,"model");
    }

    function createCIView($table_object) {
        echo "<h3>Created CI View: ".$table_object->table_name."</h3>";
        $metadata['object_name'] = $table_object->table_name;
        $metadata['object_fullname'] = $table_object->table_fullname;
        $metadata['fields'] = $table_object->fields;
        $stringData = $this->load->view('template/ci_view_template', $metadata, true);
        $this->createPHPFile($table_object->table_name,$stringData,"view");
    }

    function createCIController($table_object) {
        echo "<h3>Created CI Controller: ".$table_object->table_name."</h3>";
        $metadata['object_name'] = $table_object->table_name;
        $metadata['object_fullname'] = $table_object->table_fullname;
        $metadata['fields'] = $table_object->fields;
        $stringData = $this->load->view('template/ci_controller_template', $metadata, true);
        $this->createPHPFile($table_object->table_name,$stringData, "controllers");
    }

    function createCI_Language($table_object) {
        echo "<h3>Created CI Language: ".$table_object->table_name."</h3>";
        $metadata['object_name'] = $table_object->table_name;

        $metadata['fields'] = $table_object->fields;
        $stringData = $this->load->view('template/ci_language_template', $metadata, true);

        $ourFileName = "system/application/language/lang.php";
        $fh = fopen($ourFileName, 'a') or die("can't open file");
        fwrite($fh, $stringData);
        fclose($fh);
    }

    /**
     * @param $filename
     * @param $stringData
     * @return unknown_type
     */
    function createJavaFile($filename,$stringData) {
        $ourFileName = "javaORmapping/".$filename.".java";
        $fh = fopen($ourFileName, 'w') or die("can't open file");
        fwrite($fh, $stringData);
        fclose($fh);
    }

        /**
     * @param $filename
     * @param $stringData
     * @return unknown_type
     */
    function appendJavaFile($filename,$stringData) {
        $ourFileName = "javaORmapping/menu.java";
        $fh = fopen($ourFileName, 'a') or die("can't open file");
        fwrite($fh, $stringData);
        fclose($fh);
    }

    /**
     * @param $filename
     * @param $stringData
     * @return unknown_type
     */
    function createPHPFile($filename,$stringData,$type) {
        if($type === "model" )
        {
            $ourFileName = "system/application/models/".$filename.".php";
            $fh = fopen($ourFileName, 'w') or die("can't open file");
            fwrite($fh, $stringData);
            fclose($fh);
        }
        else if($type === "controllers" )
        {
            $ourFileName = "system/application/controllers/c_".$filename.".php";
            $fh = fopen($ourFileName, 'w') or die("can't open file");
            fwrite($fh, $stringData);
            fclose($fh);
        }
        else if($type === "view" )
        {
            $ourFileName = "system/application/views/scaffolding_form/v_".$filename.".php";
            $fh = fopen($ourFileName, 'w') or die("can't open file");
            fwrite($fh, $stringData);
            fclose($fh);
        }
    }


    function testJSO() {
        $table_object = new Table("Employee");
        $table_object->addField("name","String");
        $table_object->addField("age","Long");
        $table_object->addField("job","String");
        echo $table_object->getFieldSize();
        $this->createJSO($table_object);
    }

    function testModel($id) {
        $this->load->model("sys_sessions");
        $this->sys_sessions->getSys_sessionsObject();

        $this->load->model("gpsmarkers");
        $this->gpsmarkers->GPS_TIME = time();
        //$this->gpsmarkers->save();

        if(isset ($id)){
            $this->gpsmarkers->ID = $id;
            $this->gpsmarkers->delete();
        }
    }
}

class Table {
    public $table_name ;
    public $table_fullname ;
    public $fields = array();
    private $c = 0;

    public function Table($name) {
        $this->table_name = $name;
    }
    function getFieldSize() {
        return $this->c;
    }
    public function addField3($name,$type, $isKey = false) {
        $this->fields[$this->c++] = new TableField($name, $type, $isKey);
    }
    public function addField5($name,$type, $isKey = false,$isAutoIncrement = false, $default = '') {
        $this->fields[$this->c++] = new TableField($name, $type, $isKey, $isAutoIncrement, $default);
    }
    public function addField1($tablefield) {
        $this->fields[$this->c++] = $tablefield;
    }
}

class TableField {
    public $name ;
    public $fullname ;
    public $type ;// use to detect javascript object type in GWT 1.5
    public $default = "";
    public $isKey = false;
    public $isForeignKey = false;
    public $isUnique = false;
    public $isAutoIncrement = false;
    public $isRequire = false;

    public $maxLength = 0;
    public $isString = false;
    public $isNumber = false;
    public $isDate = false;

    public function setIsKey($isKey) {
        $this->isKey = $isKey;
        $this->isRequire = true;
    }
    public function setIsForeignKey($isForeignKey) {
        $this->isForeignKey = $isForeignKey;
    }
    public function setIsUnique($isUnique) {
        $this->isUnique = $isUnique;
        $this->isRequire = true;
    }
    public function setIsAutoIncrement($isAutoIncrement) {
        $this->isAutoIncrement = $isAutoIncrement;
    }

    public function setIsRequire($isRequire) {
        $this->isRequire = $isRequire;
    }
    public function setMaxLength($maxLength) {
        $this->maxLength = $maxLength;
    }

}

class DBUtils {
    public static function StringLength($mysqlType)
    {
        $start = strpos($mysqlType, "(");
        $end = strpos($mysqlType, ")");

        switch ($mysqlType) {
            case "char": case "varchar": case "longvarchar": case "text":
                            {
                                $s = substr($mysqlType,$start,$end);
                                if(is_int($s))
                                return $s + 0;
                            }
                            default:
                                break;
        }
        return 0;
    }

    public static function isNumber($mysqlType)
    {
        //we got bigint(20),so trip it to bigint
        $pos = strpos($mysqlType, "(");
        if($pos > 0)
        $mysqlType = substr($mysqlType,0,$pos);
        switch ($mysqlType) {
            case "tinyint":	case "int": case "integer":	case "bigint": case "real": case "float": case "double":
                                        {
                                            return true;
                                        }
                                        default:
                                            break;
        }
        return false;
    }

    public static function isString($mysqlType)
    {
        //we got bigint(20),so trip it to bigint
        $pos = strpos($mysqlType, "(");
        if($pos > 0)
        $mysqlType = substr($mysqlType,0,$pos);
        switch ($mysqlType) {
            case "char": case "varchar": case "longvarchar": case "text":
                            {
                                return true;
                            }
                            default:
                                break;
        }
        return false;
    }

    //TODO: is this enough ??
    public static function isDate($mysqlType)
    {
        //we got bigint(20),so trip it to bigint
        $pos = strpos($mysqlType, "(");
        if($pos > 0)
        $mysqlType = substr($mysqlType,0,$pos);
        switch ($mysqlType) {
            case "date": case "datetime":
                    {
                        return true;
                    }
                    default:
                        break;
        }
        return false;
    }

    public static function MySQLTypeMapping2Java($mysqlType) {
        //we got bigint(20),so trip it to bigint
        $pos = strpos($mysqlType, "(");
        if($pos > 0)
        $mysqlType = substr($mysqlType,0,$pos);

        //echo "<br/>type_sign: ".$mysqlType;
        switch ($mysqlType) {
            case "char": case "varchar": case "longvarchar": case "text":
            {
                return "String";
            }
            case "tinyint":
                {
                    return "Byte";
                }
            case "int": case "integer":
                    {
                        return "Integer";
                    }
            case "bigint":
                {
                    return "Long";
                }
            case "real": case "float":
                    {
                        return "Float";
                    }
            case "double":
                {
                    return "Double";
                }
                default:
                    break;
        }
        }
    }

?>