/*
*   Copyright 2022. Eduardo Programador
*   www.eduardoprogramador.com
*   consultoria@eduardoprogramador.com
*
*   All Rights Reserved.
*
* */

package com.eduardoprogramador.lowlevel;

public class Binary extends Number {
    public Binary() {
        super();
    }

    public Binary(String number) {
        super(number);
    }

    public Binary(String first, String second) {
        super(first, second);
    }

    @Override
    public String toDecimal() throws LowLevelException {
        if(this.number == null) {
            throw new LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.");
        } else {
            double res = 0;
            double calc = 0;
            int times = 0;
            for (int i = number.length() - 1; i >= 0 ; i--) {
                char n = number.charAt(i);
                calc = (n == '0') ? 0 : Math.pow(2,times);
                times++;
                res += calc;
            }
            return Double.toString(res).split("\\.")[0];
        }
    }

    @Override
    public String toDecimal(String number) {
        double res = 0;
        double calc = 0;
        int times = 0;
        for (int i = number.length() - 1; i >= 0 ; i--) {
            char n = number.charAt(i);
            calc = (n == '0') ? 0 : Math.pow(2,times);
            times++;
            res += calc;
        }
        return Double.toString(res).split("\\.")[0];
    }

    @Override
    public String add() throws LowLevelException {
        if(first == null || second == null) {
            throw new LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.");
        } else {
            String res = "";
            int next = -1;

            String one = cutZeros(first);
            String two = cutZeros(second);

            if(one.length() != two.length()) {
                if(smallest(one,two) == 0) {
                    one = fillWithZeros(two.length() - one.length(),one);
                } else {
                    two = fillWithZeros(one.length() - two.length(),two);
                }
            }
                for (int i = one.length() - 1; i > -1 ; i--) {
                    int bitOne = one.charAt(i) == '1' ? 1 : 0;
                    int bitTwo = two.charAt(i) == '1' ? 1 : 0;

                    int sum = bitOne + bitTwo;

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

    @Override
    public String add(String numOne, String numTwo) {

        String res = "";
        int next = -1;

        String one = cutZeros(numOne);
        String two = cutZeros(numTwo);

        if(one.length() != two.length()) {
            if(smallest(one,two) == 0) {
                one = fillWithZeros(two.length() - one.length(),one);
            } else {
                two = fillWithZeros(one.length() - two.length(),two);
            }
        }
        for (int i = one.length() - 1; i > -1 ; i--) {
            int bitOne = one.charAt(i) == '1' ? 1 : 0;
            int bitTwo = two.charAt(i) == '1' ? 1 : 0;

            int sum = bitOne + bitTwo;

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

    @Override
    public int smallest() throws LowLevelException {

        if(first == null || second == null) {
            throw new LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.");
        } else {

            String filterOne = cutZeros(first);
            String filterTwo = cutZeros(second);
            int zeroOne = 0;
            int zeroTwo = 0;


            if(filterOne.length() < filterTwo.length()) {
                return 0;
            } else if(filterOne.length() > filterTwo.length()) {
                return 1;
            } else {
                for (int i = 0; i < filterOne.length(); i++) {
                    if(filterOne.charAt(i) == '0') {
                        zeroOne += i;
                    }

                }
                for (int i = 0; i < filterTwo.length(); i++) {
                    if(filterTwo.charAt(i) == '0') {
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

    }

    @Override
    public int smallest(String numOne, String numTwo) {

        String filterOne = cutZeros(numOne);
        String filterTwo = cutZeros(numTwo);
        int zeroOne = 0;
        int zeroTwo = 0;


        if(filterOne.length() < filterTwo.length()) {
            return 0;
        } else if(filterOne.length() > filterTwo.length()) {
            return 1;
        } else {
            for (int i = 0; i < filterOne.length(); i++) {
                if(filterOne.charAt(i) == '0') {
                    zeroOne += i;
                }

            }
            for (int i = 0; i < filterTwo.length(); i++) {
                if(filterTwo.charAt(i) == '0') {
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

    @Override
    public String cutZeros() throws LowLevelException {

        if(number == null) {
            throw new LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.");
        } else {
            String res = "";
            boolean cut = true;
            int count = 0;
            for (int i = 0; i < number.length(); i++) {
                if(number.charAt(i) == '1') {
                    cut = false;
                    count= i;
                    break;
                }
            }
            for (int i = count; i < number.length(); i++) {
                res += number.charAt(i);
            }
            return res;
        }
    }

    @Override
    public String cutZeros(String num) {
        String res = "";
        boolean cut = true;
        int count = 0;
        for (int i = 0; i < num.length(); i++) {
            if(num.charAt(i) == '1') {
                cut = false;
                count= i;
                break;
            }
        }
        for (int i = count; i < num.length(); i++) {
            res += num.charAt(i);
        }
        return res;
    }

    @Override
    public String fillWithZeros(int count) throws LowLevelException {
        if(this.number == null) {
            throw new LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.");
        } else {
            String zeros = "";
            for (int i = 0; i < count; i++) {
                zeros += "0";
            }
            return zeros + number;
        }
    }

    @Override
    public String fillWithZeros(int count,String number) {
        String zeros = "";
        for (int i = 0; i < count; i++) {
            zeros += "0";
        }
        return zeros + number;
    }

    public String not() throws LowLevelException {
        if(number == null) {
            throw new LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.");
        } else {
            String res = "";
            for (int i = number.length() - 1; i > -1 ; i--) {
                if(number.charAt(i) == '1') {
                    res += 1;
                } else {
                    res += 0;
                }

            }
            return res;
        }
    }

    public String not(String binary) {
        String res = "";
        for (int i = binary.length() - 1; i > -1 ; i--) {
            if(binary.charAt(i) == '1') {
                res += 1;
            } else {
                res += 0;
            }

        }
        return res;
    }

    @Override
    public String subtract() throws LowLevelException {
        if(first == null || second == null) {
            throw new LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.");
        }
        if(smallest(first, second) == 0) {
            throw new LowLevelException("You must place the biggest number at the first parameter, and the smallest at the second one.");
        } else {

            second = fillWithZeros(first.length() - second.length(),second);
            second = not(second);
            second = add(second,"1");

            String prov = add(first,second);
            String res = "";
            for (int i = 1; i < prov.length(); i++) {
                if(prov.charAt(i) == '1') {
                    res += 1;
                } else {
                    res += 0;
                }
            }
            return res;
        }
    }

    @Override
    public String subtract(String numOne, String numTwo) throws LowLevelException {
        if(smallest(numOne, numTwo) == 0) {
            throw new LowLevelException("You must place the biggest number at the first parameter, and the smallest at the second one.");
        } else {

            numTwo = fillWithZeros(numOne.length() - numTwo.length(),numTwo);
            numTwo = not(numTwo);
            numTwo = add(numTwo,"1");

            String prov = add(numOne,numTwo);
            String res = "";
            for (int i = 1; i < prov.length(); i++) {
                if(prov.charAt(i) == '1') {
                    res += 1;
                } else {
                    res += 0;
                }
            }
            return res;
        }
    }

    @Override
    public String multiply() throws LowLevelException {
        if(first == null || second == null) {
            throw new LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.");
        } else {
            if(second.equalsIgnoreCase("1"))
                return first;
            String twoInDecimal = toDecimal(second);
            int two = Integer.valueOf(twoInDecimal);
            String res = first;
            for (int i = 0; i < two - 1; i++) {
                res = add(res,first);
            }
            return res;
        }
    }

    @Override
    public String multiply(String num, String by) { //3,4
        if(by.equalsIgnoreCase("1"))
            return num;
        String twoInDecimal = toDecimal(by);
        int two = Integer.valueOf(twoInDecimal);
        String res = num;
        for (int i = 0; i < two - 1; i++) {
            res = add(res,num);
        }
        return res;
    }
}
