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

    toDecimal(){};
    //toDecimal(number){};

    add(){};
    //add(numOnenumTwo){};

    smallest(){};
    //smallest(numOne, numTwo){};

    cutZeros(){};
    //cutZeros(number){};

    fillWithZeros(count){};
    //fillWithZeros(count,number){};

    not(){};
    //not(binary){};

    subtract(){};
    //subtract(numOne, numTwo){};

    multiply(){};
    //multiply(num, by){};

    divide(){};
    //divide(numOne,by){};

    modulus(){};
    //modulus(numOne,by){};
}

class Binary extends Number {
    constructor(first,second) {
        super(first, second);
    }        
    
    toDecimal() {

        if(arguments.length == 0) {
            if(this.number == null) {
                throw new LowLevelException(0);
            } else {
                let res = 0;
                let calc = 0;
                let times = 0;
                for (let i = this.number.length - 1; i >= 0 ; i--) {
                    let n = this.number[i];
                    calc = (n == '0') ? 0 : Math.pow(2,times);
                    times++;
                    res += calc;
                }
                return res;
            }
        } else if(arguments.length == 1) {
            let res = 0;
        let calc = 0;
        let times = 0;
        for (let i = arguments[0].length - 1; i >= 0 ; i--) {
            let n = arguments[0][i];
            calc = (n == '0') ? 0 : Math.pow(2,times);
            times++;
            res += calc;
        }
        return res;
        }
        
    }
    

    add() {

        if(arguments.length == 0) {
            if(this.first == null || this.second == null) {
                throw new LowLevelException(1);
            } else {
                let res = "";
                let next = -1;
    
                let one = this.cutZeros(this.first);
                let two = this.cutZeros(this.second);
    
                if(one.length != two.length) {
                    if(this.smallest(one,two) == 0) {
                        one = this.fillWithZeros(two.length - one.length,one);
                    } else {
                        two = this.fillWithZeros(one.length - two.length,two);
                    }
                }
                    for (let i = one.length - 1; i > -1 ; i--) {
                        let bitOne = one[i] == '1' ? 1 : 0;
                        let bitTwo = two[i] == '1' ? 1 : 0;
    
                        let sum = bitOne + bitTwo;
    
                        if(next != -1) {
                            sum += next;
                            next = -1;
                        }
    
                        switch (sum) {
                            case 0:
                                res += 0;
                                next = -1;
                                break;
    
                            case 1:
                                res += 1;
                                next = -1;
                                break;
    
                            case 2:
                                res += 0;
                                next = 1;
                                break;
    
                            case 3:
                                res += 1;
                                next = 1;
                                break;
                        }
                    }
                    if(next != -1) {
                        res += next;
                    }
    
                return LowLevel.reversed(res);
            }
        } else if(arguments.length == 2) {
            let numOne = arguments[0];
        let numTwo = arguments[1];

        let res = "";
        let next = -1;

        let one = this.cutZeros(numOne);
        let two = this.cutZeros(numTwo);

        if(one.length != two.length) {
            if(this.smallest(one,two) == 0) {
                one = this.fillWithZeros(two.length - one.length,one);
            } else {
                two = this.fillWithZeros(one.length - two.length,two);
            }
        }
        for (let i = one.length - 1; i > -1 ; i--) {
            let bitOne = one[i] == '1' ? 1 : 0;
            let bitTwo = two[i] == '1' ? 1 : 0;

            let sum = bitOne + bitTwo;

            if(next != -1) {
                sum += next;
                next = -1;
            }

            switch (sum) {
                case 0:
                    res += 0;
                    next = -1;
                    break;

                case 1:
                    res += 1;
                    next = -1;
                    break;

                case 2:
                    res += 0;
                    next = 1;
                    break;

                case 3:
                    res += 1;
                    next = 1;
                    break;
            }
        }
        if(next != -1) {
            res += next;
        }

        return LowLevel.reversed(res);
        }        
    }
    

