#/*
# *   Copyright 2022. Eduardo Programador
# *   www.eduardoprogramador.com
# *   consultoria@eduardoprogramador.com
# *
# *   All Rights Reserved.
# *
# * */

from abc import ABC, abstractmethod

class Number(ABC):

    def __init__(self,number = None, first = None, second = None):
        if first is not None and second is not None:
            self._first = first
            self._second = second
        elif number is not None:
            self._number = number

    @staticmethod
    def listNumberTypes():
        return ["Binary,Hexadecimal,Octal"]

    @abstractmethod
    def toDecimal(self,number = None):
        pass

#    @abstractmethod
#    def add(numOne = None, numTwo = None):
#        pass

    @abstractmethod
    def smallest(self, numOne = None, numTwo = None):
        pass

    @abstractmethod
    def cutZeros(self, number = None):
        pass

    @abstractmethod
    def fillWithZeros(self, count, number = None):
        pass

#    @abstractmethod
#    def subtract(numOne = None, numTwo = None):
#        pass

#    @abstractmethod
#    def multiply(num = None, by = None):
#        pass

#    @abstractmethod
#    def divide(numOne = None, by = None):
#        pass

#    @abstractmethod
#    def modulus(numOne = None, by = None):
#        pass

    @abstractmethod
    def NOT(self, binary = None):
        pass