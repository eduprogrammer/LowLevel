#/*
# *   Copyright 2022. Eduardo Programador
# *   www.eduardoprogramador.com
# *   consultoria@eduardoprogramador.com
# *
# *   All Rights Reserved.
# *
# * */

class Number 

    public

    def self.listNumberTypes()
        list = ["Binary,Hexadecimal,Octal"]
        return list
    end

    protected

    attr_accessor :number, :first, :second    
    
    def initialize(*args)
        case args.size
            when 0
                @number = nil
                @first = nil
                @second = nil
            when 1
                @number = args[0]
                @first = nil
                @second = nil
            when 2
                @number = nil
                @first = args[0]
                @second = args[1]
            else 
                raise LowLevelException.new("Invalid Number of Arguments")
        end
    end        
    
    def toDecimal(*args)
    end
        
    def add(*args)
    end    

    def smallest(*args)
    end

    def cutZeros(*args)
    end    

    def fillWithZeros(*args)
    end    

    def subtract(*args)
    end    

    def multiply(*args)
    end    

    def divide(*args)
    end    

    def modulus(*args)
    end    
end