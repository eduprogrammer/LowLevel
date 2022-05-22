<?php

class LowLevelImplementation {

    public function __construct(){}

    public function decimalToBinary($decimal) : string {
        $res = "";
        $number = (int) $decimal;        
        
        while ((int) ($number / 2) >= 1) {
            $res .= $number % 2;
            $number = (int) ($number/2);
        }
        $res .= $number;        
        $resF = "";
        for ($i = strlen($res) - 1; $i > -1; $i--) {
            $resF .= $res[$i];
        }
        return $resF;
    }
}

class LowLevel {

    public function __construct(){}
    
    public static function reversed($chars) : string {
        $reversed = "";
        for ($i = strlen($chars) - 1; $i > -1; $i--) {
            if(strcmp($chars[$i], '0') == 0) {
                $reversed .= '0';
            } else if(strcmp($chars[$i], '1') == 0)  {
                $reversed .= '1';
            }            
        }        
        return $reversed;
    }
    
    public static function NumberSystem_init() : LowLevelImplementation {                                      
            return new LowLevelImplementation();
        
    }
}
?>