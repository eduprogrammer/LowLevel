#include <exception>

class LowLevelException : public std::exception
{
public:
	LowLevelException(const char *msg) : 
		std::exception(msg)
	{

	}
};