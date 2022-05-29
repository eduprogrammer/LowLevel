#/*
#*   Copyright 2022. Eduardo Programador
#*   www.eduardoprogramador.com
#*   consultoria@eduardoprogramador.com
#*
#*   All Rights Reserved.
#*
#* */

class Binary < Number

    public

    def initialize(*args)
        case args.size
            when 0
                super()
            when 1
                super(args[0])
            when 2
                super(args[0], args[1])
            else 
            raise LowLevelException.new("Invalid Number of Arguments")
        end
    end            
    
    def toDecimal(*args)
        case args.size
            when 0
                if self.number == nil 
                    raise LowLevelException.new("You must to load the Binary Class with the construct that has a valid binary inside.")
                else 
                    res = 0
                    calc = 0
                    times = 0
                    i = self.number.length - 1
                    while i >= 0 do
                        n = self.number[i]
                        calc = (n == '0') ? 0 : 2 ** times
                        times += 1
                        res += calc
                         i -= 1
                    end
                    return res.to_s
                end
            when 1                
                number = args[0]

                res = 0
                calc = 0
                times = 0
                i = number.length - 1
                while i >= 0 do
                    n = number[i]
                    calc = (n == '0') ? 0 : 2 ** times
                    times += 1
                    res += calc
                    i -= 1
                end
                return res.to_s                
        end        
    end    
    
    def cutZeros(*args)

        case args.size             
            when 0                
                if self.number == nil
                    raise LowLevelException.new("You must to load the Binary Class with the construct that has a valid binary inside.")
                else 
                    res = ""
                    cut = true
                    count = 0
                    i = 0
                    while i < self.number.length do
                        if self.number[i] == '1'
                            cut = false
                            count = i
                            break
                        end
                        i += 1
                    end
                    i = count
                    while i < self.number.length
                        res += self.number[i]
                        i += 1
                    end
                    return res
                end                

            when 1
                number = args[0]
                res = ""
                cut = true
                count = 0
                i = 0
                while i < number.length do
                    if number[i] == '1'
                        cut = false
                        count = i
                        break
                    end
                i += 1
                end
                i = count
                while i < number.length do
                    res += number[i]
                    i += 1
                end
                return res
        end
        
    end        
    
    def fillWithZeros(*args)

        case args.size 
            when 1
                if self.number == nil
                    raise LowLevelException.new("You must to load the Binary Class with the construct that has a valid binary inside.")
                else 
                    count = args[0]
                    zeros = ""
                    i = 0
                    while i < count do
                        zeros += "0"
                        i += 1
                    end
                    return zeros + self.number
                end
            when 2
                count = args[0]
                number = args[1]
                zeros = ""
                i = 0
                while i < count do
                    zeros += "0"
                    i += 1
                end
                return zeros + number
        end                
    end            

    def not(*args)

        case args.size
            when 0
                if self.number == nil
                    raise LowLevelException.new("You must to load the Binary Class with the construct that has a valid binary inside.")
                else 
                    res = ""
                    i = 0
                    while i < self.number.length do
                        if self.number[i] == '1'
                            res += "0"
                        else 
                            res += "1"
                        end
                        i += 1
                    end
                    return res
                end
            when 1
                number = args[0]
                res = ""
                i = 0
                while i < number.length do
                    if number[i] == '1'
                        res += "0"
                    else 
                        res += "1"
                    end
                        i += 1
                end
                return res
        end        
    end        
    
    def smallest(*args)

        case args.size
            when 0
                if self.first == nil || self.second == nil
                    raise LowLevelException.new("You must to call the Binary construct that has 2 valid binary numbers.")
                else 
                    filterOne = self.cutZeros(self.first)
                    filterTwo = self.cutZeros(self.second)
                    zeroOne = 0
                    zeroTwo = 0
                        i = 0
                        while i < filterOne.length do
                            if filterOne[i] == '1'
                                zeroOne += i
                            end
                            i += 1
                        end
                        i = 0
                        while i < filterTwo.length do
                            if filterTwo[i] == '1'
                                zeroTwo += i
                            end
                            i += 1
                        end
        
                        if zeroOne < zeroTwo
                            return 0
                        else 
                            return 1
                        end
                end
            when 2
                numOne = args[0]
                numTwo = args[1]
                filterOne = self.cutZeros(numOne)
                filterTwo = self.cutZeros(numTwo)
                zeroOne = 0
                zeroTwo = 0
                i = 0
                while i < filterOne.length do
                    if filterOne[i] == '1'
                        zeroOne += i
                    end
                    i += 1
                end
                i = 0
                while i < filterTwo.length do
                    if filterTwo[i] == '1'
                        zeroTwo += i
                    end
                    i += 1
                end

                if zeroOne < zeroTwo
                    return 0
                else 
                    return 1
                end
        end
    end        
        
    def add(*args)

        case args.size
            when 0
                if self.first == nil || self.second == nil
                    raise LowLevelException.new("You must to call the Binary construct that has 2 valid binary numbers.")
                else
                    res = ""
                    nexti = -1
        
                    one = self.cutZeros(self.first)
                    two = self.cutZeros(self.second)
        
                    if one.length != two.length 
                        if self.smallest(one,two) == 0
                            one = self.fillWithZeros(two.length - one.length,one)
                        else
                            two = self.fillWithZeros(one.length - two.length,two)
                        end
                    end
                        i = one.length - 1
                        while i > -1
                            bitOne = one[i] == '1' ? 1 : 0
                            bitTwo = two[i] == '1' ? 1 : 0
        
                            sum = bitOne + bitTwo
        
                            if nexti != -1
                                sum += nexti
                                nexti = -1
                            end
        
                            case sum 
                                when 0
                                    res += "0"
                                    nexti = -1
                                    break
        
                                when 1
                                    res += "1"
                                    nexti = -1
                                    break
        
                                when 2
                                    res += "0"
                                    nexti = 1
                                    break
        
                                when 3
                                    res += "1"
                                    nexti = 1
                                    break
                            end
                            i -= 1
                        end
                        if nexti != -1
                            res += nexti.to_s
                        end
        
                    return LowLevel.reversed(res);
                end
            when 2
                numOne = args[0]
                numTwo = args[1]
                res = ""
                nexti = -1

                one = self.cutZeros(numOne)
                two = self.cutZeros(numTwo)

                if one.length != two.length 
                    if self.smallest(one,two) == 0
                        one = self.fillWithZeros(two.length - one.length,one)
                    else
                        two = self.fillWithZeros(one.length - two.length,two)
                    end
                end
                i = one.length - 1
                while i > -1
                    bitOne = one[i] == '1' ? 1 : 0
                    bitTwo = two[i] == '1' ? 1 : 0

                    sum = bitOne + bitTwo

                    if nexti != -1
                        sum += nexti
                        nexti = -1
                    end

                    case sum 
                        when 0
                            res += "0"
                            nexti = -1
                            break

                        when 1
                            res += "1"
                            nexti = -1
                            break

                        when 2
                            res += "0"
                            nexti = 1
                            break

                        when 3
                            res += "1"
                            nexti = 1
                            break
                    end
                    i -= 1
                end
                if nexti != -1
                    res += nexti.to_s
                end

            return LowLevel.reversed(res);
        end
    end        
    
    def subtract(*args)

        case args.size
            when 0
                if self.first == nil || self.second == nil
                    raise LowLevelException.new("You must to call the Binary construct that has 2 valid binary numbers.")
                end
                if self.smallest(self.first, self.second) == 0
                    raise LowLevelException.new("You must place the biggest number at the first parameter, and the smallest at the second one.")
                else
        
                    if self.second.eql? "0"
                        return self.first
                    end
        
                    self.second = self.fillWithZeros(self.first.length - self.second.length,self.second)
                    self.second = self.not(self.second)
                    self.second = self.add(self.second,"1")
        
                    prov = self.add(self.first,self.second)
                    res = ""
                    i = 1
                    while i < prov.length()
                        if prov[i] == '1'
                            res += "1"
                        else 
                            res += "0"
                        end
                        i += 1
                    end
                    return self.cutZeros(res)
                end
            when 2
                numOne = args[0]
                numTwo = args[1]
                if numTwo.eql? "0"
                    return numOne
                end
    
                numTwo = self.fillWithZeros(numOne.length - numTwo.length,numTwo)
                numTwo = self.not(numTwo)
                numTwo = self.add(numTwo,"1")
    
                prov = self.add(numOne,numTwo)
                res = ""
                i = 1
                while i < prov.length()
                    if prov[i] == '1'
                        res += "1"
                    else 
                        res += "0"
                    end
                    i += 1
                end
                return self.cutZeros(res)                
        end
    end    
    
    def multiply(*args)

        case args.size
            when 0
                if self.first == nil || self.second == nil
                    raise LowLevelException.new("You must to call the Binary construct that has 2 valid binary numbers.")
                else
                    if self.second.eql? "1"
                        return self.first
                    end
                    if self.first.eql? "0" || self.second.eql? "0"
                        return "0"
                    end
                    twoInDecimal = self.toDecimal(self.second)
                    two = twoInDecimal.to_i
                    res = self.first
                    i = 0
                    while i < two - 1
                        res = self.add(res,self.first)
                        i += 1
                    end
                    return res
                end
            when 1
                num = args[0]
                by = args[1]
                if by.eql? "1"
                    return num
                end
                if num.eql? "0" || by.eql? "0"
                    return "0"
                end
                twoInDecimal = self.toDecimal(by)
                two = twoInDecimal.to_i
                res = num
                i = 0
                while i < two - 1
                    res = self.add(res,num)
                    i += 1
                end
                return res
        end        
    end
    
    def divide(*args)

        case args.size
            when 0
                if self.first == nil || self.second == nil
                    raise LowLevelException.new("You must to call the Binary construct that has 2 valid binary numbers.")
                end
                div = ""
                quotient = ""
                nowQuo = ""
                i = 0
                while i < self.first.length()
                    now = first[i] == '1' ? 1 : 0
                    div += now.to_s
                    if self.smallest(div,self.second) == 0
                        quotient += "0"
                        nowQuo = "0"
                    else
                        quotient += "1"
                        nowQuo = "1"
                    end
                    mul = self.multiply(self.second, nowQuo)
                    div = self.subtract(div,mul)
                    i += 1
                end
                return self.cutZeros(quotient)
            when 1
                numOne = args[0]
                by = args[1]
                div = ""
                quotient = ""
                nowQuo = ""
                i = 0
                while i < numOne.length()
                    now = numOne[i] == '1' ? 1 : 0
                    div += now.to_s
                    if self.smallest(div,by) == 0
                        quotient += "0"
                        nowQuo = "0"
                    else
                        quotient += "1"
                        nowQuo = "1"
                    end
                    mul = self.multiply(by, nowQuo)
                    div = self.subtract(div,mul)
                    i += 1
                end
                return self.cutZeros(quotient)
        end
    end
    
    def modulus(*args)

        case args.size
            when 0
                if self.first == nil || self.second == nil
                    raise LowLevelException.new("You must to call the Binary construct that has 2 valid binary numbers.")
                end
                div = ""
                quotient = ""
                nowQuo = ""
                i = 0
                while i < self.first.length()
                    now = first[i] == '1' ? 1 : 0
                    div += now.to_s
                    if self.smallest(div,self.second) == 0
                        quotient += "0"
                        nowQuo = "0"
                    else
                        quotient += "1"
                        nowQuo = "1"
                    end
                    mul = self.multiply(self.second, nowQuo)
                    div = self.subtract(div,mul)
                    i += 1
                end
                return self.cutZeros(div)
            when 1
                numOne = args[0]
                by = args[1]
                div = ""
                quotient = ""
                nowQuo = ""
                i = 0
                while i < numOne.length()
                    now = numOne[i] == '1' ? 1 : 0
                    div += now.to_s
                    if self.smallest(div,by) == 0
                        quotient += "0"
                        nowQuo = "0"
                    else
                        quotient += "1"
                        nowQuo = "1"
                    end
                    mul = self.multiply(by, nowQuo)
                    div = self.subtract(div,mul)
                    i += 1
                end
                return self.cutZeros(div)
        end
    end    
end
