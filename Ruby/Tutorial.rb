require_relative "/home/pi/Downloads/ruby/LowLevel.rb"

puts "Hello, world!"

num = "11110010"
res = LowLevel.reversed(num)
puts("reversed is: " + res)

sys = LowLevel::NumberSystem.init()
number = sys.decimalToBinary("349")
puts("is: " + number)