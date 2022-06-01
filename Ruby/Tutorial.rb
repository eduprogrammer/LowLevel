require_relative "/home/pi/Downloads/ruby/LowLevelException.rb"
require_relative "/home/pi/Downloads/ruby/LowLevel.rb"
require_relative "/home/pi/Downloads/ruby/Number.rb"
require_relative "/home/pi/Downloads/ruby/Binary.rb"


puts "Hello, world!"

num = "11110010"
res = LowLevel.reversed(num)
puts("reversed is: " + res)

sys = LowLevel::NumberSystem.init()
number = sys.decimalToBinary("349")
puts("is: " + number)

list = Number.listNumberTypes()
puts("List is: " + list.to_s)

el = Binary.new()
num = el.smallest("0010011","11000")
puts("num1 is: " + num.to_s)