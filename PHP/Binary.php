<?php

require 'LowLevelException.php';
require 'LowLevel.php';
require 'Number.php';

    class Binary extends Number {
        
        public function __construct($first = NULL, $second = NULL) {
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
                        $calc = (strcmp($n,'0') == 0) ? 0 : pow(2,$times);                        

                        $times++;
                        $res += $calc;
                    }
                    return (string) $res;
                }
            } else {
                $res = 0;
                $calc = 0;
                $times = 0;
                for ($i = strlen($number) - 1; $i >= 0 ; $i--) {
                    $n = $number[$i];
                    $calc = (strcmp($n,'0') == 0) ? 0 : pow(2,$times);     
                    $times++;
                    $res += $calc;
                }
                return (string) $res;
            }                                                                                
        }

        public function add($numOne = NULL, $numTwo = NULL) : string {

            if($numOne == NULL && $numTwo == NULL) {
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
                        for ($i = strlen($one) - 1; $i > -1 ; $i--) {
                            $bitOne = (strcmp($one[$i], '1') == 0) ? 1 : 0;
                            $bitTwo = (strcmp($two[$i], '1') == 0) ? 1 : 0;
        
                            $sum = $bitOne + $bitTwo;
        
                            if($next != -1) {
                                $sum += $next;
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
    
                $one = $this->cutZeros($numOne);
                $two = $this->cutZeros($numTwo);
    
                if(strlen($one) != strlen($two)) {
                    if($this->smallest($one,$two) == 0) {
                        $one = $this->fillWithZeros(strlen($two) - strlen($one),$one);
                    } else {
                        $two = $this->fillWithZeros(strlen($one) - strlen($two), $two);
                    }
                }
                for ($i = strlen($one) - 1; $i > -1 ; $i--) {
                    $bitOne = (strcmp($one[$i], '1') == 0) ? 1 : 0;
                    $bitTwo = (strcmp($two[$i], '1') == 0) ? 1 : 0;
    
                    $sum = $bitOne + $bitTwo;
    
                    if($next != -1) {
                        $sum += $next;
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
            
            if($numOne == NULL && $numTwo == NULL) {
                if($this->first == NULL || $this->second == NULL) {
                    throw new LowLevelException('1');
                } else {
        
                    $filterOne = $this->cutZeros($this->first);
                    $filterTwo = $this->cutZeros($this->second);
                    $zeroOne = 0;
                    $zeroTwo = 0;
                            
                        for ($i = 0; $i < strlen($filterOne); $i++) {
                            if(strcmp($filterOne[$i], '1') == 0) {
                                $zeroOne += $i;
                            }

                            
        
                        }
                        for ($i = 0; $i < strlen($filterTwo); $i++) {
                            if(strcmp($filterTwo[$i], '1') == 0) {
                                $zeroTwo += $i;
                            }
                        }
        
                        if($zeroOne < $zeroTwo) {
                            return 0;
                        } else {
                            return 1;
                        }
                    
        
                }
            } else if($numOne != NULL && $numTwo != NULL) {                
    
                $filterOne = $this->cutZeros($numOne);
                $filterTwo = $this->cutZeros($numTwo);
                $zeroOne = 0;
                $zeroTwo = 0;
                    
                for ($i = 0; $i <strlen($filterOne); $i++) {
                    if(strcmp($filterOne[$i], '1') == 0) {
                        $zeroOne += $i;
                    }
                    
    
                }
                for ($i = 0; $i <strlen($filterTwo); $i++) {
                    if(strcmp($filterTwo[$i], '1') == 0) {
                        $zeroTwo += $i;
                    }
                    
    
                }
                if($zeroOne < $zeroTwo) {
                    return 0;
                } else {
                    return 1;
                }
            
    
            }
        }    

        public function cutZeros($number = NULL) : string {

            if($number == NULL) {
                if($this->number == null) {
                    throw new LowLevelException('0');
                } else {
                    $res = "";
                    $cut = true;
                    $count = 0;
                    for ($i = 0; $i < strlen($this->number); $i++) {
                        if(strcmp($this->number[$i], '1') == 0) {
                            $cut = false;
                            $count= $i;
                            break;
                        }
                        
                    }
                    for ($i = $count; $i < strlen($this->number); $i++) {
                        $res .= $this->number[$i];
                    }
                    return $res;
                }
            } else if($number != NULL) {
                $num = $number;
    
                $res = "";
            $cut = true;
            $count = 0;
            for ($i = 0; $i < strlen($num); $i++) {
                if(strcmp($num[$i], '1') == 0) {
                    $cut = false;
                    $count= $i;
                    break;
                }
                
            }
            for ($i = $count; $i < strlen($num); $i++) {
                $res .= $num[$i];
            }
            return $res;
            }                
        }

        public function fillWithZeros($count, $binary = NULL) : string {

            if($binary == NULL) {
                if($this->number == NULL) {
                    throw new LowLevelException('0');
                } else {
                    $zeros = "";
                    for ($i = 0; $i < $count; $i++) {
                        $zeros .= "0";
                    }
                    return $zeros . $this->number;
                }
            } else if($binary != NULL) {
                    
                $number = $binary;
    
                $zeros = "";
            for ($i = 0; $i < $count; $i++) {
                $zeros .= "0";
            }
            return $zeros . $number;
            }        
        }

        public function not($binary = NULL) : string {

            if($binary == NULL) {
                if($this->number == NULL) {
                    throw new LowLevelException('0');
                } else {
                    $res = "";
                    for ($i = 0; $i < strlen($this->number); $i++) {
                        if(strcmp($this->number[$i],'1') == 0) {
                            $res .= 0;
                        } else {
                            $res .= 1;
                        }
        
                    }
                    return $res;
                }
            } else if($binary != NULL) {                
    
                $res = "";
            for ($i = 0; $i < strlen($binary); $i++) {
                if(strcmp($binary[$i],'1') == 0) {
                    $res .= 0;
                } else {
                    $res .= 1;
                }
    
            }
            return $res;
            }        
        }

        public function subtract($numOne = NULL, $numTwo = NULL) : string {
            if($numOne == NULL && $numTwo == NULL) {
                if($this->first == NULL || $this->second == NULL) {
                    throw new LowLevelException('1');
                }
                if($this->smallest($this->first, $this->second) == 0) {
                    throw new LowLevelException('2');
                } else {
        
                    if(strcmp($this->second, '0') == 0) {
                        return $this->first;
                    }
                                                                            
                    $this->second = $this->fillWithZeros(strlen($this->first) - strlen($this->second),$this->second);
                    $this->second = $this->not($this->second);
                    $this->second = $this->add($this->second,"1");
        
                    $prov = $this->add($this->first,$this->second);
                    $res = "";
                    for ($i = 1; i < strlen($prov); $i++) {
                        if(strcmp($prov[$i], '1') == 0) {
                            $res .= 1;
                        } else {
                            $res .= 0;
                        }
                    }
                    return $this->cutZeros($res);
                }
            } else if($numOne != NULL && $numTwo != NULL) {                
    
                if($this->smallest($numOne, $numTwo) == 0) {
                    throw new LowLevelException('2');
                } else {
        
                    if(strcmp($numTwo, '0') == 0) {
                        return $numOne;
                    }
                        
                    $numTwo = $this->fillWithZeros(strlen($numOne) - strlen($numTwo),$numTwo);
                    $numTwo = $this->not($numTwo);
                    $numTwo = $this->add($numTwo,"1");
        
                    $prov = $this->add($numOne,$numTwo);
                    $res = "";
                    for ($i = 1; $i < strlen($prov); $i++) {
                        if(strcmp($prov[$i], '1') == 0) {
                            $res .= 1;
                        } else {
                            $res .= 0;
                        }
                    }
                    return $this->cutZeros($res);
                }
            }
        }

        public function multiply($num = NULL, $by = NULL) : string {
            if($num == NULL && $by == NULL) {
                if($this->first == NULL || $this->second == NULL) {
                    throw new LowLevelException('1');
                } else {
                    if(strcmp($this->second, '1') == 0) {
                        return $this->first;
                    }
                        
                    if(strcmp($this->first, '0') == 0 || strcmp($this->second, '0') == 0) {
                        return "0";
                    }
                        
                    $twoInDecimal = $this->toDecimal($this->second);
                    $two = (int) $twoInDecimal;
                    $res = $this->first;
                    for ($i = 0; $i < $two - 1; $i++) {
                        $res = $this->add($res,$this->first);
                    }
                    return $res;
                }
            } else if($num != NULL && $by != NULL) {                
    
                if(strcmp($by, '1') == 0) {
                    return $num;
                }
                    
                if(strcmp($num,'0') == 0 || strcmp($by,'0') == 0) {
                    return "0";
                }
                
                $twoInDecimal = $this->toDecimal($by);
                $two = (int) $twoInDecimal;
                $res = $num;
                for ($i = 0; $i < $two - 1; $i++) {
                    $res = $this->add($res,$num);
                }
    
                return $res;            
            }
        }

        public function divide($numOne = NULL, $by = NULL) : string {
            if($numOne == NULL && $by == NULL) {
                if($this->first == NULL || $this->second == NULL) {
                    throw new LowLevelException('1');
                }
                $div = "";
            $quotient = "";
            $nowQuo = "";
            for ($i = 0; $i < strlen($this->first); $i++) {
                $now =  strcmp($this->first[$i],'1') == 0 ? 1 : 0;
                $div .= $now;
                if($this->smallest($div,$this->second) == 0) {
                    $quotient .= 0;
                    $nowQuo = "0";
                } else {
                    $quotient .= 1;
                    $nowQuo = "1";
                }
                $mul = $this->multiply($this->second, $nowQuo);
                $div = $this->subtract($div,$mul);
            }
            return $this->cutZeros($quotient);
            } else if($numOne != NULL && $by != NULL) {
                    
                $div = "";
            $quotient = "";
            $nowQuo = "";
            for ($i = 0; $i < strlen($numOne); $i++) {
                $now = strcmp($numOne[$i],'1') == 0 ? 1 : 0;
                $div .= $now;
                if($this->smallest($div,$by) == 0) {
                    $quotient .= 0;
                    $nowQuo = "0";
                } else {
                    $quotient .= 1;
                    $nowQuo = "1";
                }
                $mul = $this->multiply($by, $nowQuo);
                $div = $this->subtract($div,$mul);
            }
            return $this->cutZeros($quotient);
    
            }
        }

        public function modulus($numOne = NULL, $by = NULL) : string {
            if($numOne == NULL && $by == NULL) {
                if($this->first == NULL || $this->second == NULL) {
                    throw new LowLevelException('1');
                }
                $div = "";
            $quotient = "";
            $nowQuo = "";
            for ($i = 0; $i < strlen($this->first); $i++) {
                $now =  strcmp($this->first[$i],'1') == 0 ? 1 : 0;
                $div .= $now;
                if($this->smallest($div,$this->second) == 0) {
                    $quotient .= 0;
                    $nowQuo = "0";
                } else {
                    $quotient .= 1;
                    $nowQuo = "1";
                }
                $mul = $this->multiply($this->second, $nowQuo);
                $div = $this->subtract($div,$mul);
            }
            return $this->cutZeros($div);
            } else if($numOne != NULL && $by != NULL) {
                    
                $div = "";
            $quotient = "";
            $nowQuo = "";
            for ($i = 0; $i < strlen($numOne); $i++) {
                $now = strcmp($numOne[$i],'1') == 0 ? 1 : 0;
                $div .= $now;
                if($this->smallest($div,$by) == 0) {
                    $quotient .= 0;
                    $nowQuo = "0";
                } else {
                    $quotient .= 1;
                    $nowQuo = "1";
                }
                $mul = $this->multiply($by, $nowQuo);
                $div = $this->subtract($div,$mul);
            }
            return $this->cutZeros($div);
    
            }
        }
    }
?>