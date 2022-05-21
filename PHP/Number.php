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

    public function __construct($first, $second) {
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

    protected abstract function toDecimal() : string;    

    protected abstract function add() : string;    

    protected abstract function smallest() : int;    

    protected abstract function cutZeros() : string;    

    protected abstract function fillWithZeros($count) : string;    

    protected abstract function subtract() : string;    

    protected abstract function multiply() : string;    

    protected abstract function divide() : string;    

    protected abstract function modulus() : string;    
}

?>