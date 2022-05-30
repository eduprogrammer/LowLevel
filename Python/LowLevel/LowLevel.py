#/**
# *   Copyright 2022. Eduardo Programador
# *   www.eduardoprogramador.com
# *   consultoria@eduardoprogramador.com
# *
# *   All Rights Reserved.
# *
# * */

class LowLevel:

    @staticmethod
    def reversed(chars):
        res = ""
        i = len(chars) - 1
        while i >-1:
            if(chars[i] == '0'):
                res += "0"
            else:
                res += "1"
            i -= 1
        return res

    class NumberSystem:

        @classmethod
        def init(cls):
            return cls()

        @classmethod
        def decimalToBinary(cls,decimal):
            res = ""
            number = int(decimal)
            while int(number / 2) >= 1:
                res += str(number % 2)
                number = int(number / 2)
            res += str(number)
            resF = ""
            i = len(res) - 1
            while i > -1:
                resF += str(res[i])
                i -= 1
            return resF