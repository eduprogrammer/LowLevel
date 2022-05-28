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

    #code(start)...
        #add, subtract, multiply, divide and modulus...
    #code(end)...

end
