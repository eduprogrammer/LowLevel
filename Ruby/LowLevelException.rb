#
#    Copyright 2022. Eduardo Programador
# *   www.eduardoprogramador.com
# *   consultoria@eduardoprogramador.com
# *
# *   All Rights Reserved.
# *
# * */

class LowLevelException < StandardError
    attr_reader :msg

    def initialize(msg)
        @msg = msg
    end    
end