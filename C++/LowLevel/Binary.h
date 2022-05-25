/*
*   Copyright 2022. Eduardo Programador
*   www.eduardoprogramador.com
*   consultoria@eduardoprogramador.com
*
*   All Rights Reserved.
*
* */

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
		if (this->first == nullptr || this->second == nullptr)
		{
			throw new LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.");

		}
		else
		{
			char* res = new char[strlen(this->first) + strlen(this->second)];
			strcpy(res, "");
			int next = -1;

			char *one = this->cutZeros(this->first);
			char * two = this->cutZeros(this->second);

			if (strlen(one) != strlen(two)) {
				if (this->smallest(one, two) == 0) {
					one = this->fillWithZeros(strlen(two) - strlen(one), one);
				}
				else {
					two = this->fillWithZeros(strlen(one) - strlen(two), two);
				}
			}
			for (int i = strlen(one) - 1; i > -1; i--) {
				int bitOne = one[i] == '1' ? 1 : 0;
				int bitTwo = two[i] == '1' ? 1 : 0;

				int sum = bitOne + bitTwo;

				if (next != -1) {
					sum += next;
					next = -1;
				}

				switch (sum) {
				case 0:
					strcat(res, "0");
					next = -1;
					break;

				case 1:
					strcat(res, "1");
					next = -1;
					break;

				case 2:
					strcat(res, "0");
					next = 1;
					break;

				case 3:
					strcat(res, "1");
					next = 1;
					break;
				}
			}
			if (next != -1) {
				char temp[50];
				sprintf(temp, "%d", next);
				strcat(res, temp);
			}

			return LowLevel::reversed(res);

		}
	}
	char* add(const char* numOne, const char* numTwo)
	{
		char* res = new char[strlen(numOne) + strlen(numTwo)];
		strcpy(res, "");
		int next = -1;

		char* one = this->cutZeros(numOne);
		char* two = this->cutZeros(numTwo);

		if (strlen(one) != strlen(two)) {
			if (this->smallest(one, two) == 0) {
				one = this->fillWithZeros(strlen(two) - strlen(one), one);
			}
			else {
				two = this->fillWithZeros(strlen(one) - strlen(two), two);
			}
		}
		for (int i = strlen(one) - 1; i > -1; i--) {
			int bitOne = one[i] == '1' ? 1 : 0;
			int bitTwo = two[i] == '1' ? 1 : 0;

			int sum = bitOne + bitTwo;

			if (next != -1) {
				sum += next;
				next = -1;
			}

			switch (sum) {
			case 0:
				strcat(res, "0");
				next = -1;
				break;

			case 1:
				strcat(res, "1");
				next = -1;
				break;

			case 2:
				strcat(res, "0");
				next = 1;
				break;

			case 3:
				strcat(res, "1");
				next = 1;
				break;
			}
		}
		if (next != -1) {
			char temp[50];
			sprintf(temp, "%d", next);
			strcat(res, temp);
		}

		return LowLevel::reversed(res);
	}
	int smallest()
	{
		if (this->first == nullptr || this->second == nullptr) {
			throw new LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.");
		}
		else {

			char* filterOne = this->cutZeros(this->first);
			char* filterTwo = this->cutZeros(this->second);
			int zeroOne = 0;
			int zeroTwo = 0;

			for (int i = 0; i <  strlen(filterOne); i++) {
				if (filterOne[i] == '1') {
					zeroOne += i;
				}

			}
			for (int i = 0; i < strlen(filterTwo); i++) {
				if (filterTwo[i] == '1') {
					zeroTwo += i;
				}
			}

			if (zeroOne < zeroTwo) {
				return 0;
			}
			else {
				return 1;
			}


		}
	}
	int smallest(const char* numOne, const char* numTwo)
	{
		char* filterOne = this->cutZeros(numOne);
		char* filterTwo = this->cutZeros(numTwo);
		int zeroOne = 0;
		int zeroTwo = 0;

		for (int i = 0; i < strlen(filterOne); i++) {
			if (filterOne[i] == '1') {
				zeroOne += i;
			}

		}
		for (int i = 0; i < strlen(filterTwo); i++) {
			if (filterTwo[i] == '1') {
				zeroTwo += i;
			}
		}

		if (zeroOne < zeroTwo) {
			return 0;
		}
		else {
			return 1;
		}
	}
	char* cutZeros()
	{
		if (this->number == nullptr) {
			throw new LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.");
		}
		else {
			char *res = new char[strlen(this->number)];
			strcpy(res, "");
			bool cut = true;
			int count = 0;
			for (int i = 0; i < strlen(this->number); i++) {
				if (this->number[i] == '1') {
					cut = false;
					count = i;
					break;
				}
			}
			for (int i = count; i < strlen(this->number); i++) {
				char temp[10];
				sprintf(temp, "%c", this->number[i]);
				strcat(res, temp);				
			}
			return res;
		}
	}
	char* cutZeros(const char* number)
	{
		char* res = new char[strlen(number)];
		strcpy(res, "");
		bool cut = true;
		int count = 0;
		for (int i = 0; i < strlen(number); i++) {
			if (number[i] == '1') {
				cut = false;
				count = i;
				break;
			}
		}
		for (int i = count; i < strlen(number); i++) {
			char temp[10];
			sprintf(temp, "%c", number[i]);
			strcat(res, temp);
		}
		return res;
	}

	char* fillWithZeros(int count)
	{
		if (this->number == nullptr) {
			throw new LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.");
		}
		else {
			char* zeros = new char[strlen(this->number) + count];
			strcpy(zeros, "");
			for (int i = 0; i < count; i++) {
				strcat(zeros, "0");
			}
			strcat(zeros, this->number);
			return zeros;
		}
	}
	char* fillWithZeros(int count, const char* number)
	{
		char* zeros = new char[strlen(number) + count];
		strcpy(zeros, "");
		for (int i = 0; i < count; i++) {
			strcat(zeros, "0");
		}
		strcat(zeros, number);
		return zeros;
	}

	char* NOT()
	{
		if (this->number == nullptr) {
			throw new LowLevelException("You must to load the Binary Class with the construct that has a valid binary inside.");
		}
		else {
			char* res = new char[strlen(this->number)];
			strcpy(res, "");
			for (int i = 0; i < strlen(this->number); i++) {
				if (this->number[i] == '1') {
					strcat(res, "0");
				}
				else {
					strcat(res, "1");
				}

			}
			return res;
		}
	}
	char* NOT(const char* binary)
	{
		char* res = new char[strlen(binary)];
		strcpy(res, "");
		for (int i = 0; i < strlen(binary); i++) {			
			if (binary[i] == '1') {
				strcat(res, "0");
			}
			else {
				strcat(res, "1");
			}

		}
		return res;
	}

	char* subtract()
	{
		if (this->first == nullptr || this->second == nullptr) {
			throw new LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.");
		}
		if (smallest(this->first, this->second) == 0) {
			throw new LowLevelException("You must place the biggest number at the first parameter, and the smallest at the second one.");
		}
		else {

			if (strcmp(this->second, "0") == 0) {
				return this->first;
			}				
			cout << second << endl;

			second = this->fillWithZeros(strlen(this->first) - strlen(this->second), this->second);
			cout << second << endl;
			second = this->NOT(second);
			cout << second << endl;
			second = this->add(second, "1");
			cout << second << endl;

			char* prov = this->add(this->first, second);
			char* res = new char[strlen(this->first) + strlen(second)];
			strcpy(res, "");
			for (int i = 1; i < strlen(prov); i++) {
				if (prov[i] == '1') {
					strcat(res, "1");
				}
				else {
					strcat(res, "0");
				}
			}
			return this->cutZeros(res);
		}
	}
	char* subtract(const char* numOne, const char* numTwo)
	{
		if (strcmp(numTwo, "0") == 0)
			return const_cast<char *>(numOne);

		char *numTwos = this->fillWithZeros(strlen(numOne) - strlen(numTwo), numTwo);
		numTwos = this->NOT(numTwos);
		numTwos = this->add(numTwos, "1");

		char* prov = this->add(numOne, numTwos);
		char* res = new char[strlen(numOne) + strlen(numTwos)];
		strcpy(res, "");
		for (int i = 1; i < strlen(prov); i++) {
			if (prov[i] == '1') {
				strcat(res, "1");
			}
			else {
				strcat(res, "0");
			}
		}
		return this->cutZeros(res);
	}
	char* multiply()
	{
		if (this->first == nullptr || this->second == nullptr) {
			throw new LowLevelException("You must to call the Binary construct that has 2 valid binary numbers.");
		}
		else {
			if (strcmp(this->second,"1") == 0)
				return this->first;
			if (strcmp(this->first,"0") == 0 || strcmp(this->second,"0") == 0)
				return const_cast<char *>("0");
			char* twoInDecimal = this->toDecimal(this->second);
			int two = atoi(twoInDecimal);
			char* res = first;
			for (int i = 0; i < two - 1; i++) {
				res = add(res, first);
			}			
			return res;
		}
	}
	char* multiply(const char* num, const char* by)
	{
		if (strcmp(by, "1") == 0)
			return const_cast<char*>(num);
		if (strcmp(num, "0") == 0 || strcmp(by, "0") == 0)
			return const_cast<char*>("0");
		char* twoInDecimal = this->toDecimal(by);
		int two = atoi(twoInDecimal);
		char* res = const_cast<char*>(num);
		for (int i = 0; i < two - 1; i++) {
			res = add(res, num);
		}
		return res;
	}
	char* divide()
	{
		char* div = new char(strlen(this->first));
		char* quotient = new char(strlen(this->first));
		char* nowQuo = new char(strlen(this->first));
		strcpy(div, "");
		strcpy(quotient, "");
		strcpy(nowQuo, "");
		for (int i = 0; i <  strlen(first); i++) {
			int now = first[i] == '1' ? 1 : 0;
			char temp[10];
			sprintf(temp, "%d", now);
			strcat(div, temp);

			if (this->smallest(div, this->second) == 0) {
				strcat(quotient, "0");
				strcpy(nowQuo, "0");
			}
			else {
				strcat(quotient, "1");
				strcpy(nowQuo, "1");
			}
			char* mul = this->multiply(this->second, nowQuo);
			div = this->subtract(div, mul);
		}
		return this->cutZeros(quotient);
	}
	char* divide(const char* numOne, const char* by)
	{
		char* div = new char(strlen(numOne));
		char* quotient = new char(strlen(numOne));
		char* nowQuo = new char(strlen(numOne));
		strcpy(div, "");
		strcpy(quotient, "");
		strcpy(nowQuo, "");
		for (int i = 0; i < strlen(numOne); i++) {
			int now = numOne[i] == '1' ? 1 : 0;
			char temp[10];
			sprintf(temp, "%d", now);
			strcat(div, temp);

			if (this->smallest(div, by) == 0) {
				strcat(quotient, "0");
				strcpy(nowQuo, "0");
			}
			else {
				strcat(quotient, "1");
				strcpy(nowQuo, "1");
			}
			char* mul = this->multiply(by, nowQuo);
			div = this->subtract(div, mul);
		}
		return this->cutZeros(quotient);
	}
	char* modulus()
	{
		char* div = new char(strlen(this->first));
		char* quotient = new char(strlen(this->first));
		char* nowQuo = new char(strlen(this->first));
		strcpy(div, "");
		strcpy(quotient, "");
		strcpy(nowQuo, "");
		for (int i = 0; i < strlen(first); i++) {
			int now = first[i] == '1' ? 1 : 0;
			char temp[10];
			sprintf(temp, "%d", now);
			strcat(div, temp);

			if (this->smallest(div, this->second) == 0) {
				strcat(quotient, "0");
				strcpy(nowQuo, "0");
			}
			else {
				strcat(quotient, "1");
				strcpy(nowQuo, "1");
			}
			char* mul = this->multiply(this->second, nowQuo);
			div = this->subtract(div, mul);
		}
		return this->cutZeros(div);
	}
	char* modulus(const char* numOne, const char* by)
	{
		char* div = new char(strlen(numOne));
		char* quotient = new char(strlen(numOne));
		char* nowQuo = new char(strlen(numOne));
		strcpy(div, "");
		strcpy(quotient, "");
		strcpy(nowQuo, "");
		for (int i = 0; i < strlen(numOne); i++) {
			int now = numOne[i] == '1' ? 1 : 0;
			char temp[10];
			sprintf(temp, "%d", now);
			strcat(div, temp);

			if (this->smallest(div, by) == 0) {
				strcat(quotient, "0");
				strcpy(nowQuo, "0");
			}
			else {
				strcat(quotient, "1");
				strcpy(nowQuo, "1");
			}
			char* mul = this->multiply(by, nowQuo);
			div = this->subtract(div, mul);
		}
		return this->cutZeros(div);
	}

};