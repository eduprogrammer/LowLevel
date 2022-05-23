/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 * */

package com.eduardoprogramador.lowlevel;

public abstract class Number {
    protected String number;
    protected String first, second;
    protected Number(){};

    protected Number(String number) {
        this.number = number;
    }

    protected Number(String first, String second) {
        this.first = first;
        this.second = second;
    }

    /**
     * @author Eduardo Programador
     * @return The list of supported operations*
     */
    public static String[] listNumberTypes() {
        return new String[]{"Binary,Hexadecimal,Octal"};
    }

    /**
     * @author Eduardo Programador
     * @return A string of the decimal number*
     * @deprecated
     */
    protected abstract String toDecimal() throws LowLevelException;

    /**
     * @param number A binary number in String
     * @author Eduardo Programador*
     * @return A string of the decimal number
     */
    protected abstract String toDecimal(String number);

    /**
     * @author Eduardo Programador*
     * @return A string of the decimal number
     */
    protected abstract String add() throws LowLevelException;

    protected abstract String add(String numOne, String numTwo);

    protected abstract int smallest() throws LowLevelException;

    protected abstract int smallest(String numOne, String numTwo);

    protected abstract String cutZeros() throws LowLevelException;

    protected abstract String cutZeros(String number);

    protected abstract String fillWithZeros(int count) throws LowLevelException;

    protected abstract String fillWithZeros(int count, String number);

    protected abstract String subtract() throws LowLevelException;

    protected abstract String subtract(String numOne, String numTwo) throws LowLevelException;

    protected abstract String multiply() throws LowLevelException;

    protected abstract String multiply(String num, String by);

    protected abstract String divide() throws LowLevelException;

    protected abstract String divide(String numOne, String by) throws LowLevelException;

    protected abstract String modulus() throws LowLevelException;

    protected abstract String modulus(String numOne, String by) throws LowLevelException;
}
