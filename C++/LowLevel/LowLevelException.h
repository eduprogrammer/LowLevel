/*
*   Copyright 2022. Eduardo Programador
*   www.eduardoprogramador.com
*   consultoria@eduardoprogramador.com
*
*   All Rights Reserved.
*
* */

#include <exception>

class LowLevelException : public std::exception
{
public:
	LowLevelException(const char *msg) : 
		std::exception(msg)
	{

	}
};