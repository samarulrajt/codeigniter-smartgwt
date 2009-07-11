<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bookclass
 *
 * @author Trieu
 */
class Book {
    private $id;
    private $title;

    private $authors;
    private $pages;

    public function __construct() {
        ;
    }
    public function getTitle() {
        return $this->title;
    }

    public function getAuthors() {
        return $this->authors;
    }

    public function getPages() {
        return $this->pages;
    }
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthors($authors) {
        $this->authors = $authors;
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
}
?>