    smallest() {

        if(arguments.length == 0) {
            if(this.first == null || this.second == null) {
                throw new LowLevelException(1);
            } else {
    
                let filterOne = this.cutZeros(this.first);
                let filterTwo = this.cutZeros(this.second);
                let zeroOne = 0;
                let zeroTwo = 0;
                    
                    for (let i = 0; i < filterOne.length; i++) {
                        if(filterOne[i] == '1') {
                            zeroOne += i;
                        }
    
                    }
                    for (let i = 0; i < filterTwo.length; i++) {
                        if(filterTwo[i] == '1') {
                            zeroTwo += i;
                        }
                    }
    
                    if(zeroOne < zeroTwo) {
                        return 0;
                    } else {
                        return 1;
                    }
                
    
            }
        } else if(arguments.length == 2) {
            let numOne = arguments[0];
            let numTwo = arguments[1];

            let filterOne = this.cutZeros(numOne);
        let filterTwo = this.cutZeros(numTwo);
        let zeroOne = 0;
        let zeroTwo = 0;
        
            for (let i = 0; i < filterOne.length; i++) {
                if(filterOne[i] == '1') {
                    zeroOne += i;
                }

            }
            for (let i = 0; i < filterTwo.length; i++) {
                if(filterTwo[i] == '1') {
                    zeroTwo += i;
                }
            }
            if(zeroOne < zeroTwo) {
                return 0;
            } else {
                return 1;
            }
        

        }        

    }        

    cutZeros() {

        if(arguments.length == 0) {
            if(this.number == null) {
                throw new LowLevelException(0);
            } else {
                let res = "";
                let cut = true;
                let count = 0;
                for (let i = 0; i < this.number.length; i++) {
                    if(this.number[i] == '1') {
                        cut = false;
                        count= i;
                        break;
                    }
                }
                for (let i = count; i < this.number.length; i++) {
                    res += this.number[i];
                }
                return res;
            }
        } else if(arguments.length == 1) {
            let num = arguments[0];

            let res = "";
        let cut = true;
        let count = 0;
        for (let i = 0; i < num.length; i++) {
            if(num[i] == '1') {
                cut = false;
                count= i;
                break;
            }
        }
        for (let i = count; i < num.length; i++) {
            res += num[i];
        }
        return res;
        }

        
    }     
    

    fillWithZeros(count) {

        if(arguments.length == 1) {
            if(this.number == null) {
                throw new LowLevelException(0);
            } else {
                let zeros = "";
                for (let i = 0; i < count; i++) {
                    zeros += "0";
                }
                return zeros + this.number;
            }
        } else if(arguments.length == 2) {

            let count = arguments[0];
            let number = arguments[1];

            let zeros = "";
        for (let i = 0; i < count; i++) {
            zeros += "0";
        }
        return zeros + number;
        }        
    }    

    not() {

        if(arguments.length == 0) {
            if(this.number == null) {
                throw new LowLevelException(0);
            } else {
                let res = "";
                for (let i = 0; i < this.number.length ; i++) {
                    if(this.number[i] == '1') {
                        res += 0;
                    } else {
                        res += 1;
                    }
    
                }
                return res;
            }
        } else if(arguments.length == 1) {
            let binary = arguments[0];

            let res = "";
        for (let i = 0; i < binary.length; i++) {
            if(binary[i] == '1') {
                res += 0;
            } else {
                res += 1;
            }

        }
        return res;
        }        
    }        

    subtract() {
        if(arguments.length == 0) {
            if(this.first == null || this.second == null) {
                throw new LowLevelException(1);
            }
            if(this.smallest(this.first, this.second) == 0) {
                throw new LowLevelException(2);
            } else {
    
                if(this.second.localeCompare('0') == 0)
                    return this.first;
    
                this.second = this.fillWithZeros(this.first.length - this.second.length,this.second);
                this.second = this.not(this.second);
                this.second = this.add(this.second,"1");
    
                let prov = this.add(this.first,this.second);
                let res = "";
                for (let i = 1; i < prov.length; i++) {
                    if(prov[i] == '1') {
                        res += 1;
                    } else {
                        res += 0;
                    }
                }
                return this.cutZeros(res);
            }
        } else if(arguments.length == 2) {
            let numOne = arguments[0];
            let numTwo = arguments[1];

            if(this.smallest(numOne, numTwo) == 0) {
                throw new LowLevelException(2);
            } else {
    
                if(numTwo.localeCompare('0') == 0)
                    return numOne;
                numTwo = this.fillWithZeros(numOne.length - numTwo.length,numTwo);
                numTwo = this.not(numTwo);
                numTwo = this.add(numTwo,"1");
    
                let prov = this.add(numOne,numTwo);
                let res = "";
                for (let i = 1; i < prov.length; i++) {
                    if(prov[i] == '1') {
                        res += 1;
                    } else {
                        res += 0;
                    }
                }
                return this.cutZeros(res);
            }
        }
    }

