/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 *  To do:
 *      Binary
 *          - Subtract
 *          - Multiply
 *          - Divide
 *
 *      Hexadecimal
 *          - (All)
 *
 *      Octal
 *          - (All)
 *
 * */

import com.eduardoprogramador.lowlevel.Binary;
import com.eduardoprogramador.lowlevel.LowLevelException;

public class Tutorial {
    public static void main(String[] args) {

        Binary binary = new Binary("100110");

        try {
            String res = "" + binary.not();
            System.out.println(res);
        } catch (LowLevelException ex) {
            ex.printStackTrace();
        }
    }
}
