<?php 

/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 * */

class LowLevelException extends Exception {
    private $msg;

    public function errorMessage() {
        switch ($this->getMessage()) {
            case '0':                
                $this->msg = 'You must to load the Binary Class with the construct that has a valid binary inside. ' . $this->getLine . ' at: ' . $this->getFile();
                break;
            
            case '1':
                $this->msg = 'You must to call the Binary construct that has 2 valid binary numbers.' . $this->getLine . ' at: ' . $this->getFile();
                break;

            case '2':
                $this->msg = 'You must place the biggest number at the first parameter, and the smallest at the second one.' . $this->getLine . ' at: ' . $this->getFile();
                break;            

            default:                
                $this->msg = 'You must to load the Binary Class with the construct that has a valid binary inside.' . $this->getLine . ' at: ' . $this->getFile();
                break;
        }
        return $this->msg;
    }
}

?>