#
#    Copyright 2022. Eduardo Programador
# *   www.eduardoprogramador.com
# *   consultoria@eduardoprogramador.com
# *
# *   All Rights Reserved.
# *
# * */

class LowLevel 

    def self.reversed(chars)
        reversed = ""
        count = chars.length - 1
        while count >= 0 do
            if chars[count] == '0'
                reversed += "0"
            else
                reversed += "1"                
            end
            count -= 1
        end
        return reversed
    end

    class NumberSystem 

        private 
        
        def initialize()
        end

        public

        def self.init()
            return self.new()
        end

        def decimalToBinary(decimal) 
            res = ""
            number = decimal.to_i
            while (number / 2).to_i >= 1 do
                res += (number % 2).to_s
                number = (number/2).to_i
            end
            res += number.to_s
            resF = ""
            count = res.length - 1
            while count >= 0 do
                resF += res[count].to_s
                count -= 1
            end
            return resF
        end
    end
end