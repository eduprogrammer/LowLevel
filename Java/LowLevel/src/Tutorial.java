/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 *  To do:
 *
 *      Binary:
 *          Translate To:
 *              1. Ruby
 *              2. Python
 *              3. HLA (Assembly)
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

        Binary binary = new Binary("101010","101");

        try {
            String res = "" + binary.divide();
            System.out.println(res);
        } catch (LowLevelException ex) {
            ex.printStackTrace();
        }
    }
}