    multiply() {
        if(arguments.length == 0) {
            if(this.first == null || this.second == null) {
                throw new LowLevelException(1);
            } else {
                if(this.second.localeCompare('1') == 0)
                    return this.first;
                if(this.first.localeCompare('0') == 0 || this.second.localeCompare('0') == 0)
                    return "0";
                let twoInDecimal = this.toDecimal(this.second);
                let two = parseInt(twoInDecimal,10);
                let res = this.first;
                for (let i = 0; i < two - 1; i++) {
                    res = this.add(res,this.first);
                }
                return res;
            }
        } else if(arguments.length == 2) {
            let num = arguments[0];
            let by = arguments[1];

            if(by.localeCompare('1') == 0) {
                return num;
            }
                
            if(num.localeCompare('0') == 0 || by.localeCompare('0') == 0) {
                return "0";
            }
            
            let twoInDecimal = this.toDecimal(by);
            let two = parseInt(twoInDecimal,10);
            let res = num;
            for (let i = 0; i < two - 1; i++) {
                res = this.add(res,num);
            }

            return res;            
        }
    }

    divide() {
        if(arguments.length == 0) {
            if(this.first == null || this.second == null) {
                throw new LowLevelException(1);
            }
            let div = "";
        let quotient = "";
        let nowQuo = "";
        for (let i = 0; i < this.first.length; i++) {
            let now = this.first[i].localeCompare('1') == 0 ? 1 : 0;
            div += now;
            if(this.smallest(div,this.second) == 0) {
                quotient += 0;
                nowQuo = "0";
            } else {
                quotient += 1;
                nowQuo = "1";
            }
            let mul = this.multiply(this.second, nowQuo);
            div = this.subtract(div,mul);
        }
        return this.cutZeros(quotient);
        } else if(arguments.length == 2) {
            let numOne = arguments[0];
            let by = arguments[1];

            let div = "";
        let quotient = "";
        let nowQuo = "";
        for (let i = 0; i < numOne.length; i++) {
            let now = numOne[i].localeCompare('1') == 0 ? 1 : 0;
            div += now;
            if(this.smallest(div,by) == 0) {
                quotient += 0;
                nowQuo = "0";
            } else {
                quotient += 1;
                nowQuo = "1";
            }
            let mul = this.multiply(by, nowQuo);
            div = this.subtract(div,mul);
        }
        return this.cutZeros(quotient);

        }
    }

    modulus() {
        if(arguments.length == 0) {
            if(this.first == null || this.second == null) {
                throw new LowLevelException(1);
            }
            let div = "";
        let quotient = "";
        let nowQuo = "";
        for (let i = 0; i < this.first.length; i++) {
            let now = this.first[i].localeCompare('1') == 0 ? 1 : 0;
            div += now;
            if(this.smallest(div,this.second) == 0) {
                quotient += 0;
                nowQuo = "0";
            } else {
                quotient += 1;
                nowQuo = "1";
            }
            let mul = this.multiply(this.second, nowQuo);
            div = this.subtract(div,mul);
        }
        return this.cutZeros(div);
        } else if(arguments.length == 2) {
            let numOne = arguments[0];
            let by = arguments[1];

            let div = "";
        let quotient = "";
        let nowQuo = "";
        for (let i = 0; i < numOne.length; i++) {
            let now = numOne[i].localeCompare('1') == 0 ? 1 : 0;
            div += now;
            if(this.smallest(div,by) == 0) {
                quotient += 0;
                nowQuo = "0";
            } else {
                quotient += 1;
                nowQuo = "1";
            }
            let mul = this.multiply(by, nowQuo);
            div = this.subtract(div,mul);
        }
        return this.cutZeros(div);

        }
    }
    
}
