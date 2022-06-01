#/*
#*   Copyright 2022. Eduardo Programador
#*   www.eduardoprogramador.com
#*   consultoria@eduardoprogramador.com
#*
#*   All Rights Reserved.
#*
#* */

from Number import *

class Binary(Number):

    def __init__(self, number = None, first = None, second = None):
        if first is not None and second is not None:
            super().__init__(None, first,second)
        elif number is not None:
            super().__init__(number)
        else:
            super().__init__()

    def toDecimal(self,number = None):

        if number is None:
            if self._number is None:
                raise LowLevelException(
                    "You must to load the Binary Class with the construct that has a valid binary inside.")
            else:
                res = 0
                calc = 0
                times = 0
                i = len(self._number) - 1
                while i >= 0:
                    n = self._number[i]
                    calc = 0 if n == '0' else pow(2, times)
                    times += 1
                    res += calc
                    i -= 1

                return str(res)
        else:
            res = 0
            calc = 0
            times = 0
            i = len(number) - 1
            while i >= 0:
                n = number[i]
                calc = 0 if n == '0' else pow(2, times)
                times += 1
                res += calc
                i -= 1
            return str(res)

    def cutZeros(self, number=None):
        if number is None:
            if self._number is None:
                raise LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.")
            else:
                res = ""
                cut = True
                count = 0
                i = 0
                while i < len(self._number):
                    if self._number[i] == '1':
                        cut = False
                        count= i
                        break;
                    i += 1

                i = count
                while i < len(self._number):
                    res += str(self._number[i])
                    i += 1
                return res

        else:
            res = ""
            cut = True
            count = 0
            i = 0
            while i < len(number):
                if number[i] == '1':
                    cut = False
                    count = i
                    break;
                i += 1

            i = count
            while i < len(number):
                res += str(number[i])
                i += 1
            return res

    def fillWithZeros(self, count, number=None):

        if number is None:
            if self._number is None:
                raise LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.")
            else:
                zeros = ""
                i = 0
                while i < count:
                    zeros += "0"
                    i += 1
                return zeros + self._number;
        else:
            zeros = ""
            i = 0
            while i < count:
                zeros += "0"
                i += 1
            return zeros + number;

    def smallest(self, numOne=None, numTwo=None):
        if numOne is None or numTwo is None:
            if self._first is None or self._second is None:
                raise LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.")
            else:
                one = self.cutZeros(self._first)
                two = self.cutZeros(self._second)

                if int(self.toDecimal(one)) <= int(self.toDecimal(two)):
                    return 0
                else:
                    return 1
        else:
            one = self.cutZeros(numOne)
            two = self.cutZeros(numTwo)

            if int(self.toDecimal(one)) <= int(self.toDecimal(two)):
                return 0
            else:
                return 1

    def NOT(self, binary=None):
        if binary is None:
            if self._number is None:
                raise LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.")
            else:
                res = ""
                i = 0
                while i < len(self._number):
                    if self._number[i] == '1':
                        res += "0"
                    else:
                        res += "1"
                    i += 1
                return res
        else:
            res = ""
            i = 0
            while i < len(binary):
                if binary[i] == '1':
                    res += "0"
                else:
                    res += "1"
                i += 1
            return res

    #code add, subtract, divide, modulus and adjust smallest method in Java, C++, PHP, Ruby and Javascript

