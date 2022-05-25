#include <iostream>
#include "Binary.h"

using namespace std;

int main()
{
	const char* test = "1110010";
	const char* res = LowLevel::reversed(test);

	LowLevel::NumberSystem system = LowLevel::NumberSystem::init();
	const char* res2 = system.decimalToBinary("209");
	cout << res2 << endl;

	const char **res3 = Number::listNumberTypes();
	cout << res3[2] << endl;

	Binary *binary = new Binary();
	char *res4 = binary->toDecimal("11");

	cout << "now2>>>> " << res4 << endl;


	


	
}
