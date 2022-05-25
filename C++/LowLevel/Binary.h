#include "Number.h"
#include "LowLevelException.h"
#include "LowLevel.h"
#include <cmath>

class Binary : public Number
{
public:
	Binary() : Number() {};
	Binary(const char* number) : Number(number) {};
	Binary(const char* first, const char* second) : Number(first, second) {};
	~Binary() {};

	char* toDecimal()
	{
		if (this->number == nullptr)
		{
			throw new LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.");
		}
		else
		{			

			double res = 0;
			double calc = 0;
			int times = 0;
			for (int i = strlen(this->number) - 1; i >= 0; i--)
			{
				char n = this->number[i];				
				calc = (n == '0') ? 0 : pow(2, times);
				times++;
				res += calc;
			}			
									
			static char temp[50] = {0};			
			sprintf(temp, "%f", res);			
			static char *p = strtok(temp, ".");						
			return p;
		}
	}
	char* toDecimal(const char* number)
	{
		double res = 0;
		double calc = 0;
		int times = 0;
		for (int i = strlen(number) - 1; i >= 0; i--)
		{
			char n = number[i];
			calc = (n == '0') ? 0 : pow(2, times);
			times++;
			res += calc;
		}

		static char temp[50] = { 0 };
		sprintf(temp, "%f", res);
		static char* p = strtok(temp, ".");
		return p;
	}

	char* add()
	{
		//code...

		char* code = new char[5];
		return code;
	}
	char* add(const char* numOne, const char* numTwo)
	{
		char* code = new char[5];
		return code;
	}
	int smallest()
	{
		return 0;
	}
	int smallest(const char* numOne, const char* numTwo)
	{
		return 0;
	}
	char* cutZeros()
	{
		char* code = new char[5];
		return code;
	}
	char* cutZeros(const char* number)
	{
		char* code = new char[5];
		return code;
	}

	char* fillWithZeros(int count)
	{
		char* code = new char[5];
		return code;
	}
	char* fillWithZeros(int count, const char* number)
	{
		char* code = new char[5];
		return code;
	}
	char* subtract()
	{
		char* code = new char[5];
		return code;
	}
	char* subtract(const char* numOne, const char* numTwo)
	{
		char* code = new char[5];
		return code;
	}
	char* multiply()
	{
		char* code = new char[5];
		return code;
	}
	char* multiply(const char* num, const char* by)
	{
		char* code = new char[5];
		return code;
	}
	char* divide()
	{
		char* code = new char[5];
		return code;
	}
	char* divide(const char* numOne, const char* by)
	{
		char* code = new char[5];
		return code;
	}
	char* modulus()
	{
		char* code = new char[5];
		return code;
	}
	char* modulus(const char* numOne, const char* by)
	{
		char* code = new char[5];
		return code;
	}

};