<?php

require 'LowLevelException.php';
require 'LowLevel.php';
require 'Number.php';

    public class Binary extends Number {
        
        public function __construct($first, $second) {
            parent::__construct($first, $second);
        }

        public function toDecimal($number = NULL) : string {

            if($number == NULL) {
                if($this->number == NULL) {
                    throw new LowLevelException('0');
                } else {
                    $res = 0;
                    $calc = 0;
                    $times = 0;
                    for ($i = strlen($this->number) - 1 ; $i >= 0 ; $i--) {
                        $n = $this->number[$i];
                        $calc = (n == '0') ? 0 : pow(2,$times);
                        $times++;
                        $res .= $calc;
                    }
                    return $res;
                }
            } else {
                $res = 0;
                $calc = 0;
                $times = 0;
                for ($i =  strlen($number) - 1; $i >= 0 ; $i--) {
                    $n = $number[$i];
                    $calc = (n == '0') ? 0 : pow(2,$times);
                    $times++;
                    $res .= $calc;
                }
                return $res;
            }                                                                                
        }

        public function add($numOne = NULL, $numTwo = NULL) : string {

            if($numOne == NULL || $numTwo ==NULL) {
                if($this->first == NULL || $this->second == NULL) {
                    throw new LowLevelException('1');
                } else {
                    $res = "";
                    $next = -1;
        
                    $one = $this->cutZeros($this->first);
                    $two = $this->cutZeros($this->second);
        
                    if(strlen($one) != strlen($two) ) {
                        if($this->smallest($one,$two) == 0) {
                            $one = $this->fillWithZeros(strlen($two) - strlen($one), $one);
                        } else {
                            $two = $this->fillWithZeros(strlen($one) - strlen($two), $two);
                        }
                    }
                        for ($i =strlen($one) - 1; $i > -1 ; $i--) {
                            $bitOne = $one[$i] == '1' ? 1 : 0;
                            $bitTwo = $two[$i] == '1' ? 1 : 0;
        
                            $sum = $bitOne + $bitTwo;
        
                            if($next != -1) {
                                $sum .= next;
                                $next = -1;
                            }
        
                            switch ($sum) {
                                case 0:
                                    $res .= 0;
                                    $next = -1;
                                    break;
        
                                case 1:
                                    $res .= 1;
                                    $next = -1;
                                    break;
        
                                case 2:
                                    $res .= 0;
                                    $next = 1;
                                    break;
        
                                case 3:
                                    $res .= 1;
                                    $next = 1;
                                    break;
                            }
                        }
                        if($next != -1) {
                            $res .= next;
                        }
        
                    return LowLevel::reversed($res);
                }
            } else if($numOne != NULL && $numTwo != NULL) {                
    
                $res = "";
                $next = -1;
    
                $one = this->cutZeros($numOne);
                $two = this->cutZeros($numTwo);
    
                if(strlen($one) != strlen($two)) {
                    if($this->smallest($one,$two) == 0) {
                        $one = $this->fillWithZeros(strlen($two) - strlen($one),$one);
                    } else {
                        $two = $this->fillWithZeros(strlen($one) - strlen($two), $two);
                    }
                }
                for ($i = strlen($one) - 1; $i > -1 ; $i--) {
                    $bitOne = $one[$i] == '1' ? 1 : 0;
                    $bitTwo = $two[$i] == '1' ? 1 : 0;
    
                    $sum = $bitOne + $bitTwo;
    
                    if($next != -1) {
                        $sum .= $next;
                        $next = -1;
                    }
    
                    switch ($sum) {
                        case 0:
                            $res .= 0;
                            $next = -1;
                            break;
    
                        case 1:
                            $res .= 1;
                            $next = -1;
                            break;
    
                        case 2:
                            $res .= 0;
                            $next = 1;
                            break;
    
                        case 3:
                            $res .= 1;
                            $next = 1;
                            break;
                    }
                }
                if($next != -1) {
                    $res .= $next;
                }
    
                return LowLevel::reversed($res);
            }        
        }

        public function smallest($numOne = NULL, $numTwo = NULL) : int {
            //code...
        }    


    }
?>