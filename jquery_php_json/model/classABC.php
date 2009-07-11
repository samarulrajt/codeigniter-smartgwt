<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classABC
 *
 * @author Trieu
 */
class classABC {
    private $a;
    private $b;
    private $c;

    public function __construct() {
        $this->a = 0;
    }

    public function setA($a){
        $this->a = $a;
    }

    public function setB($b){
        $this->b = $b;
    }
    public function setC($c){
        $this->c = $c;
    }

    public function getA() {
        return $this->a;
    }

    public function getB() {
        return $this->b;
    }

    public function getC() {
        return $this->c;
    }


    public function getZZZ($z0,$z1){
        return "ZZZ, welcome  ".$z0." ".$z1;
    }

    public function testMe(){
        return "Test ".true;
    }
}
?>
