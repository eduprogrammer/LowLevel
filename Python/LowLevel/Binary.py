#/*
#*   Copyright 2022. Eduardo Programador
#*   www.eduardoprogramador.com
#*   consultoria@eduardoprogramador.com
#*
#*   All Rights Reserved.
#*
#* */
from LowLevelException import *
from LowLevel import *
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
                filterOne = self.cutZeros(self._first)
                filterTwo = self.cutZeros(self._second)
                zeroOne = 0
                zeroTwo = 0
                i = 0
                while i < len(filterOne):
                    if filterOne[i] == '1':
                        zeroOne += i
                    i += 1

                i = 0
                while i < len(filterTwo):
                    if filterTwo[i] == '1':
                        zeroTwo += i
                    i += 1

                if zeroOne < zeroTwo:
                    return 0
                else :
                    return 1
        else:
            filterOne = self.cutZeros(numOne)
            filterTwo = self.cutZeros(numTwo)
            zeroOne = 0
            zeroTwo = 0
            i = 0
            while i < len(filterOne):
                if filterOne[i] == '1':
                    zeroOne += i
                i += 1

            i = 0
            while i < len(filterTwo):
                if filterTwo[i] == '1':
                    zeroTwo += i
                i += 1

            if zeroOne < zeroTwo:
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

    def add(self, numOne = None, numTwo = None):
            if numOne is None or numTwo is None:
                if self._first is None or self._second is None:
                    raise LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.")
                else:
                    res = ""
                    next = -1

                    one = self.cutZeros(self._first)
                    two = self.cutZeros(self._second)

                    if len(one) != len(two):
                        if self.smallest(one, two) == 0:
                            one = self.fillWithZeros(len(two) - len(one), one)
                        else:
                            two = self.fillWithZeros(len(one) - len(two), two)

                    i = len(one) - 1
                    while i > -1:
                        bitOne =  1 if one[i] == '1' else 0
                        bitTwo = 1 if two[i] == '1' else 0

                        sum = bitOne + bitTwo

                        if next != -1:
                            sum += next
                            next = -1

                        match sum:
                            case 0:
                                res += "0"
                                next = -1

                            case 1:
                                res += "1"
                                next = -1

                            case 2:
                                res += "0"
                                next = 1

                            case 3:
                                res += "1"
                                next = 1

                        i -= 1

                    if next != -1:
                        res += str(next)
                    return LowLevel.reversed(res)
            else:
                res = ""
                next = -1

                one = self.cutZeros(numOne)
                two = self.cutZeros(numTwo)

                if len(one) != len(two):
                    if self.smallest(one, two) == 0:
                        one = self.fillWithZeros(len(two) - len(one), one)
                    else:
                        two = self.fillWithZeros(len(one) - len(two), two)

                i = len(one) - 1
                while i > -1:
                    bitOne = 1 if one[i] == '1' else 0
                    bitTwo = 1 if two[i] == '1' else 0

                    sum = bitOne + bitTwo

                    if next != -1:
                        sum += next
                        next = -1

                    match sum:
                        case 0:
                            res += "0"
                            next = -1

                        case 1:
                            res += "1"
                            next = -1

                        case 2:
                            res += "0"
                            next = 1

                        case 3:
                            res += "1"
                            next = 1

                    i -= 1

                if next != -1:
                    res += str(next)
                return LowLevel.reversed(res)

    def subtract(self, numOne = None, numTwo = None):
        if numOne is None or numTwo is None:
            if self._first is None or self._second is None:
                raise LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.")
            else:
                if self.smallest(self._first, self._second) == 0:
                    #raise LowLevelException("You must place the biggest number at the first parameter, and the smallest at the second one.")
                    pass
                else:
                    if self._second == "0":
                        return self._first
                    self._second = self.fillWithZeros(len(self._first) - len(self._second),self._second)
                    self._second = self.NOT(self._second)
                    self._second = self.add(self._second,"1")

                    prov = self.add(self._first, self._second)
                    res = ""
                    i = 1
                    while i < len(prov):
                        if prov[i] == '1':
                            res += "1"
                        else:
                            res += "0"
                        i += 1

                    return self.cutZeros(res)
        else:
            if self.smallest(numOne, numTwo) == 0:
                #raise LowLevelException("You must place the biggest number at the first parameter, and the smallest at the second one.")
                pass
            else:
                if numTwo == "0":
                    return numOne
                numTwo = self.fillWithZeros(len(numOne) - len(numTwo), numTwo)
                numTwo = self.NOT(numTwo)
                numTwo = self.add(numTwo, "1")

                prov = self.add(numOne, numTwo)
                res = ""
                i = 1
                while i < len(prov):
                    if prov[i] == '1':
                        res += "1"
                    else:
                        res += "0"
                    i += 1

                return self.cutZeros(res)
        pass

    def multiply(self, num = None, by = None):
        if num is None or by is None:
            if self._first is None or self._second is None:
                raise LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.")
            else:
                if self._second == "1":
                    return self._first
                if self._first == "0" or self._second == "0":
                    return "0"
                twoInDecimal = self.toDecimal(self._second)
                two = int(twoInDecimal)
                res = self._first
                i = 0
                while i < two - 1:
                    res = self.add(res, self._first)
                    i += 1
                return res
        else:
            #code...
            if by == "1":
                return num
            if num == "0" or by == "0":
                return "0"
            twoInDecimal = self.toDecimal(by)
            two = int(twoInDecimal)
            res = num
            i = 0
            while i < two - 1:
                res = self.add(res, num)
                i += 1
            return res

    def divide(self, numOne = None, by = None):
        if numOne is None or by is None:
            div = ""
            quotient = ""
            nowQuo = ""
            i_ = 0
            while i_ < len(self._first):
                now = 1 if self._first[i_] == '1' else 0
                div = div + str(now)
                if self.smallest(div, self._second) == 0:
                    quotient += '0'
                    nowQuo = '0'
                else:
                    quotient += '1'
                    nowQuo = '1'
                mul = self.multiply(self._second, nowQuo)
                div = self.subtract(div, mul)
                i_ += 1
            return self.cutZeros(quotient)
        else:
            div = ""
            quotient = ""
            nowQuo = ""
            i_ = 0
            while i_ < len(numOne):
                now = 1 if numOne[i_] == '1' else 0
                div = div + str(now)
                if self.smallest(div, by) == 0:
                    quotient += '0'
                    nowQuo = '0'
                else:
                    quotient += '1'
                    nowQuo = '1'
                mul = self.multiply(by, nowQuo)
                div = self.subtract(div, mul)
                i_ += 1
            return self.cutZeros(quotient)

    def modulus(self, numOne = None, by = None):
        if numOne is None or by is None:
            div = ""
            quotient = ""
            nowQuo = ""
            i_ = 0
            while i_ < len(self._first):
                now = 1 if self._first[i_] == '1' else 0
                div = div + str(now)
                if self.smallest(div, self._second) == 0:
                    quotient += '0'
                    nowQuo = '0'
                else:
                    quotient += '1'
                    nowQuo = '1'
                mul = self.multiply(self._second, nowQuo)
                div = self.subtract(div, mul)
                i_ += 1
            return self.cutZeros(div)
        else:
            div = ""
            quotient = ""
            nowQuo = ""
            i_ = 0
            while i_ < len(numOne):
                now = 1 if numOne[i_] == '1' else 0
                div = div + str(now)
                if self.smallest(div, by) == 0:
                    quotient += '0'
                    nowQuo = '0'
                else:
                    quotient += '1'
                    nowQuo = '1'
                mul = self.multiply(by, nowQuo)
                div = self.subtract(div, mul)
                i_ += 1
            return self.cutZeros(div)


