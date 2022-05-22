<?php

/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 * */

abstract class Number {
    protected $number;
    protected $first, $second;

    public function __construct($first = NULL, $second = NULL) {
        if($first == NULL && $second == NULL) {
            $this->first = NULL;
            $this->second = NULL;
        } elseif ($first != NULL && $second == NULL) {
            $this->number = $first;
            $this->second = NULL;
        } elseif ($first != NULL && $second != NULL) {
            $this->first = $first;
            $this->second = $second;
        }
    }            

    public static function listNumberTypes() : array {
        return array("Binary,Hexadecimal,Octal");        
    }

    protected abstract function toDecimal($number = NULL) : string;    

    protected abstract function add($numOne = NULL, $numTwo = NULL) : string;    

    protected abstract function smallest($numOne = NULL, $numTwo = NULL) : int;    

    protected abstract function cutZeros($number = NULL) : string;    

    protected abstract function fillWithZeros($count, $binary = NULL) : string;   
    
    protected abstract function not($binary = NULL) : string;

    protected abstract function subtract($numOne = NULL, $numTwo = NULL) : string;    

    protected abstract function multiply($num = NULL, $by = NULL) : string;    

    protected abstract function divide($numOne = NULL, $by = NULL) : string;    

    protected abstract function modulus($numOne = NULL, $by = NULL) : string;    
}

?>