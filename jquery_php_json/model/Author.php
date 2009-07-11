<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Author
 *
 * @author Trieu
 */
class Author {
    private $id;
    private $name;
    private $description;
    
    public function getName() {
        return $this->name;
    }
    public function getDescription() {
        return $this->description;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }   
}
?>
