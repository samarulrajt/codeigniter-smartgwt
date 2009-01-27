<?php

class Table {
    public $table_name ;
    public $fields = array();
    private $c = 0;

    public function Table($name) {
        $this->table_name = $name;
    }
    function getFieldSize() {
        return $this->c;
    }
    public function addField($name,$type) {
        $this->fields[$this->c++] = new TableField($name,$type);
    }
}

class TableField {
    public $name ;
    public $type ;

    function TableField($name,$type) {
        $this->name = $name;
        $this->type = $type;
    }
}

class DBUtils {
    public static function MySQLTypeMapping($mysqlType) {
         //we got bigint(20),so trip it to bigint
         $pos = strpos($mysqlType, "(");
         if($pos > 0)
            $mysqlType = substr($mysqlType,0,$pos);   

         echo "<br/>type_sign: ".$mysqlType;
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
            case "real":
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




    class metadatabase extends Controller{

        function metadatabase(){
            parent::Controller();
            $this->load->database();
            $this->load->library('parser');
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
                    $table_object->addField($field->name, DBUtils::MySQLTypeMapping($field->type) );
                    echo $field->name;	echo "<br/>";
                    echo $field->type;	echo "<br/>";
                    echo $field->max_length;	echo "<br/>";
                    echo $field->primary_key;	echo "<br/>";
                }
                echo "<br/>";	echo "<br/>";

                $this->createJSO($table_object);
            } ;
        }

        function createJSOfromSchema() {
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

        function getSchema()
        {
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
                        }
                        mysql_free_result($cols);
                    }
                }
                // Output results
              
                foreach($output as $table => $cols)
                {
                    echo "===== $table =====\n";
                    $table_object = new Table($table);
                    foreach($cols as $field => $type)
                    {
                        echo "$field : $type\n";
                        $table_object->addField($field, DBUtils::MySQLTypeMapping($type) );
                    }
                     $this->createJSO($table_object);
                }
            }

            // Free result
            if($result)
            mysql_free_result($result);
            // Close connection
            if($conn)
            mysql_close($conn);

        }

        function testJSO() {
            $table_object = new Table("Employee");
            $table_object->addField("name","String");
            $table_object->addField("age","Long");
            $table_object->addField("job","String");
            echo $table_object->getFieldSize();
            $this->createJSO($table_object);
        }

    /**
     * @param $table
     * @return unknown_type
     */
        function createJSO($table_object){
            echo "<h3>Created object: ".$table_object->table_name."</h3>";
            $metadata['object_name'] = $table_object->table_name;
            $metadata['fields'] = $table_object->fields;
            $stringData = $this->load->view('java_template/jso_template', $metadata, true);
            $this->createFile($table_object->table_name,$stringData);
        }

    /**
     * @param $filename
     * @param $stringData
     * @return unknown_type
     */
        function createFile($filename,$stringData) {
            $ourFileName = "javaORmapping/".$filename.".java";
            $fh = fopen($ourFileName, 'w') or die("can't open file");
            fwrite($fh, $stringData);
            fclose($fh);

        }



    }
    ?>