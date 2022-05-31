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
            super().__init__(first,second)
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

    #code cutZeros, fillWithZeros and smallest...


