/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 * */


class Number {        

    constructor(first = '',second = '') {
        if(first.localeCompare('') == 0 && second.localeCompare('') == 0) {
            this.first = null;
            this.second = null;
        } else if(first.localeCompare('0') != 0 && second.localeCompare('') == 0) {
            this.number = first;
            this.second = null;            
        } else if(first.localeCompare('0') != 0 && second.localeCompare('0') != 0) {
            this.first = first;
            this.second = second;
        }
    }    

    static listNumberTypes() {
        return new Array("Binary,Hexadecimal,Octal");
    }

    toDecimal();
    toDecimal(number);

    add();
    add(numOnenumTwo);

    smallest();
    smallest(numOne, numTwo);

    cutZeros();
    cutZeros(number);

    fillWithZeros(count);
    fillWithZeros(count,number);

    subtract();
    subtract(numOne, numTwo);

    multiply();
    multiply(num, by);

    divide();
    divide(numOne,by);

    modulus();
    modulus(numOne,by);
}

class Binary extends Number {
    //code...
}
