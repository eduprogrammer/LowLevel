/*
 *   Copyright 2022. Eduardo Programador
 *   www.eduardoprogramador.com
 *   consultoria@eduardoprogramador.com
 *
 *   All Rights Reserved.
 *
 * */

package com.eduardoprogramador.lowlevel;

public class LowLevel {

    public static String reversed(String chars) {
        String reversed = "";
        for (int i = chars.length() - 1; i >-1 ; i--) {
            if(chars.charAt(i) == '0') {
                reversed += 0;
            } else {
                reversed += 1;
            }
        }
        return reversed;
    }

    public static class NumberSystem {

        private NumberSystem() {}

        public static NumberSystem init() {
            return new NumberSystem();
        }

        public String decimalToBinary(String decimal) {
            String res = "";
            long number = Long.valueOf(decimal);
            while ((number / 2) >= 1) {
                res += number % 2;
                number /= 2;
            }
            res += number;
            String resF = "";
            for (int i = res.length() - 1; i > -1 ; i--) {
                resF += res.charAt(i);
            }
            return resF;
        }
    }
}
