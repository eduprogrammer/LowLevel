/*
*   Copyright 2022. Eduardo Programador
*   www.eduardoprogramador.com
*   consultoria@eduardoprogramador.com
*
*   All Rights Reserved.
*
* */

#include <cstdlib>
#include <cstring>

#pragma warning(disable: 4996)

class Number {
protected:
	char* number;
	char* first, * second;

	Number()
	{
		this->first = nullptr;
		this->second = nullptr;
		this->number = nullptr;
	};
	Number(const char* number)
	{
		this->number = new char[strlen(number)];
		strcpy(this->number, number);
		this->first = NULL;
		this->second = nullptr;
	}
	Number(const char* first, const char* second)
	{
		this->first = new char[strlen(first)];
		this->second = new char[strlen(second)];

		strcpy(this->first, first);
		strcpy(this->second, second);
		this->number = nullptr;
	}

	virtual char* toDecimal() = 0;
	virtual char* toDecimal(const char* number) = 0;
	virtual char* add() = 0;
	virtual char* add(const char* numOne, const char* numTwo) = 0;
	virtual int smallest() = 0;
	virtual int smallest(const char* numOne, const char* numTwo) = 0;
	virtual char* cutZeros() = 0;
	virtual char* cutZeros(const char* number) = 0;
	virtual char* fillWithZeros(int count) = 0;
	virtual char* fillWithZeros(int count, const char* number) = 0;
	virtual char* NOT() = 0; 
	virtual char* NOT(const char* binary) = 0;	
	virtual char* subtract() = 0;
	virtual char* subtract(const char* numOne, const char* numTwo) = 0;
	virtual char* multiply() = 0;
	virtual char* multiply(const char* num, const char* by) = 0;
	virtual char* divide() = 0;
	virtual char* divide(const char* numOne, const char* by) = 0;
	virtual char* modulus() = 0;
	virtual char* modulus(const char* numOne, const char* by) = 0;



public:
	static const char** listNumberTypes()
	{
		const char* res[] = {"Binary","Hexadecimal","Octal"};
		return res;

	}

};