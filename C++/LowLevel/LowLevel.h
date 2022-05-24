#include <cstdlib>
#include <cstdio>
#include <cstring>

using namespace std;

#pragma warning(disable: 4996)

class LowLevel {
public:

	LowLevel() {};
	
	static char* reversed(const char* chars)
	{
		char* reversed = new char[strlen(chars)];
		strcpy(reversed, "");
		for (int i = strlen(chars) - 1; i > -1; i--)
		{
			if (chars[i] == '0')
			{
				strcat(reversed, "0");
			}
			else
			{
				strcat(reversed, "1");
			}
		}
		return reversed;
	}

	static class NumberSystem {
	private:
		NumberSystem() {};

	public:
		static NumberSystem init()
		{
			NumberSystem ns;
			return ns;
		}

		char* decimalToBinary(const char* decimal)
		{			

			char* res = new char[strlen(decimal)];
			strcpy(res, "");

			long number = atol(decimal);			

			char* temp = new char[5];
			while ((number / 2) >= 1)
			{
				long mod = number % 2;				
				sprintf(temp, "%d", mod);
				strcat(res, temp);
				number /= 2;
			}			

			sprintf(temp, "%ld", number);
			strcat(res, temp);
			char* resF = new char[strlen(decimal)];
			strcpy(resF, "");
			for (int i = strlen(res) - 1; i > -1; i--)
			{
				if (res[i] == '0')
				{
					strcat(resF, "0");
				}
				else
				{
					strcat(resF, "1");
				}
			}
			return resF;
		}
	};
};