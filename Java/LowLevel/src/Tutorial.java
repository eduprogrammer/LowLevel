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
 *              1. Javascript
 *              2. PHP
 *              3. C++
 *              4. Ruby
 *              5. Python
 *              6. HLA (Assembly)
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

        Binary binary = new Binary();

        try {
            String res = "" + binary.modulus("101001","11");
            System.out.println(res);
        } catch (LowLevelException ex) {
            ex.printStackTrace();
        }
    }
}
