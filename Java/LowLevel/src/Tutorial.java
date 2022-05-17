/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 *  To do:
 *      Binary
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

        Binary binary = new Binary("110100","11");

        try {
            String res = "" + binary.multiply();
            System.out.println(res);
        } catch (LowLevelException ex) {
            ex.printStackTrace();
        }
    }
}
