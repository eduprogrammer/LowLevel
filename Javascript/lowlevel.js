/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 * */

function LowLevelException(code) {
    switch (code) {
        case 0:
            console.log('You must to load the Binary Class with the construct that has a valid binary inside.');            
            break;

        case 1:
            console.log('You must to call the Binary construct that has 2 valid binary numbers.');
            break;

        case 2:
            console.log('You must place the biggest number at the first parameter, and the smallest at the second one.');
            break;
    
        default:
            break;
    }
}

class LowLevelImplementation {
    decimalToBinary(decimal) {
        let res = "";
        let number = parseInt(decimal,10);        
        while (parseInt((number / 2),10) >= 1) {
            res += number % 2;
            number = parseInt(number/2,10);
        }
        res += number;        
        let resF = "";
        for (let i = res.length - 1; i > -1; i--) {
            resF += res[i];
        }
        return resF;
    }
}

class LowLevel {
    
    static reversed(chars) {
        let reversed = "";
        for (let i = chars.length - 1; i > -1; i--) {
            if(chars[i] == '0') {
                reversed += 0;
            } else {
                reversed += 1;
            }            
        }        
        return reversed;
    }
    
    static NumberSystem = class {                        
        static init() {            
            return new LowLevelImplementation();
        }                 
    }
}