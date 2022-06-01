#/*
# *   Copyright 2022. Eduardo Programador
# *   www.eduardoprogramador.com
# *   consultoria@eduardoprogramador.com
# *
# *   All Rights Reserved.
# *
# ** */

from LowLevelException import *
from LowLevel import *
from Number import *
from Binary import *

res = LowLevel.reversed("011000010")
print(res)

sys = LowLevel.NumberSystem.init()
res1 = sys.decimalToBinary("23500")
print(res1)

res2 = Number.listNumberTypes()
print(res2)

binary = Binary()
res3 = binary.NOT("101010")
print("res4: " + res3)








