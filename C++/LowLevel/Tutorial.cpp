#include <iostream>
#include "LowLevel.h"



using namespace std;

int main()
{
	const char* test = "1110010";
	const char* res = LowLevel::reversed(test);

	LowLevel::NumberSystem system = LowLevel::NumberSystem::init();
	const char* res2 = system.decimalToBinary("209");
	cout << res2 << endl;
}
