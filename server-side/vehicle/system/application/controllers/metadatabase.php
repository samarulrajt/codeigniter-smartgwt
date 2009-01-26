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
				$table_object->addField($field->name,$field->type);
				echo $field->name;	echo "<br/>";
				echo $field->type;	echo "<br/>";
				echo $field->max_length;	echo "<br/>";
				echo $field->primary_key;	echo "<br/>";
			}
			echo "<br/>";	echo "<br/>";
			
			$this->createJSO($table_object);
		} ;
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