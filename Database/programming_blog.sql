-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 02:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programming_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `c`
--

CREATE TABLE `c` (
  `Subtitle_Id` int(11) NOT NULL,
  `Title_Id` int(11) NOT NULL,
  `Subtitle` varchar(50) NOT NULL,
  `Description` varchar(8000) NOT NULL,
  `Example` varchar(1000) NOT NULL,
  `Output` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `c`
--

INSERT INTO `c` (`Subtitle_Id`, `Title_Id`, `Subtitle`, `Description`, `Example`, `Output`) VALUES
(1, 1, 'Intro of C', 'C is a general-purpose programming language created by Dennis Ritchie at the Bell Laboratories in 1972.\r\nIt is a very popular language, despite being old. C is strongly associated with UNIX, as it was developed to write the UNIX\r\noperating system It is one of the most popular programming language in the world If you know C, you will have no problem learning other popular programming languages such as Java, Python, C++, C#, etc, as the syntax is similar C is very fast, compared to other programming languages, like Java and Python C is very versatile; it can be used in both applications and technologies\r\n', ' ', ''),
(2, 1, 'Syntax', 'Line 1: #include <stdio.h> is a header file library that lets us work with input and output functions, such as printf() (used in line 4). Header files add functionality to C programs.\nLine 2: A blank line. C ignores white space. But we use it to make the code more readable.\nLine 3: Another thing that always appear in a C program, is main(). This is called a function. Any code inside its curly brackets {} will be executed.\nLine 4: printf() is a function used to output/print text to the screen. In our example it will output \"Hello World\".\nLine 5: return 0 ends the main() function.\nLine 6: Do not forget to add the closing curly bracket } to actually end the main function', '#include <stdio.h>\r\nint main() {\r\nprintf(\"Hello World!\");\r\nreturn 0;\r\n}\r\n', ''),
(3, 1, 'Comments:', 'In programming, comments are hints that a programmer can add to make their code easier to read and understand. For example,\n#include <stdio.h>\nint main() {\n // print Hello World to the screen\n printf(\"Hello World\");\n return 0;\n}\nHere, // print Hello World to the screen is a comment in C programming. Comments are completely ignored by C compilers Types of Comments\nThere are two ways to add comments in C:\n// - Single Line Comment\n/*…*/ - Multi-line Comment\n1. Single-line Comments in C\nIn C, a single line comment starts with //. It starts and ends in the same line. For example,\nIn the below example,                                                   // create integer variable and // print the age variable are two single line comments. We can also use the single line comment along with the code. For example,\nInt age = 25; // create integer variable\nHere, code before // are executed and code after // are ignored by the compiler.\n2. Multi-line Comments in C In C programming, there is another type of comment that allows us to comment on multiple lines at once, they are multi-line comments. To write multi-line comments, we use the /*….*/ symbol. For example,\n/* This program takes age input from the user\nIt stores it in the age variable\nAnd, print the value using printf() */\n', '#include <stdio.h>\r\nInt main() {\r\n // create integer variable\r\n Int age = 25;\r\n// print the age variable\r\n Printf(“Age: %d”, age);\r\n Return 0;\r\n', ''),
(4, 2, 'Basics of variables', 'In programming, a variable is a container (storage area) to hold data.\r\nTo indicate the storage area, each variable should be given a unique name\r\n(identifier). Variable names are just the symbolic representation of a memory\r\nlocation. For example:\r\nint playerScore = 95;\r\nHere, playerScore is a variable of int type. Here, the variable is assigned an\r\ninteger value 95.\r\nThe value of a variable can be changed, hence the name variable.\r\nchar ch = \'a\';\r\n// some code\r\nch = \'l\';\r\nRules for naming a variable\r\n1. A variable name can only have letters (both uppercase and lowercase\r\nletters), digits and underscore.\r\n2. The first letter of a variable should be either a letter or an underscore.\r\n3. There is no rule on how long a variable name (identifier) can be.\r\nHowever, you may run into problems in some compilers if the variable\r\nname is longer than 31 characters.\r\nTypes of Variables in C\r\nWe can classify variables on the basis of their scope, memory location,\r\nlifetime, etc. Following are the most common classification of the types\r\nof variables in C language.\r\n1. Classification on the Basis of Scope\r\nThe scope of a variable is the region in which the variable exists it is\r\nvalid to perform operations on it. Beyond the scope of the variable, we\r\ncannot access it and it is said to be out of scope.\r\nOn the basis of scope, C variables can be classified into two types:\r\nLocal Variables\r\nGlobal Variables', '', ''),
(5, 2, 'Local variables', 'Local variables in C are those variables that are declared inside a\r\nfunction or a block of code. Their scope is limited to the block or function\r\nin which they are declared.\r\n', '/ C program to declare and print local variable inside a\r\n// function.\r\n#include <stdio.h>\r\nVoid function()\r\n{\r\n Int x = 10; // local variable\r\n Printf(“%d”, x);\r\n}\r\nInt main() { function(); }\r\nIn the above code, x can be used only in the scope of function(). Using it in the main function will give an\r\nerror.\r\n', ''),
(6, 2, 'Global variables', 'Global variables in C are those variables that are declared outside the function or a block of code. Their\r\nscope is the whole program i.e. we can access the global variable anywhere in the C program after it is\r\ndeclared.\r\n', '// C program to demonstrate use of global variable\r\n#include <stdio.h>\r\nInt x = 20; // global variable\r\nVoid function1() { printf(“Function 1: %d\\n”, x); }\r\nVoid function2() { printf(“Function 2: %d\\n”, x); }\r\nInt main()\r\n{\r\n Function1();\r\n Function2();\r\n Return 0;\r\n}\r\nIn the above code, both functions can use the global variable as global\r\nvariables are accessible by all the functions.', ''),
(7, 1, 'Data types', 'Each variable in C has an associated data type. Each data type requires different amounts of memory\r\nand has some specific operations which can be performed over it. It specifies the type of data that the\r\nvariable can store like integer, character, floating, double, etc. The data type is a collection of data with\r\nvalues having fixed values, meaning as well as its characteristics.\r\nThe data types in C can be classified as follows:\r\nTypes Description\r\nPrimitive Data Types Arithmetic types can be further classified into integer and floating data types.\r\nVoid Types The data type has no value or operator and it does not provide a result to its caller. But\r\nvoid comes under Primitive data types.\r\nUser Defined DataTypesIt is mainly used to assign names to integral constants, which make a program\r\neasy to read and maintain\r\nDerived types The data types that are derived from the primitive or built-in datatypes are referred to\r\nas Derived Data Types.\r\nInteger Types\r\nThe integer data type in C is used to store the whole numbers without decimal values. Octal values,\r\nhexadecimal values, and decimal values can be stored in int data type in C. We can determine the size of\r\nthe int data type by using the sizeof operator in C. Unsigned int data type in C is used to store the data\r\nvalues from zero to positive numbers but it can’t store negative values like signed int. Unsigned int is\r\nlarger in size than signed int and it uses “%u” as a format specifier in C programming language. Below is\r\nthe programming implementation of the int data type in C.\r\nRange: -2,147,483,648 to 2,147,483,647\r\nSize: 2 bytes or 4 bytes\r\nFormat Specifier: %d\r\nNote: The size of an integer data type is compiler-dependent, when processors are 16-bit systems, then\r\nit shows the output of int as 2 bytes. And when processors are 32-bit then it shows 2 bytes as well as 4\r\nbytes.\r\n// C program to print Integer data types.\r\n#include <stdio.h>\r\nInt main()\r\n{\r\n // Integer value with positive data.\r\n Int a = 9;\r\n\r\n // integer value with negative data.\r\n Int b = -9;\r\n\r\n // U or u is Used for Unsigned int in C.\r\n Int c = 89U;\r\n\r\n // L or l is used for long int in C.\r\n Long int d = 99998L;\r\n Printf(“Integer value with positive data: %d\\n”, a);\r\n Printf(“Integer value with negative data: %d\\n”, b);\r\n Printf(“Integer value with an unsigned int data: %u\\n”, c);\r\n Printf(“Integer value with an long int data: %ld”, d);\r\n Return 0;\r\n}\r\nOutput\r\nInteger value with positive data: 9\r\nInteger value with negative data: -9\r\nInteger value with an unsigned int data: 89\r\nInteger value with an long int data: 99998\r\nCharacter Types\r\nCharacter data type allows its variable to store only a single character. The storage size of the character\r\nis 1. It is the most basic data type in C. It stores a single character and requires a single byte of memory\r\nin almost all compilers.\r\nRange: (-128 to 127) or (0 to 255)\r\nSize: 1 byte\r\nFormat Specifier: %c\r\n// C program to print Integer data types.\r\n#include <stdio.h>\r\nInt main()\r\n{\r\n Char a = ‘a’;\r\n Char c;\r\n Printf(“Value of a: %c\\n”, a);\r\n A++;\r\n Printf(“Value of a after increment is: %c\\n”, a);\r\n\r\n // c is assigned ASCII values\r\n // which corresponds to the\r\n // character ‘c’\r\n // a→97 b→98 c→99\r\n // here c will be printed\r\n C = 99;\r\n Printf(“Value of c: %c”, c);\r\n Return 0;\r\n}\r\nOutput\r\nValue of a: a\r\nValue of a after increment is: b\r\nValue of c: c\r\nFloating-Point Types\r\nIn C programming float data type is used to store floating-point values. Float in C is used to store\r\ndecimal and exponential values. It is used to store decimal numbers (numbers with floating point values)\r\nwith single precision.\r\nRange: 1.2E-38 to 3.4E+38\r\nSize: 4 bytes\r\nFormat Specifier: %f\r\n// C Program to demonstrate use\r\n// of Floating types\r\n#include <stdio.h>\r\nInt main()\r\n{\r\n Float a = 9.0f;\r\n Float b = 2.5f;\r\n\r\n // 2x10^-4\r\n Float c = 2E-4f;\r\n Printf(“%f\\n”,a);\r\n Printf(“%f\\n”,b);\r\n Printf(“%f”,c);\r\n\r\n\r\n Return 0;\r\n}\r\nOutput\r\n9.000000\r\n2.500000\r\n0.000200\r\nDouble Types\r\nA Double data type in C is used to store decimal numbers (numbers with floating point values) with\r\ndouble precision. It is used to define numeric values which hold numbers with decimal values in C.\r\nDouble data type is basically a precision sort of data type that is capable of holding 64 bits of decimal\r\nnumbers or floating points. Since double has more precision as compared to that float then it is much\r\nmore obvious that it occupies twice the memory as occupied by the floating-point type. It can easily\r\naccommodate about 16 to 17 digits after or before a decimal point.\r\nRange: 1.7E-308 to 1.7E+308\r\nSize: 8 bytes\r\nFormat Specifier: %lf\r\n// C Program to demonstrate\r\n// use of double data type\r\n#include <stdio.h>\r\nInt main()\r\n{\r\n Double a = 123123123.00;\r\n Double b = 12.293123;\r\n Double c = 2312312312.123123;\r\n Printf(“%lf\\n”, a);\r\n Printf(“%lf\\n”, b);\r\n Printf(“%lf”, c);\r\n Return 0;\r\n}\r\nOutput\r\n123123123.000000\r\n12.293123\r\n2312312312.123123\r\nVoid Data types\r\nThe void data type in C is used to specify that no value is present. It does not provide a result value to its\r\ncaller. It has no values and no operations. It is used to represent nothing. Void is used in multiple ways\r\nas function return type, function arguments as void, and pointers to void.\r\nSyntax:\r\n// function return type void\r\nVoid exit(int check);\r\n// Function without any parameter can accept void.\r\nInt print(void);\r\n// memory allocation function which\r\n// returns a pointer to void.\r\nVoid *malloc( size_t size);\r\n// C program to demonstrate\r\n// use of void pointers\r\n#include <stdio.h>\r\n\r\nInt main()\r\n{\r\n Int val = 30;\r\n Void *ptr = &val;\r\n Printf(“%d”, *(int *)ptr);\r\n Return 0;\r\n}\r\nOutput\r\n30\r\nWe can use the sizeof() operator to check the size of a variable. See the following C program for the\r\nusage of the various data types:\r\n// C Program to print size of\r\n// different data type in C\r\n#include <stdio.h>\r\nInt main()\r\n{\r\n Int size_of_int=sizeof(int);\r\n Int size_of_char= sizeof(char);\r\n Int size_of_float=sizeof(float);\r\n Int size_of_double=sizeof(double);\r\n\r\n Printf(“The size of int data type : %d\\n”,size_of_int );\r\n Printf(“The size of char data type : %d\\n”,size_of_char);\r\n Printf(“The size of float data type : %d\\n”,size_of_float);\r\n Printf(“The size of double data type : %d”,size_of_double);\r\n\r\n Return 0;\r\n}\r\nOutput\r\nThe size of int data type : 4\r\nThe size of char data type : 1\r\nThe size of float data type : 4\r\nThe size of double data type : 8', '', ''),
(8, 3, 'Arithmetic Operators', 'An arithmetic operator performs mathematical operations such as addition,\r\nsubtraction, multiplication, division etc on numerical values (constants and\r\nvariables).\r\nOperator Meaning of Operator\r\n+ addition or unary plus\r\n- subtraction or unary minus\r\n* multiplication\r\n/ division\r\nOperator Meaning of Operator\r\n%\r\nremainder after division (modulo\r\ndivision)\r\n', '// Working of arithmetic operators\r\n#include <stdio.h>\r\nint main()\r\n{\r\n int a = 9,b = 4, c;\r\n\r\n c = a+b;\r\n printf(\"a+b = %d \\n\",c);\r\n c = a-b;\r\n printf(\"a-b = %d \\n\",c);\r\n c = a*b;\r\n printf(\"a*b = %d \\n\",c);\r\n c = a/b;\r\n printf(\"a/b = %d \\n\",c);\r\n c = a%b;\r\n printf(\"Remainder when a divided by b = %d \\n\",c);\r\n\r\n return 0;\r\n}\r\n', ''),
(9, 3, 'Increment and Decrement Operators', 'C programming has two operators increment ++ and decrement -- to change the\r\nvalue of an operand (constant or variable) by 1.\r\nIncrement ++ increases the value by 1 whereas decrement -- decreases the value\r\nby 1. These two operators are unary operators, meaning they only operate on a\r\nsingle operand.\r\nHere, the operators ++ and -- are used as prefixes. These two operators can also be\r\nused as postfixes like a++ and a--.', '// Working of increment and decrement operators\r\n#include <stdio.h>\r\nint main()\r\n{\r\n int a = 10, b = 100;\r\n float c = 10.5, d = 100.5;\r\n printf(\"++a = %d \\n\", ++a);\r\n printf(\"--b = %d \\n\", --b);\r\n printf(\"++c = %f \\n\", ++c);\r\n printf(\"--d = %f \\n\", --d);\r\n return 0;\r\n}\r\n', ''),
(10, 3, 'Assignment Operators', 'An assignment operator is used for assigning a value to a variable. The most\r\ncommon assignment operator is =\r\nOperator Example Same as\r\n= a = b a = b\r\n+= a += b a = a+b\r\n-= a -= b a = a-b\r\n*= a *= b a = a*b\r\n/= a /= b a = a/b\r\n%= a %= b a = a%b', '// Working of assignment operators\r\n#include <stdio.h>\r\nint main()\r\n{\r\n int a = 5, c;\r\n c = a; // c is 5\r\n printf(\"c = %d\\n\", c);\r\n c += a; // c is 10\r\n printf(\"c = %d\\n\", c);\r\n c -= a; // c is 5\r\n printf(\"c = %d\\n\", c);\r\n c *= a; // c is 25\r\n printf(\"c = %d\\n\", c);\r\n c /= a; // c is 5\r\n printf(\"c = %d\\n\", c);\r\n c %= a; // c = 0\r\n printf(\"c = %d\\n\", c);\r\n return 0;', ''),
(11, 3, 'Relational Operators', 'A relational operator checks the relationship between two operands. If the relation is\r\ntrue, it returns 1; if the relation is false, it returns value 0.\r\nRelational operators are used in decision making and loops.\r\nOperator\r\nMeaning of\r\nOperator\r\nExample\r\n== Equal to 5 == 3 is\r\nevaluated to 0\r\n> Greater than 5 > 3 is\r\nevaluated to 1\r\nOperator\r\nMeaning of\r\nOperator\r\nExample\r\n< Less than 5 < 3 is\r\nevaluated to 0\r\n!= Not equal to 5 != 3 is\r\nevaluated to 1\r\n>=\r\nGreater than or\r\nequal to\r\n5 >= 3 is\r\nevaluated to 1\r\n<=\r\nLess than or\r\nequal to\r\n5 <= 3 is\r\nevaluated to 0\r\n', '// Working of relational operators\r\n#include <stdio.h>\r\nint main()\r\n{\r\n int a = 5, b = 5, c = 10;\r\n printf(\"%d == %d is %d \\n\", a, b, a == b);\r\n printf(\"%d == %d is %d \\n\", a, c, a == c);\r\n printf(\"%d > %d is %d \\n\", a, b, a > b);\r\n printf(\"%d > %d is %d \\n\", a, c, a > c);\r\n printf(\"%d < %d is %d \\n\", a, b, a < b);\r\n printf(\"%d < %d is %d \\n\", a, c, a < c);\r\n printf(\"%d != %d is %d \\n\", a, b, a != b);\r\n printf(\"%d != %d is %d \\n\", a, c, a != c);\r\n printf(\"%d >= %d is %d \\n\", a, b, a >= b);\r\n printf(\"%d >= %d is %d \\n\", a, c, a >= c);\r\n printf(\"%d <= %d is %d \\n\", a, b, a <= b);\r\n printf(\"%d <= %d is %d \\n\", a, c, a <= c);\r\n return 0;\r\n}', ''),
(12, 3, 'Logical Operators', 'An expression containing logical operator returns either 0 or 1 depending upon\r\nwhether expression results true or false. Logical operators are commonly used\r\nin decision making in C programming.\r\nOperator Meaning Example\r\n&& Logical AND.\r\nTrue only if all\r\nIf c = 5 and d = 2\r\nthen, expression\r\n((c==5) &&\r\nOperator Meaning Example\r\noperands are\r\ntrue\r\n(d>5)) equals to\r\n0.\r\n||\r\nLogical OR.\r\nTrue only if\r\neither one\r\noperand is true\r\nIf c = 5 and d = 2\r\nthen, expression\r\n((c==5) ||\r\n(d>5)) equals to\r\n1.\r\n!\r\nLogical NOT.\r\nTrue only if the\r\noperand is 0\r\nIf c = 5 then,\r\nexpression\r\n!(c==5) equals to\r\n0.', '// Working of logical operators\r\n#include <stdio.h>\r\nint main()\r\n{\r\n int a = 5, b = 5, c = 10, result;\r\n result = (a == b) && (c > b);\r\n printf(\"(a == b) && (c > b) is %d \\n\", result);\r\n result = (a == b) && (c < b);\r\n printf(\"(a == b) && (c < b) is %d \\n\", result);\r\n result = (a == b) || (c < b);\r\n printf(\"(a == b) || (c < b) is %d \\n\", result);\r\n result = (a != b) || (c < b);\r\n printf(\"(a != b) || (c < b) is %d \\n\", result);\r\n result = !(a != b);\r\n printf(\"!(a != b) is %d \\n\", result);\r\n result = !(a == b);\r\n printf(\"!(a == b) is %d \\n\", result);\r\n return 0;\r\n}', ''),
(13, 3, 'Bitwise Operators', 'During computation, mathematical operations like: addition, subtraction,\r\nmultiplication, division, etc are converted to bit-level which makes processing faster\r\nand saves power.\r\nBitwise operators are used in C programming to perform bit-level operations..\r\nOperators Meaning of operators\r\n&. Bitwise AND\r\n|. Bitwise OR\r\n^. Bitwise exclusive OR\r\n~ Bitwise complement\r\n<<. Shift left\r\n>> Shift right\r\n', '', ''),
(14, 4, 'if else', 'The if Statement\r\nUse the if statement to specify a block of code to be executed if a condition is true.\r\nSyntax\r\nIf (condition) {\r\n // block of code to be executed if the condition is true\r\n}\r\nExample\r\nIf (20 > 18) {\r\n Printf(“20 is greater than 18”);\r\n}\r\nThe else Statement\r\nUse the else statement to specify a block of code to be executed if the condition is false.\r\nSyntax\r\nIf (condition) {\r\n // block of code to be executed if the condition is true\r\n} else {\r\n // block of code to be executed if the condition is false\r\n}\r\nThe else if Statement\r\nUse the else if statement to specify a new condition if the first condition is false.\r\nSyntax\r\nIf (condition1) {\r\n // block of code to be executed if condition1 is true\r\n} else if (condition2) {\r\n // block of code to be executed if the condition1 is false and condition2 is true\r\n} else {\r\n // block of code to be executed if the condition1 is false and condition2 is false\r\n}\r\n', 'Int time = 22;\r\nIf (time < 10) {\r\n Printf(“Good morning.”);\r\n} else if (time < 20) {\r\n Printf(“Good day.”);\r\n} else {\r\n Printf(“Good evening.”);\r\n}', ''),
(15, 4, 'Switch Statement', '\r\nInstead of writing many if..else statements, you can use the switch statement.\r\nThe switch statement selects one of many code blocks to be executed:\r\nSyntax\r\nSwitch(expression) {\r\n Case x:\r\n // code block\r\n Break;\r\n Case y:\r\n // code block\r\n Break;\r\n Default:\r\n // code block\r\n}\r\nThis is how it works:\r\nThe switch expression is evaluated once\r\nThe value of the expression is compared with the values of each case\r\nIf there is a match, the associated block of code is executed\r\nThe break statement breaks out of the switch block and stops the execution\r\nThe default statement is optional, and specifies some code to run if there is no case match\r\nThe example below uses the weekday number to calculate the weekday name:', 'Switch (day) {\r\n Case 1:\r\n Printf(“Monday”);\r\n Break;\r\n Case 2:\r\n Printf(“Tuesday”);\r\n Break;\r\n Case 3:\r\n Printf(“Wednesday”);\r\n Break;\r\n Case 4:\r\n Printf(“Thursday”);\r\n Break;\r\n Case 5:\r\n Printf(“Friday”);\r\n Break;\r\n Case 6:\r\n Printf(“Saturday”);\r\n Break;\r\n Case 7:\r\n Printf(“Sunday”);\r\n Break;\r\n}', ''),
(16, 4, 'Break and Continue', 'Break\r\nYou have already seen the break statement used in an earlier chapter of this\r\ntutorial. It was used to \"jump out\" of a switch statement.\r\nThe break statement can also be used to jump out of a loop.\r\nThis example jumps out of the for loop when i is equal to 4:\r\nContinue\r\nThe continue statement breaks one iteration (in the loop), if a specified\r\ncondition occurs, and continues with the next iteration in the loop.\r\nThis example skips the value of 4:\r\n', '//break\r\nint i;\r\nfor (i = 0; i < 10; i++) {\r\nif (i == 4) {\r\nbreak;\r\n}\r\nprintf(\"%d\\n\", i);\r\n}\r\n//continue\r\nint i;\r\nfor (i = 0; i < 10; i++) {\r\nif (i == 4) {\r\ncontinue;\r\n}\r\nprintf(\"%d\\n\", i);\r\n}\r\n', ''),
(17, 1, 'Arrays', 'Arrays are used to store multiple values in a single variable, instead of declaring\r\nseparate variables for each value.\r\nTo create an array, define the data type (like int) and specify the name of the\r\narray followed by square brackets [].\r\nTo insert values to it, use a comma-separated list, inside curly braces:\r\nint myNumbers[] = {25, 50, 75, 100};\r\nWe have now created a variable that holds an array of four integers.\r\nAccess the Elements of an Array\r\nTo access an array element, refer to its index number.\r\nArray indexes start with 0: [0] is the first element. [1] is the second element,\r\netc.\r\nThis statement accesses the value of the first element [0] in myNumbers:\r\nExample\r\nint myNumbers[] = {25, 50, 75, 100};\r\nprintf(\"%d\", myNumbers[0]);\r\n// Outputs 25\r\nChange an Array Element\r\nTo change the value of a specific element, refer to the index number:\r\nExample\r\nmyNumbers[0] = 33;\r\nExample\r\nint myNumbers[] = {25, 50, 75, 100};\r\nmyNumbers[0] = 33;\r\nprintf(\"%d\", myNumbers[0]);\r\n// Now outputs 33 instead of 25\r\nLoop Through an Array\r\nYou can loop through the array elements with the for loop.\r\nThe following example outputs all elements in the myNumbers array:\r\nExample\r\nint myNumbers[] = {25, 50, 75, 100};\r\nint i;\r\nfor (i = 0; i < 4; i++) {\r\nprintf(\"%d\\n\", myNumbers[i]);\r\n}\r\nSet Array Size\r\nAnother common way to create arrays, is to specify the size of the array, and\r\nadd elements later:\r\nExample\r\n// Declare an array of four integers:\r\nint myNumbers[4];\r\n// Add elements\r\nmyNumbers[0] = 25;\r\nmyNumbers[1] = 50;\r\nmyNumbers[2] = 75;\r\nmyNumbers[3] = 100;\r\nUsing this method, you should know the size of the array, in order for the\r\nprogram to store enough memory.\r\nYou are not able to change the size of the array after creation', '', ''),
(18, 1, 'Strings', 'Strings are used for storing text/characters.\r\nFor example, \"Hello World\" is a string of characters.\r\nUnlike many other programming languages, C does not have a String type to\r\neasily create string variables. Instead, you must use the char type and create\r\nan array of characters to make a string in C:\r\nchar greetings[] = \"Hello World!\";\r\nNote that you have to use double quotes (\"\").\r\nTo output the string, you can use the printf() function together with the format\r\nspecifier %s to tell C that we are now working with strings:\r\nExample\r\nchar greetings[] = \"Hello World!\";\r\nprintf(\"%s\", greetings);\r\nAccess Strings\r\nSince strings are actually arrays in C, you can access a string by referring to its\r\nindex number inside square brackets [].\r\nThis example prints the first character (0) in greetings:\r\nExample\r\nchar greetings[] = \"Hello World!\";\r\nprintf(\"%c\", greetings[0]);\r\nModify Strings\r\nTo change the value of a specific character in a string, refer to the index\r\nnumber, and use single quotes:\r\nExample\r\nchar greetings[] = \"Hello World!\";\r\ngreetings[0] = \'J\';\r\nprintf(\"%s\", greetings);\r\n// Outputs Jello World! instead of Hello World!\r\nLoop Through a String\r\nYou can also loop through the characters of a string, using a for loop:\r\nExample\r\nchar carName[] = \"Volvo\";\r\nint i;\r\nfor (i = 0; i < 5; ++i) {\r\nprintf(\"%c\\n\", carName[i]);\r\n}\r\n', '', ''),
(20, 1, 'Functions', 'A function is a block of code which only runs when it is called.\r\nYou can pass data, known as parameters, into a function.\r\nFunctions are used to perform certain actions, and they are important for reusing code: Define\r\nthe code once, and use it many times.\r\nPredefined Functions\r\nSo it turns out you already know what a function is. You have been using it the whole time while\r\nstudying this tutorial!\r\nFor example, main() is a function, which is used to execute code, and printf() is a function; used\r\nto output/print text to the screen:\r\nExample\r\nInt main() {\r\n Printf(“Hello World!”);\r\n Return 0;\r\n}\r\nCreate a Function\r\nTo create (often referred to as declare) your own function, specify the name of the function,\r\nfollowed by parentheses () and curly brackets {}:\r\nSyntax\r\nVoid myFunction() {\r\n // code to be executed\r\n}\r\nExample Explained\r\nmyFunction() is the name of the function\r\nvoid means that the function does not have a return value. You will learn more about return\r\nvalues later in the next chapter\r\nInside the function (the body), add code that defines what the function should do\r\nCall a Function\r\nDeclared functions are not executed immediately. They are “saved for later use”, and will be\r\nexecuted when they are called.\r\nTo call a function, write the function’s name followed by two parentheses () and a semicolon ;\r\nIn the following example, myFunction() is used to print a text (the action), when it is called:\r\nExample\r\nInside main, call myFunction():\r\n// Create a function\r\nVoid myFunction() {\r\n Printf(“I just got executed!”);\r\n}\r\nInt main() {\r\n myFunction(); // call the function\r\n return 0;\r\n}', '', ''),
(21, 5, 'File Handling', 'File Handling\r\nIn C, you can create, open, read, and write to files by declaring a pointer of\r\ntype FILE, and use the fopen() function:\r\nFILE *fptr\r\nfptr = fopen(filename, mode);\r\nFILE is basically a data type, and we need to create a pointer variable to work\r\nwith it (fptr). For now, this line is not important. It\'s just something you need\r\nwhen working with files.\r\nTo actually open a file, use the fopen() function, which takes two parameters:\r\nParameter Description\r\nfilename The name of the actual file you want\r\nto open (or create),\r\nlike filename.txt\r\nmode A single character, which represents\r\nwhat you want to do with the file\r\n(read, write or append):\r\nw - Writes to a file\r\na - Appends new data to a file\r\nr - Reads from a file', '', ''),
(22, 5, 'Create a File', 'To create a file, you can use the w mode inside the fopen() function.\r\nThe w mode is used to write to a file. However, if the file does not exist, it will\r\ncreate one for you:', 'FILE *fptr;\r\n// Create a file\r\nfptr = fopen(\"filename.txt\", \"w\");\r\n// Close the file\r\nfclose(fpfile)', ''),
(23, 5, 'Write To a File', 'Let\'s use the w mode from the previous chapter again, and write something to\r\nthe file we just created.\r\nThe w mode means that the file is opened for writing. To insert content to it,\r\nyou can use the fprint() function and add the pointer variable (fptr in our\r\nexample) and some text:\r\n', 'FILE *fptr;\r\n// Open a file in writing mode\r\nfptr = fopen(\"filename.txt\", \"w\");\r\n// Write some text to the file\r\nfprintf(fptr, \"Some text\");\r\n// Close the file\r\nfclose(fptr);\r\n', ''),
(24, 5, 'Append Content To a File', 'If you want to add content to a file without deleting the old content, you can\r\nuse the a mode.\r\nThe a mode appends content at the end of the file:', 'FILE *fptr;\r\n// Open a file in append mode\r\nfptr = fopen(\"filename.txt\", \"a\");\r\n// Append some text to the file\r\nfprintf(fptr, \"\\nHi everybody!\");\r\n// Close the file\r\nfclose(fptr);', ''),
(25, 5, 'Read a File', 'In the previous chapter, we wrote to a file using w and a modes inside\r\nthe fopen() function.\r\nTo read from a file, you can use the r mode:', 'FILE *fptr;\r\n// Open a file in read mode\r\nfptr = fopen(\"filename.txt\", \"r\");\r\nThis will make the filename.txt opened for reading', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_Id` int(11) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_Id`, `First_Name`, `Last_Name`, `Email`, `Message`) VALUES
(2, 'ravi', 'raj', 'xyz@gmail.com', 'hu kon su?'),
(5, 'akshay', 'mauani', 'akshgay123@gmail.com', 'hii everyone'),
(6, 'Akshay', 'ka', 'xyz@gmail.com', 'huuuuuuuuu'),
(7, 'Akshay', 'kartik', 'raj123@gmail.com', 'kkkkkkkkkk');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Message` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_Id`, `Name`, `Email`, `Message`) VALUES
(1, 'ravi', 'ra@gmail.com', 'jiha menu'),
(2, 'akshay Mayani', 'ra12@gmail.com', 'your websites content is amazing and meaningfull then thank you sir'),
(3, 'ravi', 'ra@gmail.com', 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn');

-- --------------------------------------------------------

--
-- Table structure for table `java`
--

CREATE TABLE `java` (
  `Subtitle_id` int(11) NOT NULL,
  `Title_id` int(11) NOT NULL,
  `Subtitle` varchar(50) NOT NULL,
  `Description` varchar(8000) NOT NULL,
  `Example` varchar(1000) NOT NULL,
  `Output` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `java`
--

INSERT INTO `java` (`Subtitle_id`, `Title_id`, `Subtitle`, `Description`, `Example`, `Output`) VALUES
(1, 9, 'Introduction of java', 'About JAVA\n“Java refers to a number of computer software products and specifications from Sun Microsystems\n(the Java™ technology) that together provide a system for developing and deploying cross-platform\napplications. Java is used in a wide variety of computing platforms spanning from embedded devices\nand mobile phones on the low end to enterprise servers and super computers on the high end. Java\nis fairly ubiquitous in mobile phones, Web servers and enterprise applications, and somewhat less\ncommon in desktop applications, though users may have come across Java applets when browsing\nthe Web.\nWriting in the Java programming language is the primary way to produce code that will be deployed\nas Java bytecode, though there are compilers available for other languages such as JavaScript,\nPython and Ruby, and a native Java scripting language called Groovy. Java syntax borrows heavily\nfrom C and C++ but it eliminates certain low-level constructs such as pointers and has a very simple\nmemory model where every object is allocated on the heap and all variables of object types are\nreferences. Memory management is handled through integrated automatic garbage collection\nperformed by the Java Virtual Machine (JVM).”\n1\nOOP – Object Oriented Programming\nOOP is a particular style of programming which involves a particular way of designing solutions to\nparticular problems. Most modern programming languages, including Java, support this paradigm.\nWhen speaking about OOP one has to mention:\n Inheritance\n Modularity\n Polymorphism\n Encapsulation (binding code and its data)\nHowever at this point it is too early to try to fully understand these concepts.\nThis guide is divided into two major sections, the first section is an introduction to the language and\nillustrates various examples of code while the second part goes into more detail.\nMy first Java program\nOpen your text editor and type the following lines of code:\n/*\nMy first program\nVersion 1\n*/\npublic class Example1 {\n public static void main (String args []) {\n System.out.println (\"My first Java program\");\n }\n}\nSave the file as Example1.java2\n. The name of the program has to be similar to the filename.\nPrograms are called classes. Please note that Java is case-sensitive. You cannot name a file\n“Example.java” and then in the program you write “public class example”. It is good practice to\ninsert comments at the start of a program to help you as a programmer understand quickly what the\nparticular program is all about. This is done by typing “/*” at the start of the comment and “*/”\nwhen you finish. The predicted output of this program is:\nMy first Java program\nIn order to get the above output we have to first compile the program and then execute the\ncompiled class. The applications required for this job are available as part of the JDK:\n javac.exe – compiles the program\n java.exe – the interpreter used to execute the compiled program\nIn order to compile and execute the program we need to switch to the command prompt. On\nwindows systems this can be done by clicking Start>Run>cmd ', '', ''),
(2, 10, 'Variables', 'Variables\r\nA variable is a place where the program stores data temporarily. As the name implies the value\r\nstored in such a location can be changed while a program is executing (compare with constant).\r\nclass Example2 {\r\n public static void main(String args[]) {\r\n int var1; // this declares a variable\r\n int var2; // this declares another variable\r\n var1 = 1024; // this assigns 1024 to var1\r\n System.out.println(\"var1 contains \" + var1);\r\n var2 = var1 / 2;\r\n System.out.print(\"var2 contains var1 / 2: \");\r\n System.out.println(var2);\r\n }\r\n}\r\nPredicted Output:\r\nvar2 contains var1 / 2: 512\r\nThe above program uses two variables, var1 and var2. var1 is assigned a value directly while var2 is\r\nfilled up with the result of dividing var1 by 2, i.e. var2 = var1/2. The words int refer to a particular\r\ndata type, i.e. integer (whole numbers).', '', ''),
(3, 11, 'Mathematical Operators', 'As we saw in the preceding example there are particular symbols used to represent operators when\nperforming calculations:\nOperator Description Example – given a is 15 and b is 6\n+ Addition a + b, would return 21\n- Subtraction a - b, would return 9\n* Multiplication a * b, would return 90\n/ Division a / b, would return 2\n% Modulus a % b, would return 3 (the remainder)\nclass Example4 {\n public static void main(String args[]) {\nint iresult, irem;\ndouble dresult, drem;\niresult = 10 / 3;\nirem = 10 % 3;\ndresult = 10.0 / 3.0;\ndrem = 10.0 % 3.0;\nSystem.out.println(\"Result and remainder of 10 / 3: \" +\niresult + \" \" + irem);\nSystem.out.println(\"Result and remainder of 10.0 / 3.0: \"\n+ dresult + \" \" + drem);\n}\n}\nPredicted Output:\nResult and Remainder of 10/3: 3 1\nResult and Remainder of 10.0/3.0: 3.3333333333333335 1\nThe difference in range is due to the data type since ‘double’ is a double precision 64-bit floating\npoint value.\n', '', ''),
(4, 11, 'Logical Operators', 'These operators are used to evaluate an expression and depending on the operator used, a\r\nparticular output is obtained. In this case the operands must be Boolean data types and the result is\r\nalso Boolean. The following table shows the available logical operators:Operator Description\r\n& AND gate behaviour (0,0,0,1)\r\n| OR gate behaviour (0,1,1,1)\r\n^ XOR – exclusive OR (0,1,1,0)\r\n&& Short-circuit AND\r\n|| Short-circuit OR\r\n! Not\r\nExample', 'public static void main(String args[]) {\r\nint n, d;\r\nn = 10;\r\nd = 2;\r\nif(d != 0 && (n % d) == 0)\r\nSystem.out.println(d + \" is a factor of \" + n);\r\nd = 0; // now, set d to zero\r\n// Since d is zero, the second operand is not evaluated.\r\nif(d != 0 && (n % d) == 0)\r\nSystem.out.println(d + \" is a factor of \" + n);\r\n/* Now, try same thing without short-circuit operator.\r\nThis will cause a divide-by-zero error.\r\n*/\r\nif(d != 0 & (n % d) == 0)\r\nSystem.out.println(d + \" is a factor of \" + n);\r\n}\r\n}', ''),
(5, 11, 'Assignment Operators', 'A list of all assignment operators:\r\n\r\nOperator Example Same As	\r\n=	x = 5	x = 5	\r\n+=	x += 3	x = x + 3	\r\n-=	x -= 3	x = x - 3	\r\n*=	x *= 3	x = x * 3	\r\n/=	x /= 3	x = x / 3	\r\n%=	x %= 3	x = x % 3	\r\n&=	x &= 3	x = x & 3	\r\n|=	x |= 3	x = x | 3	\r\n^=	x ^= 3	x = x ^ 3	\r\n>>=	x >>= 3	x = x >> 3	\r\n<<=	x <<= 3	x = x << 3', '', ''),
(6, 11, 'Comparison Operators', 'Comparison operators are used to compare two values (or variables). This is important in programming, because it helps us to find answers and make decisions.\r\n\r\nThe return value of a comparison is either true or false. These values are known as Boolean values, and you will learn more about them in the Booleans and If..Else chapter.\r\nOperator	Name	Example	\r\n==	Equal to	x == y	\r\n!=	Not equal	x != y	\r\n>	Greater than	x > y	\r\n<	Less than	x < y	\r\n>=	Greater than or equal to	x >= y	\r\n<=	Less than or equal to	x <= y', '', ''),
(7, 12, 'Primitive data types', 'Data types are divided into two groups:\r\n\r\nPrimitive data types - includes byte, short, int, long, float, double, boolean and char\r\nNon-primitive data types - such as String, Arrays and Classes (you will learn more about these in a later chapter)\r\nPrimitive Data Types\r\nA primitive data type specifies the size and type of variable values, and it has no additional methods.\r\n\r\nThere are eight primitive data types in Java:\r\n\r\nData Type	Size	Description\r\nbyte	1 byte	Stores whole numbers from -128 to 127\r\nshort	2 bytes	Stores whole numbers from -32,768 to 32,767\r\nint	4 bytes	Stores whole numbers from -2,147,483,648 to 2,147,483,647\r\nlong	8 bytes	Stores whole numbers from -9,223,372,036,854,775,808 to 9,223,372,036,854,775,807\r\nfloat	4 bytes	Stores fractional numbers. Sufficient for storing 6 to 7 decimal digits\r\ndouble	8 bytes	Stores fractional numbers. Sufficient for storing 15 decimal digits\r\nboolean	1 bit	Stores true or false values\r\nchar	2 bytes	Stores a single character/letter or ASCII values\r\nTest Yourself With Exercises\r\nExercise:\r\nAdd the correct data type for the following variables:\r\n\r\n', ' myNum = 9;\r\n myFloatNum = 8.99f;\r\n myLetter = \'A\';\r\n myBool = false;\r\n myText = \"Hello World\";', ''),
(8, 12, 'Numbers', 'Primitive number types are divided into two groups:\r\n\r\nInteger types stores whole numbers, positive or negative (such as 123 or -456), without decimals. Valid types are byte, short, int and long. Which type you should use, depends on the numeric value.\r\n\r\nFloating point types represents numbers with a fractional part, containing one or more decimals. There are two types: float and double.\r\nInteger Types\r\nByte\r\nThe byte data type can store whole numbers from -128 to 127. This can be used instead of int or other integer types to save memory when you are certain that the value will be within -128 and 127:\r\n\r\nExample\r\nbyte myNum = 100;\r\nSystem.out.println(myNum);\r\nShort\r\nThe short data type can store whole numbers from -32768 to 32767:\r\n\r\nExample\r\nshort myNum = 5000;\r\nSystem.out.println(myNum);\r\nLong\r\nThe long data type can store whole numbers from -9223372036854775808 to 9223372036854775807. This is used when int is not large enough to store the value. Note that you should end the value with an \"L\":\r\n\r\nExample\r\nlong myNum = 15000000000L;\r\nSystem.out.println(myNum);\r\nFloating Point Types\r\nYou should use a floating point type whenever you need a number with a decimal, such as 9.99 or 3.14515.\r\n\r\nThe float and double data types can store fractional numbers. Note that you should end the value with an \"f\" for floats and \"d\" for doubles:\r\n\r\nFloat Example\r\nfloat myNum = 5.75f;\r\nSystem.out.println(myNum);\r\nDouble Example\r\ndouble myNum = 19.99d;\r\nSystem.out.println(myNum);', '', ''),
(9, 12, 'Boolean', 'Boolean Types\r\nVery often in programming, you will need a data type that can only have one of two values, like:\r\n\r\nYES / NO\r\nON / OFF\r\nTRUE / FALSE\r\nFor this, Java has a boolean data type, which can only take the values true or false:', 'boolean isJavaFun = true;\r\nboolean isFishTasty = false;\r\nSystem.out.println(isJavaFun);     // Outputs true\r\nSystem.out.println(isFishTasty);   // Outputs false', ''),
(10, 12, 'Characters and Strings', 'Characters\r\nThe char data type is used to store a single character. The character must be surrounded by single quotes, like \'A\' or \'c\':\r\n\r\nExample\r\nchar myGrade = \'B\';\r\nSystem.out.println(myGrade);\r\nStrings\r\nThe String data type is used to store a sequence of characters (text). String values must be surrounded by double quotes:\r\n\r\nExample\r\nString greeting = \"Hello World\";\r\nSystem.out.println(greeting);\r\n', '', ''),
(11, 12, 'Non-Primitive Data Types', 'Non-Primitive Data Types\r\nNon-primitive data types are called reference types because they refer to objects.\r\n\r\nThe main difference between primitive and non-primitive data types are:\r\n\r\nPrimitive types are predefined (already defined) in Java. Non-primitive types are created by the programmer and is not defined by Java (except for String).\r\nNon-primitive types can be used to call methods to perform certain operations, while primitive types cannot.\r\nA primitive type has always a value, while non-primitive types can be null.\r\nA primitive type starts with a lowercase letter, while non-primitive types starts with an uppercase letter.\r\nThe size of a primitive type depends on the data type, while non-primitive types have all the same size.', '', ''),
(12, 13, 'If ... Else', 'Java Conditions and If Statements\r\nYou already know that Java supports the usual logical conditions from mathematics:\r\n\r\nLess than: a < b\r\nLess than or equal to: a <= b\r\nGreater than: a > b\r\nGreater than or equal to: a >= b\r\nEqual to a == b\r\nNot Equal to: a != b\r\nYou can use these conditions to perform different actions for different decisions.\r\n\r\nJava has the following conditional statements:\r\n\r\nUse if to specify a block of code to be executed, if a specified condition is true\r\nUse else to specify a block of code to be executed, if the same condition is false\r\nUse else if to specify a new condition to test, if the first condition is false\r\nUse switch to specify many alternative blocks of code to be executed\r\nThe if Statement\r\nUse the if statement to specify a block of Java code to be executed if a condition is true.\r\n\r\nSyntax\r\nif (condition) {\r\n  // block of code to be executed if the condition is true\r\n}\r\nThe else Statement\r\nUse the else statement to specify a block of code to be executed if the condition is false.\r\n\r\nSyntax\r\nif (condition) {\r\n  // block of code to be executed if the condition is true\r\n} else {\r\n  // block of code to be executed if the condition is false\r\n}\r\nThe else if Statement\r\nUse the else if statement to specify a new condition if the first condition is false.\r\n\r\nSyntax\r\nif (condition1) {\r\n  // block of code to be executed if condition1 is true\r\n} else if (condition2) {\r\n  // block of code to be executed if the condition1 is false and condition2 is true\r\n} else {\r\n  // block of code to be executed if the condition1 is false and condition2 is false\r\n}\r\n', 'int time = 22;\r\nif (time < 10) {\r\n  System.out.println(\"Good morning.\");\r\n} else if (time < 18) {\r\n  System.out.println(\"Good day.\");\r\n} else {\r\n  System.out.println(\"Good evening.\");\r\n}\r\n// Outputs \"Good evening.\"', ''),
(13, 13, 'Switch', 'Java Switch Statements\r\nInstead of writing many if..else statements, you can use the switch statement.\r\n\r\nThe switch statement selects one of many code blocks to be executed:\r\n\r\nSyntax\r\nswitch(expression) {\r\n  case x:\r\n    // code block\r\n    break;\r\n  case y:\r\n    // code block\r\n    break;\r\n  default:\r\n    // code block\r\n}\r\nThis is how it works:\r\n\r\nThe switch expression is evaluated once.\r\nThe value of the expression is compared with the values of each case.\r\nIf there is a match, the associated block of code is executed.\r\nThe break and default keywords are optional, and will be described later in this chapter\r\nThe example below uses the weekday number to calculate the weekday name:\r\n\r\nExample\r\nint day = 4;\r\nswitch (day) {\r\n  case 1:\r\n    System.out.println(\"Monday\");\r\n    break;\r\n  case 2:\r\n    System.out.println(\"Tuesday\");\r\n    break;\r\n  case 3:\r\n    System.out.println(\"Wednesday\");\r\n    break;\r\n  case 4:\r\n    System.out.println(\"Thursday\");\r\n    break;\r\n  case 5:\r\n    System.out.println(\"Friday\");\r\n    break;\r\n  case 6:\r\n    System.out.println(\"Saturday\");\r\n    break;\r\n  case 7:\r\n    System.out.println(\"Sunday\");\r\n    break;\r\n}\r\n// Outputs \"Thursday\" (day 4)\r\nThe default Keyword\r\nThe default keyword specifies some code to run if there is no case match:\r\n\r\nExample\r\nint day = 4;\r\nswitch (day) {\r\n  case 6:\r\n    System.out.println(\"Today is Saturday\");\r\n    break;\r\n  case 7:\r\n    System.out.println(\"Today is Sunday\");\r\n    break;\r\n  default:\r\n    System.out.println(\"Looking forward to the Weekend\");\r\n}\r\n// Outputs \"Looking forward to the Weekend\"\r\n \r\n\r\n', '', ''),
(14, 13, 'While Loop', 'Loops\r\nLoops can execute a block of code as long as a specified condition is reached.\r\n\r\nLoops are handy because they save time, reduce errors, and they make code more readable.\r\n\r\nJava While Loop\r\nThe while loop loops through a block of code as long as a specified condition is true:\r\n\r\nSyntax\r\nwhile (condition) {\r\n  // code block to be executed\r\n}\r\nIn the example below, the code in the loop will run, over and over again, as long as a variable (i) is less than 5:\r\n\r\nExample\r\nint i = 0;\r\nwhile (i < 5) {\r\n  System.out.println(i);\r\n  i++;\r\n}\r\nThe Do/While Loop\r\nThe do/while loop is a variant of the while loop. This loop will execute the code block once, before checking if the condition is true, then it will repeat the loop as long as the condition is true.\r\n\r\nSyntax\r\ndo {\r\n  // code block to be executed\r\n}\r\nwhile (condition);\r\nThe example below uses a do/while loop. The loop will always be executed at least once, even if the condition is false, because the code block is executed before the condition is tested:\r\n\r\nExample\r\nint i = 0;\r\ndo {\r\n  System.out.println(i);\r\n  i++;\r\n}\r\nwhile (i < 5);', '', ''),
(15, 13, 'For Loop', 'Java For Loop\r\nWhen you know exactly how many times you want to loop through a block of code, use the for loop instead of a while loop:\r\n\r\nSyntax\r\nfor (statement 1; statement 2; statement 3) {\r\n  // code block to be executed\r\n}\r\nStatement 1 is executed (one time) before the execution of the code block.\r\n\r\nStatement 2 defines the condition for executing the code block.\r\n\r\nStatement 3 is executed (every time) after the code block has been executed.\r\n\r\nThe example below will print the numbers 0 to 4:\r\n\r\nExample\r\nfor (int i = 0; i < 5; i++) {\r\n  System.out.println(i);\r\n}\r\nNested Loops\r\nIt is also possible to place a loop inside another loop. This is called a nested loop.\r\n\r\nThe \"inner loop\" will be executed one time for each iteration of the \"outer loop\":\r\n\r\nExample\r\n// Outer loop\r\nfor (int i = 1; i <= 2; i++) {\r\n  System.out.println(\"Outer: \" + i); // Executes 2 times\r\n  \r\n  // Inner loop\r\n  for (int j = 1; j <= 3; j++) {\r\n    System.out.println(\" Inner: \" + j); // Executes 6 times (2 * 3)\r\n  }\r\n} \r\n', '', ''),
(16, 13, 'Break and Continue', 'Java Break\r\nYou have already seen the break statement used in an earlier chapter of this tutorial. It was used to \"jump out\" of a switch statement.\r\n\r\nThe break statement can also be used to jump out of a loop.\r\n\r\nThis example stops the loop when i is equal to 4:\r\n\r\nExample\r\nfor (int i = 0; i < 10; i++) {\r\n  if (i == 4) {\r\n    break;\r\n  }\r\n  System.out.println(i);\r\n}\r\nJava Continue\r\nThe continue statement breaks one iteration (in the loop), if a specified condition occurs, and continues with the next iteration in the loop.\r\n\r\nThis example skips the value of 4:\r\n\r\nExample\r\nfor (int i = 0; i < 10; i++) {\r\n  if (i == 4) {\r\n    continue;\r\n  }\r\n  System.out.println(i);\r\n}\r\nBreak and Continue in While Loop\r\nYou can also use break and continue in while loops:\r\n\r\nBreak Example\r\nint i = 0;\r\nwhile (i < 10) {\r\n  System.out.println(i);\r\n  i++;\r\n  if (i == 4) {\r\n    break;\r\n  }\r\n}\r\n \r\n\r\nContinue Example\r\nint i = 0;\r\nwhile (i < 10) {\r\n  if (i == 4) {\r\n    i++;\r\n    continue;\r\n  }\r\n  System.out.println(i);\r\n  i++;\r\n}', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `Language_Id` int(11) NOT NULL,
  `Language_Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`Language_Id`, `Language_Name`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'Java'),
(4, 'Php'),
(5, 'Javascript'),
(6, 'Jquery'),
(7, 'Html'),
(8, 'Css'),
(9, 'Python'),
(10, 'Linux'),
(11, 'Visual Basics ');

-- --------------------------------------------------------

--
-- Stand-in structure for view `language content`
-- (See below for the actual view)
--
CREATE TABLE `language content` (
`Language_Name` varchar(15)
,`Title_Name` varchar(50)
,`Subtitle_id` int(11)
,`Subtitle` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `language report`
-- (See below for the actual view)
--
CREATE TABLE `language report` (
`Language_Id` int(11)
,`Language_Name` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `language_title`
--

CREATE TABLE `language_title` (
  `Title_Id` int(11) NOT NULL,
  `Title_Name` varchar(50) NOT NULL,
  `Language_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language_title`
--

INSERT INTO `language_title` (`Title_Id`, `Title_Name`, `Language_Id`) VALUES
(1, 'Basics of C', 1),
(2, 'Variables', 1),
(3, 'Operators', 1),
(4, 'conditional statements', 1),
(5, 'Files', 1),
(6, 'Basics of PHP', 4),
(7, 'Strings', 4),
(8, 'Operators', 4),
(9, 'Basics of java', 3),
(10, 'Variables', 3),
(11, 'Operators', 3),
(12, 'Data types', 3),
(13, 'conditional statements', 3);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Package_Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Package_Desc` varchar(150) NOT NULL,
  `Duration` int(5) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Package_Id`, `Title`, `Package_Desc`, `Duration`, `Price`) VALUES
(1, 'Basic', 'languages like c++,java,php', 1, 99),
(2, 'Pro', 'languages like c++,java,php', 6, 349),
(3, 'Premium', 'languages like c++,java,php', 12, 559);

-- --------------------------------------------------------

--
-- Stand-in structure for view `package report`
-- (See below for the actual view)
--
CREATE TABLE `package report` (
`Package_Id` int(11)
,`Title` varchar(100)
,`Package_Desc` varchar(150)
,`Duration` int(5)
,`Price` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Package_Id` int(11) NOT NULL,
  `Payment_Status` int(11) NOT NULL,
  `Payment_Amount` int(11) NOT NULL,
  `Payment_Method` varchar(30) NOT NULL,
  `Date_Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `php`
--

CREATE TABLE `php` (
  `Subtitle_id` int(11) NOT NULL,
  `Title_id` int(11) NOT NULL,
  `Subtitle` varchar(50) NOT NULL,
  `Description` varchar(8000) NOT NULL,
  `Example` varchar(1000) NOT NULL,
  `Output` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `php`
--

INSERT INTO `php` (`Subtitle_id`, `Title_id`, `Subtitle`, `Description`, `Example`, `Output`) VALUES
(1, 6, 'Basics', 'What is PHP?\r\n•	PHP is an acronym for \"PHP: Hypertext Preprocessor\"\r\n•	PHP is a widely-used, open source scripting language\r\n•	PHP scripts are executed on the server\r\n•	PHP is free to download and use\r\nPHP is an amazing and popular language!\r\nIt is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!\r\nIt is deep enough to run large social networks!\r\nIt is also easy enough to be a beginner\'s first server side language!\r\n________________________________________\r\nWhat is a PHP File?\r\n•	PHP files can contain text, HTML, CSS, JavaScript, and PHP code\r\n•	PHP code is executed on the server, and the result is returned to the browser as plain HTML\r\n•	PHP files have extension \".php\"\r\n________________________________________\r\nWhat Can PHP Do?\r\n•	PHP can generate dynamic page content\r\n•	PHP can create, open, read, write, delete, and close files on the server\r\n•	PHP can collect form data\r\n•	PHP can send and receive cookies\r\n•	PHP can add, delete, modify data in your database\r\n•	PHP can be used to control user-access\r\n•	PHP can encrypt data\r\nWith PHP you are not limited to output HTML. You can output images or PDF files. You can also output any text, such as XHTML and XML.\r\n________________________________________\r\nWhy PHP?\r\n•	PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)\r\n•	PHP is compatible with almost all servers used today (Apache, IIS, etc.)\r\n•	PHP supports a wide range of databases\r\n•	PHP is free. Download it from the official PHP resource: www.php.net\r\n•	PHP is easy to learn and runs efficiently on the server side\r\n', '', ''),
(2, 6, 'PHP Syntax', 'Basic PHP Syntax\r\nA PHP script can be placed anywhere in the document.\r\nA PHP script starts with <?php and ends with ?>:\r\n<?php\r\n// PHP code goes here\r\n?>\r\nThe default file extension for PHP files is \".php\".\r\nA PHP file normally contains HTML tags, and some PHP scripting code.\r\nBelow, we have an example of a simple PHP file, with a PHP script that uses a built-in PHP function \"echo\" to output the text \"Hello World!\" on a web page:\r\n', '<!DOCTYPE html>\r\n<html>\r\n<body>\r\n\r\n<h1>My first PHP page</h1>\r\n\r\n<?php\r\necho \"Hello World!\";\r\n?>\r\n\r\n</body>\r\n</html>\r\n', ''),
(3, 6, 'PHP Comments', 'Comments in PHP\r\nA comment in PHP code is a line that is not executed as a part of the program. Its only purpose is to be read by someone who is looking at the code.\r\nComments can be used to:\r\n•	Let others understand your code\r\n•	Remind yourself of what you did - Most programmers have experienced coming back to their own work a year or two later and having to re-figure out what they did. Comments can remind you of what you were thinking when you wrote the code\r\nSyntax for single-line comments:\r\n<!DOCTYPE html>\r\n<html>\r\n<body>\r\n\r\n<?php\r\n// This is a single-line comment\r\n\r\n# This is also a single-line comment\r\n?>\r\n\r\n</body>\r\n</html>\r\n', '<!DOCTYPE html>\r\n<html>\r\n<body>\r\n\r\n<?php\r\n// You can also use comments to leave out parts of a code line\r\n$x = 5 /* + 15 */ + 5;\r\necho $x;\r\n?>\r\n\r\n</body>\r\n</html>\r\n', ''),
(4, 6, 'Types of values', 'Every single expression in PHP has one of the following built-in types depending on its value:\r\no	null\r\no	bool\r\no	int\r\no	float (floating-point number)\r\no	string\r\no	array\r\no	object\r\no	callable\r\no	resource\r\nPHP is a dynamically typed language, which means that by default there is no need to specify the type of a variable, as this will be determined at runtime. However, it is possible to statically type some aspect of the language via the use of type declarations.\r\nTypes restrict the kind of operations that can be performed on them. However, if an expression/variable is used in an operation which its type does not support, PHP will attempt to type juggle the value into a type that supports the operation. This process depends on the context in which the value is used. For more information, see the section on Type Juggling.\r\nNULL\r\nThe null type is PHP\'s unit type, i.e. it has only one value: null.\r\nUndefined, and unset() variables will resolve to the value null.\r\nSyntax\r\nThere is only one value of type null, and that is the case-insensitive constant null.\r\n<?php\r\n$var = NULL;       \r\n?>\r\nBooleans\r\nThe bool type only has two values, and is used to express a truth value. It can be either true or false.\r\nSyntax\r\nTo specify a bool literal, use the constants true or false. Both are case-insensitive.\r\n<?php\r\n$foo = True; // assign the value TRUE to $foo\r\n?>\r\nIntegers\r\nAn int is a number of the set ℤ = {..., -2, -1, 0, 1, 2, ...}.\r\n\r\nSyntax\r\nInts can be specified in decimal (base 10), hexadecimal (base 16), octal (base 8) or binary (base 2) notation. The negation operator can be used to denote a negative int.\r\nTo use octal notation, precede the number with a 0 (zero). As of PHP 8.1.0, octal notation can also be preceded with 0o or 0O. To use hexadecimal notation precede the number with 0x. To use binary notation precede the number with 0b.\r\nAs of PHP 7.4.0, integer literals may contain underscores (_) between digits, for better readability of literals. These underscores are removed by PHP\'s scanner.\r\nExample #1 Integer literals\r\n<?php\r\n$a = 1234; // decimal number\r\n$a = 0123; // octal number (equivalent to 83 decimal)\r\n$a = 0o123; // octal number (as of PHP 8.1.0)\r\n$a = 0x1A; // hexadecimal number (equivalent to 26 decimal)\r\n$a = 0b11111111; // binary number (equivalent to 255 decimal)\r\n$a = 1_234_567; // decimal number (as of PHP 7.4.0)\r\n?>\r\nFormally, the structure for int literals is as of PHP 8.1.0 (previously, the 0o or 0O octal prefixes were not allowed, and prior to PHP 7.4.0 the underscores were not allowed):\r\ndecimal     : [1-9][0-9]*(_[0-9]+)*\r\n            | 0\r\n\r\nhexadecimal : 0[xX][0-9a-fA-F]+(_[0-9a-fA-F]+)*\r\n\r\noctal       : 0[oO]?[0-7]+(_[0-7]+)*\r\n\r\nbinary      : 0[bB][01]+(_[01]+)*\r\n\r\ninteger     : decimal\r\n            | hexadecimal\r\n            | octal\r\n            | binary\r\nThe size of an int is platform-dependent, although a maximum value of about two billion is the usual value (that\'s 32 bits signed). 64-bit platforms usually have a maximum value of about 9E18. PHP does not support unsigned ints. int size can be determined using the constant PHP_INT_SIZE, maximum value using the constant PHP_INT_MAX, and minimum value using the constant PHP_INT_MIN.\r\nInteger overflow ¶\r\nIf PHP encounters a number beyond the bounds of the int type, it will be interpreted as a float instead. Also, an operation which results in a number beyond the bounds of the int type will return a float instead.\r\nExample #2 Integer overflow on a 32-bit system\r\n<?php\r\n$large_number = 2147483647;\r\nvar_dump($large_number);                     // int(2147483647)\r\n\r\n$large_number = 2147483648;\r\nvar_dump($large_number);                     // float(2147483648)\r\n\r\n$million = 1000000;\r\n$large_number =  50000 * $million;\r\nvar_dump($large_number);                     // float(50000000000)\r\n?>\r\n\r\nThere is no int division operator in PHP, to achieve this use the intdiv() function. 1/2 yields the float 0.5. The value can be cast to an int to round it towards zero, or the round() function provides finer control over rounding.\r\n<?php\r\nvar_dump(25/7);         // float(3.5714285714286)\r\nvar_dump((int) (25/7)); // int(3)\r\nvar_dump(round(25/7));  // float(4)\r\n?>\r\nFloating point numbers\r\nFloating point numbers (also known as \"floats\", \"doubles\", or \"real numbers\") can be specified using any of the following syntaxes:\r\n<?php\r\n$a = 1.234; \r\n$b = 1.2e3; \r\n$c = 7E-10;\r\n$d = 1_234.567; // as of PHP 7.4.0\r\n?>\r\n', '', ''),
(5, 7, 'Single quoted', 'A string is series of characters, where a character is the same as a byte. This means that PHP only supports a 256-character set, and hence does not offer native Unicode support. See details of the string type.\r\nNote: On 32-bit builds, a string can be as large as up to 2GB (2147483647 bytes maximum)\r\nSyntax ¶\r\nA string literal can be specified in four different ways:\r\no	single quoted\r\no	double quoted\r\no	heredoc syntax\r\no	nowdoc syntax\r\nSingle quoted\r\nThe simplest way to specify a string is to enclose it in single quotes (the character \').\r\nTo specify a literal single quote, escape it with a backslash (\\). To specify a literal backslash, double it (\\\\). All other instances of backslash will be treated as a literal backslash: this means that the other escape sequences you might be used to, such as \\r or \\n, will be output literally as specified rather than having any special meaning.\r\nNote: Unlike the double-quoted and heredoc syntaxes, variables and escape sequences for special characters will not be expanded when they occur in single quoted strings.\r\n<?php\r\necho \'this is a simple string\';\r\n\r\necho \'You can also have embedded newlines in\r\nstrings this way as it is\r\nokay to do\';\r\n\r\n// Outputs: Arnold once said: \"I\'ll be back\"\r\necho \'Arnold once said: \"I\\\'ll be back\"\';\r\n\r\n// Outputs: You deleted C:\\*.*?\r\necho \'You deleted C:\\\\*.*?\';\r\n\r\n// Outputs: You deleted C:\\*.*?\r\necho \'You deleted C:\\*.*?\';\r\n\r\n// Outputs: This will not expand: \\n a newline\r\necho \'This will not expand: \\n a newline\';\r\n\r\n// Outputs: Variables do not $expand $either\r\necho \'Variables do not $expand $either\';\r\n?>\r\n', '', ''),
(6, 7, 'double quoted', 'If the string is enclosed in double-quotes (\"), PHP will interpret the following escape sequences for special characters:\r\nEscaped characters\r\nSequence	Meaning\r\n\\n	linefeed (LF or 0x0A (10) in ASCII)\r\n\\r	carriage return (CR or 0x0D (13) in ASCII)\r\n\\t	horizontal tab (HT or 0x09 (9) in ASCII)\r\n\\v	vertical tab (VT or 0x0B (11) in ASCII)\r\n\\e	escape (ESC or 0x1B (27) in ASCII)\r\n\\f	form feed (FF or 0x0C (12) in ASCII)\r\n\\\\	backslash\r\n\\$	dollar sign\r\n\\\"	double-quote\r\n\\[0-7]{1,3}	the sequence of characters matching the regular expression is a character in octal notation, which silently overflows to fit in a byte (e.g. \"\\400\" === \"\\000\")\r\n\\x[0-9A-Fa-f]{1,2}	the sequence of characters matching the regular expression is a character in hexadecimal notation\r\n\\u{[0-9A-Fa-f]+}	the sequence of characters matching the regular expression is a Unicode codepoint, which will be output to the string as that codepoint\'s UTF-8 representation\r\nAs in single quoted strings, escaping any other character will result in the backslash being printed too.\r\nThe most important feature of double-quoted strings is the fact that variable names will be expanded.', '', ''),
(7, 7, 'Heredoc', 'A third way to delimit strings is the heredoc syntax: <<<. After this operator, an identifier is provided, then a newline. The string itself follows, and then the same identifier again to close the quotation.\r\nThe closing identifier may be indented by space or tab, in which case the indentation will be stripped from all lines in the doc string. Prior to PHP 7.3.0, the closing identifier must begin in the first column of the line.\r\nAlso, the closing identifier must follow the same naming rules as any other label in PHP: it must contain only alphanumeric characters and underscores, and must start with a non-digit character or underscore.\r\n', '<?php\r\n// no indentation\r\necho <<<END\r\n      a\r\n     b\r\n    c\r\n\\n\r\nEND;\r\n\r\n// 4 spaces of indentation\r\necho <<<END\r\n      a\r\n     b\r\n    c\r\n    END;\r\n', ''),
(8, 7, 'Nowdoc', 'Nowdocs are to single-quoted strings what heredocs are to double-quoted strings. A nowdoc is specified similarly to a heredoc, but no parsing is done inside a nowdoc. The construct is ideal for embedding PHP code or other large blocks of text without the need for escaping. It shares some features in common with the SGML <![CDATA[ ]]> construct, in that it declares a block of text which is not for parsing.\r\nA nowdoc is identified with the same <<< sequence used for heredocs, but the identifier which follows is enclosed in single quotes, e.g. <<<\'EOT\'. All the rules for heredoc identifiers also apply to nowdoc identifiers, especially those regarding the appearance of the closing identifier.\r\nExample #1 Nowdoc string quoting example\r\n', '<?php\r\necho <<<\'EOD\'\r\nExample of string spanning multiple lines\r\nusing nowdoc syntax. Backslashes are always treated literally,\r\ne.g. \\\\ and \\\'.\r\nEOD;\r\n', ''),
(9, 6, 'Arrays', 'An array in PHP is actually an ordered map. A map is a type that associates values to keys. This type is optimized for several different uses; it can be treated as an array, list (vector), hash table (an implementation of a map), dictionary, collection, stack, queue, and probably more. As array values can be other arrays, trees and multidimensional arrays are also possible.\r\nExplanation of those data structures is beyond the scope of this manual, but at least one example is provided for each of them. For more information, look towards the considerable literature that exists about this broad topic.\r\nSyntax\r\nSpecifying with array()\r\nAn array can be created using the array() language construct. It takes any number of comma-separated key => value pairs as arguments.\r\narray(\r\n    key  => value,\r\n    key2 => value2,\r\n    key3 => value3,\r\n    ...\r\n)\r\nThe comma after the last array element is optional and can be omitted. This is usually done for single-line arrays, i.e. array(1, 2) is preferred over array(1, 2, ). For multi-line arrays on the other hand the trailing comma is commonly used, as it allows easier addition of new elements at the end.\r\nNote:\r\nA short array syntax exists which replaces array() with [].\r\nExample #1 A simple array\r\n<?php\r\n$array = array(\r\n    \"foo\" => \"bar\",\r\n    \"bar\" => \"foo\",\r\n);\r\n\r\n// Using the short array syntax\r\n$array = [\r\n    \"foo\" => \"bar\",\r\n    \"bar\" => \"foo\",\r\n];\r\n?>\r\nThe key can either be an int or a string. The value can be of any type.\r\nAdditionally the following key casts will occur:\r\no	Strings containing valid decimal ints, unless the number is preceded by a + sign, will be cast to the int type. E.g. the key \"8\" will actually be stored under 8. On the other hand \"08\" will not be cast, as it isn\'t a valid decimal integer.\r\no	Floats are also cast to ints, which means that the fractional part will be truncated. E.g. the key 8.7 will actually be stored under 8.\r\no	Bools are cast to ints, too, i.e. the key true will actually be stored under 1 and the key false under 0.\r\no	Null will be cast to the empty string, i.e. the key null will actually be stored under \"\".\r\no	Arrays and objects can not be used as keys. Doing so will result in a warning: Illegal offset type.\r\nIf multiple elements in the array declaration use the same key, only the last one will be used as all others are overwritten.\r\nExample #2 Type Casting and Overwriting example\r\n', '<?php\r\n$array = array(\r\n    1    => \"a\",\r\n    \"1\"  => \"b\",\r\n    1.5  => \"c\",\r\n    true => \"d\",\r\n);\r\nvar_dump($array);\r\n?>\r\n', ''),
(10, 6, 'class', 'Basic class definitions begin with the keyword class, followed by a class name, followed by a pair of curly braces which enclose the definitions of the properties and methods belonging to the class.\r\nThe class name can be any valid label, provided it is not a PHP reserved word. A valid class name starts with a letter or underscore, followed by any number of letters, numbers, or underscores. As a regular expression, it would be expressed thus: ^[a-zA-Z_\\x80-\\xff][a-zA-Z0-9_\\x80-\\xff]*$.\r\nA class may contain its own constants, variables (called \"properties\"), and functions (called \"methods\").\r\nExample #1 Simple Class definition\r\n', '<?php\r\nclass SimpleClass\r\n{\r\n    // property declaration\r\n    public $var = \'a default value\';\r\n\r\n    // method declaration\r\n    public function displayVar() {\r\n        echo $this->var;\r\n    }\r\n}\r\n?>\r\n', ''),
(11, 6, 'Variable', 'Basics\r\nVariables in PHP are represented by a dollar sign followed by the name of the variable. The variable name is case-sensitive.\r\nVariable names follow the same rules as other labels in PHP. A valid variable name starts with a letter or underscore, followed by any number of letters, numbers, or underscores. As a regular expression, it would be expressed thus: ^[a-zA-Z_\\x80-\\xff][a-zA-Z0-9_\\x80-\\xff]*$\r\nNote: For our purposes here, a letter is a-z, A-Z, and the bytes from 128 through 255 (0x80-0xff).\r\nNote: $this is a special variable that can\'t be assigned. Prior to PHP 7.1.0, indirect assignment (e.g. by using variable variables) was possible.\r\nPredefined Variables\r\nPHP provides a large number of predefined variables to any script which it runs. Many of these variables, however, cannot be fully documented as they are dependent upon which server is running, the version and setup of the server, and other factors. Some of these variables will not be available when PHP is run on the command line. Refer to the list of predefined variables for details.\r\nPHP also provides an additional set of predefined arrays containing variables from the web server (if applicable), the environment, and user input. These arrays are rather special in that they are automatically global - i.e., automatically available in every scope. For this reason, they are often known as \"superglobals\". (There is no mechanism in PHP for user-defined superglobals.) Refer to the list of superglobals for details.\r\nVariable scope\r\nThe scope of a variable is the context within which it is defined. For the most part all PHP variables only have a single scope. This single scope spans included and required files as well. For example:\r\n<?php\r\n$a = 1;\r\ninclude \'b.inc\';\r\n?>\r\nHere the $a variable will be available within the included b.inc script. However, within user-defined functions a local function scope is introduced. Any variable used inside a function is by default limited to the local function scope. \r\nThe global keyword\r\nFirst, an example use of global:\r\nExample #1 Using global\r\n<?php\r\n$a = 1;\r\n$b = 2;\r\n\r\nfunction Sum()\r\n{\r\n    global $a, $b;\r\n\r\n    $b = $a + $b;\r\n} \r\n\r\nSum();\r\necho $b;\r\n?>\r\nThe above script will output 3. By declaring $a and $b global within the function, all references to either variable will refer to the global version. There is no limit to the number of global variables that can be manipulated by a function.\r\nVariable variables\r\nSometimes it is convenient to be able to have variable variable names. That is, a variable name which can be set and used dynamically. A normal variable is set with a statement such as:\r\n<?php\r\n$a = \'hello\';\r\n?>\r\nA variable variable takes the value of a variable and treats that as the name of a variable. In the above example, hello, can be used as the name of a variable by using two dollar signs. i.e.\r\n<?php\r\n$$a = \'world\';\r\n?>\r\nAt this point two variables have been defined and stored in the PHP symbol tree: $a with contents \"hello\" and $hello with contents \"world\". Therefore, this statement:\r\n<?php\r\necho \"$a ${$a}\";\r\n?>\r\nproduces the exact same output as:\r\n<?php\r\necho \"$a $hello\";\r\n?>\r\ni.e. they both produce: hello world.\r\nIn order to use variable variables with arrays, you have to resolve an ambiguity problem. That is, if you write $$a[1] then the parser needs to know if you meant to use $a[1] as a variable, or if you wanted $$a as the variable and then the [1] index from that variable. The syntax for resolving this ambiguity is: ${$a[1]} for the first case and ${$a}[1] for the second.\r\n', '<?php\r\nclass foo {\r\n    var $bar = \'I am bar.\';\r\n    var $arr = array(\'I am A.\', \'I am B.\', \'I am C.\');\r\n    var $r   = \'I am r.\';\r\n}\r\n\r\n$foo = new foo();\r\n$bar = \'bar\';\r\n$baz = array(\'foo\', \'bar\', \'baz\', \'quux\');\r\necho $foo->$bar . \"\\n\";\r\necho $foo->{$baz[1]} . \"\\n\";\r\n\r\n$start = \'b\';\r\n$end   = \'ar\';\r\necho $foo->{$start . $end} . \"\\n\";\r\n\r\n$arr = \'arr\';\r\necho $foo->{$arr[1]} . \"\\n\";\r\n\r\n?>\r\n', ''),
(12, 8, 'Types of operators', 'Types of operators\r\n•	Operator Precedence\r\n•	Arithmetic Operators\r\n•	Assignment Operators\r\n•	Bitwise Operators\r\n•	Comparison Operators\r\n•	Error Control Operators\r\n•	Execution Operators\r\n•	Incrementing/Decrementing Operators\r\n•	Logical Operators\r\n•	String Operators\r\n•	Array Operators\r\n•	Type Operators\r\nAn operator is something that takes one or more values (or expressions, in programming jargon) and yields another value (so that the construction itself becomes an expression).\r\nOperators can be grouped according to the number of values they take. Unary operators take only one value, for example ! (the logical not operator) or ++ (the increment operator). Binary operators take two values, such as the familiar arithmetical operators + (plus) and - (minus), and the majority of PHP operators fall into this category. Finally, there is a single ternary operator, ? :, which takes three values; this is usually referred to simply as \"the ternary operator\" (although it could perhaps more properly be called the conditional operator).\r\nA full list of PHP operators follows in the section Operator Precedence. The section also explains operator precedence and associativity, which govern exactly how expressions containing several different operators are evaluated.\r\n\r\nOperator Precedence\r\nThe precedence of an operator specifies how \"tightly\" it binds two expressions together. For example, in the expression 1 + 5 * 3, the answer is 16 and not 18 because the multiplication (\"*\") operator has a higher precedence than the addition (\"+\") operator. Parentheses may be used to force precedence, if necessary. For instance: (1 + 5) * 3 evaluates to 18.\r\nWhen operators have equal precedence their associativity decides how the operators are grouped. For example \"-\" is left-associative, so 1 - 2 - 3 is grouped as (1 - 2) - 3 and evaluates to -4. \"=\" on the other hand is right-associative, so $a = $b = $c is grouped as $a = ($b = $c).\r\nOperators of equal precedence that are non-associative cannot be used next to each other, for example 1 < 2 > 1 is illegal in PHP. The expression 1 <= 1 == 1 on the other hand is legal, because the == operator has a lower precedence than the <= operator.\r\nAssociativity is only meaningful for binary (and ternary) operators. Unary operators are either prefix or postfix so this notion is not applicable. For example !!$a can only be grouped as !(!$a).\r\nUse of parentheses, even when not strictly necessary, can often increase readability of the code by making grouping explicit rather than relying on the implicit operator precedence and associativity.\r\nThe following table lists the operators in order of precedence, with the highest-precedence ones at the top. Operators on the same line have equal precedence, in which case associativity decides grouping.\r\nOperator Precedence\r\nAssociativity	Operators	Additional Information\r\n(n/a)	clone new	clone and new\r\n\r\nright	**	arithmetic\r\n\r\n(n/a)	+ - ++ -- ~ (int) (float) (string) (array) (object) (bool) @	arithmetic (unary + and -), increment/decrement, bitwise, type casting and error control\r\n\r\nleft	instanceof	type\r\n\r\n(n/a)	!	logical\r\n\r\nleft	* / %	arithmetic\r\n\r\nleft	+ - .	arithmetic (binary + and -), array and string (. prior to PHP 8.0.0)\r\n\r\nleft	<< >>	bitwise\r\n\r\nleft	.	string (as of PHP 8.0.0)\r\n\r\nnon-associative	< <= > >=	comparison\r\n\r\nnon-associative	== != === !== <> <=>	comparison\r\n\r\nleft	&	bitwise and references\r\n\r\nleft	^	bitwise\r\n\r\nleft	|	bitwise\r\n\r\nleft	&&	logical\r\n\r\nleft	||	logical\r\n\r\nright	??	null coalescing\r\n\r\nnon-associative	? :	ternary (left-associative prior to PHP 8.0.0)\r\n\r\nright	= += -= *= **= /= .= %= &= |= ^= <<= >>= ??=	assignment\r\n\r\n(n/a)	yield from	yield from\r\n\r\n(n/a)	yield	yield\r\n\r\n(n/a)	print	print\r\n\r\nleft	and	logical\r\n\r\nleft	xor	logical\r\n\r\nleft	or	logical\r\n\r\nExample #1 Associativity\r\nTypes of operators\r\n•	Operator Precedence\r\n•	Arithmetic Operators\r\n•	Assignment Operators\r\n•	Bitwise Operators\r\n•	Comparison Operators\r\n•	Error Control Operators\r\n•	Execution Operators\r\n•	Incrementing/Decrementing Operators\r\n•	Logical Operators\r\n•	String Operators\r\n•	Array Operators\r\n•	Type Operators\r\nAn operator is something that takes one or more values (or expressions, in programming jargon) and yields another value (so that the construction itself becomes an expression).\r\nOperators can be grouped according to the number of values they take. Unary operators take only one value, for example ! (the logical not operator) or ++ (the increment operator). Binary operators take two values, such as the familiar arithmetical operators + (plus) and - (minus), and the majority of PHP operators fall into this category. Finally, there is a single ternary operator, ? :, which takes three values; this is usually referred to simply as \"the ternary operator\" (although it could perhaps more properly be called the conditional operator).\r\nA full list of PHP operators follows in the section Operator Precedence. The section also explains operator precedence and associativity, which govern exactly how expressions containing several different operators are evaluated.\r\n\r\nOperator Precedence\r\nThe precedence of an operator specifies how \"tightly\" it binds two expressions together. For example, in the expression 1 + 5 * 3, the answer is 16 and not 18 because the multiplication (\"*\") operator has a higher precedence than the addition (\"+\") operator. Parentheses may be used to force precedence, if necessary. For instance: (1 + 5) * 3 evaluates to 18.\r\nWhen operators have equal precedence their associativity decides how the operators are grouped. For example \"-\" is left-associative, so 1 - 2 - 3 is grouped as (1 - 2) - 3 and evaluates to -4. \"=\" on the other hand is right-associative, so $a = $b = $c is grouped as $a = ($b = $c).\r\nOperators of equal precedence that are non-associative cannot be used next to each other, for example 1 < 2 > 1 is illegal in PHP. The expression 1 <= 1 == 1 on the other hand is legal, because the == operator has a lower precedence than the <= operator.\r\nAssociativity is only meaningful for binary (and ternary) operators. Unary operators are either prefix or postfix so this notion is not applicable. For example !!$a can only be grouped as !(!$a).\r\nUse of parentheses, even when not strictly necessary, can often increase readability of the code by making grouping explicit rather than relying on the implicit operator precedence and associativity.\r\nThe following table lists the operators in order of precedence, with the highest-precedence ones at the top. Operators on the same line have equal precedence, in which case associativity decides grouping.\r\nOperator Precedence\r\nAssociativity	Operators	Additional Information\r\n(n/a)	clone new	clone and new\r\n\r\nright	**	arithmetic\r\n\r\n(n/a)	+ - ++ -- ~ (int) (float) (string) (array) (object) (bool) @	arithmetic (unary + and -), increment/decrement, bitwise, type casting and error control\r\n\r\nleft	instanceof	type\r\n\r\n(n/a)	!	logical\r\n\r\nleft	* / %	arithmetic\r\n\r\nleft	+ - .	arithmetic (binary + and -), array and string (. prior to PHP 8.0.0)\r\n\r\nleft	<< >>	bitwise\r\n\r\nleft	.	string (as of PHP 8.0.0)\r\n\r\nnon-associative	< <= > >=	comparison\r\n\r\nnon-associative	== != === !== <> <=>	comparison\r\n\r\nleft	&	bitwise and references\r\n\r\nleft	^	bitwise\r\n\r\nleft	|	bitwise\r\n\r\nleft	&&	logical\r\n\r\nleft	||	logical\r\n\r\nright	??	null coalescing\r\n\r\nnon-associative	? :	ternary (left-associative prior to PHP 8.0.0)\r\n\r\nright	= += -= *= **= /= .= %= &= |= ^= <<= >>= ??=	assignment\r\n\r\n(n/a)	yield from	yield from\r\n\r\n(n/a)	yield	yield\r\n\r\n(n/a)	print	print\r\n\r\nleft	and	logical\r\n\r\nleft	xor	logical\r\n\r\nleft	or	logical\r\n\r\n', '', ''),
(13, 8, 'Arithmetic Operators', 'Remember basic arithmetic from school? These work just like those.\r\nArithmetic Operators\r\nExample	Name	Result\r\n+$a	Identity	Conversion of $a to int or float as appropriate.\r\n-$a	Negation	Opposite of $a.\r\n$a + $b	Addition	Sum of $a and $b.\r\n$a - $b	Subtraction	Difference of $a and $b.\r\n$a * $b	Multiplication	Product of $a and $b.\r\n$a / $b	Division	Quotient of $a and $b.\r\n$a % $b	Modulo	Remainder of $a divided by $b.\r\n$a ** $b	Exponentiation	Result of raising $a to the $b\'th power.\r\nThe division operator (\"/\") returns a float value unless the two operands are integers (or strings that get converted to integers) and the numbers are evenly divisible, in which case an integer value will be returned. For integer division, see intdiv().\r\nOperands of modulo are converted to int before processing. For floating-point modulo, see fmod().\r\nThe result of the modulo operator % has the same sign as the dividend — that is, the result of $a % $b will have the same sign as $a. For example:\r\n', '<?php\r\n\r\necho (5 % 3).\"\\n\";           // prints 2\r\necho (5 % -3).\"\\n\";          // prints 2\r\necho (-5 % 3).\"\\n\";          // prints -2\r\necho (-5 % -3).\"\\n\";         // prints -2\r\n\r\n?>\r\n', ''),
(14, 8, 'Assignment Operators', 'The basic assignment operator is \"=\". Your first inclination might be to think of this as \"equal to\". Don\'t. It really means that the left operand gets set to the value of the expression on the right (that is, \"gets set to\").\r\nThe value of an assignment expression is the value assigned. That is, the value of \"$a = 3\" is 3. This allows you to do some tricky things:\r\n<?php\r\n\r\n$a = ($b = 4) + 5; // $a is equal to 9 now, and $b has been set to 4.\r\n\r\n?>\r\nIn addition to the basic assignment operator, there are \"combined operators\" for all of the binary arithmetic, array union and string operators that allow you to use a value in an expression and then set its value to the result of that expression. For example:\r\n<?php\r\n\r\n$a = 3;\r\n$a += 5; // sets $a to 8, as if we had said: $a = $a + 5;\r\n$b = \"Hello \";\r\n$b .= \"There!\"; // sets $b to \"Hello There!\", just like $b = $b . \"There!\";\r\n\r\n?>\r\nNote that the assignment copies the original variable to the new one (assignment by value), so changes to one will not affect the other. This may also have relevance if you need to copy something like a large array inside a tight loop.\r\nAn exception to the usual assignment by value behaviour within PHP occurs with objects, which are assigned by reference. Objects may be explicitly copied via the clone keyword.\r\nAssignment by Reference\r\nAssignment by reference is also supported, using the \"$var = &$othervar;\" syntax. Assignment by reference means that both variables end up pointing at the same data, and nothing is copied anywhere.\r\nExample #1 Assigning by reference\r\n<?php\r\n$a = 3;\r\n$b = &$a; // $b is a reference to $a\r\n\r\nprint \"$a\\n\"; // prints 3\r\nprint \"$b\\n\"; // prints 3\r\n\r\n$a = 4; // change $a\r\n\r\nprint \"$a\\n\"; // prints 4\r\nprint \"$b\\n\"; // prints 4 as well, since $b is a reference to $a, which has\r\n              // been changed\r\n?>\r\nThe new operator returns a reference automatically, as such assigning the result of new by reference is an error.\r\n<?php\r\nclass C {}\r\n\r\n$o = &new C;\r\n?>\r\nThe above example will output:\r\nParse error: syntax error, unexpected \'new\' (T_NEW) in …\r\n', '', ''),
(15, 8, 'Bitwise Operators', 'Bitwise operators allow evaluation and manipulation of specific bits within an integer.\r\nBitwise Operators\r\nExample	Name	Result\r\n$a & $b	And	Bits that are set in both $a and $b are set.\r\n$a | $b	Or (inclusive or)	Bits that are set in either $a or $b are set.\r\n$a ^ $b	Xor (exclusive or)	Bits that are set in $a or $b but not both are set.\r\n~ $a	Not	Bits that are set in $a are not set, and vice versa.\r\n$a << $b	Shift left	Shift the bits of $a $b steps to the left (each step means \"multiply by two\")\r\n$a >> $b	Shift right	Shift the bits of $a $b steps to the right (each step means \"divide by two\")\r\nBit shifting in PHP is arithmetic. Bits shifted off either end are discarded. Left shifts have zeros shifted in on the right while the sign bit is shifted out on the left, meaning the sign of an operand is not preserved. Right shifts have copies of the sign bit shifted in on the left, meaning the sign of an operand is preserved.\r\nUse parentheses to ensure the desired precedence. For example, $a & $b == true evaluates the equivalency then the bitwise and; while ($a & $b) == true evaluates the bitwise and then the equivalency.\r\nIf both operands for the &, | and ^ operators are strings, then the operation will be performed on the ASCII values of the characters that make up the strings and the result will be a string. In all other cases, both operands will be converted to integers and the result will be an integer.\r\nIf the operand for the ~ operator is a string, the operation will be performed on the ASCII values of the characters that make up the string and the result will be a string, otherwise the operand and the result will be treated as integers.\r\nBoth operands and the result for the << and >> operators are always treated as integers.\r\n', '<?php\r\n/*\r\n * Ignore the top section,\r\n * it is just formatting to make output clearer.\r\n */\r\n\r\n$format = \'(%1$2d = %1$04b) = (%2$2d = %2$04b)\'\r\n        . \' %3$s (%4$2d = %4$04b)\' . \"\\n\";\r\n\r\necho <<<EOH\r\n ---------     ---------  -- ---------\r\n result        value      op test\r\n ---------     ---------  -- ---------\r\nEOH;\r\n\r\n\r\n/*\r\n * Here are the examples.\r\n */\r\n\r\n$values = array(0, 1, 2, 4, 8);\r\n$test = 1 + 4;\r\n\r\necho \"\\n Bitwise AND \\n\";\r\nforeach ($values as $value) {\r\n    $result = $value & $test;\r\n    printf($format, $result, $value, \'&\', $test);\r\n}\r\n\r\necho \"\\n Bitwise Inclusive OR \\n\";\r\nforeach ($values as $value) {\r\n    $result = $value | $test;\r\n    printf($format, $result, $value, \'|\', $test);\r\n}\r\n\r\necho \"\\n Bitwise Exclusive OR (XOR) \\n\";\r\nforeach ($values as $value) {\r\n    $result = $value ^ $test;\r\n    printf($format, $result, $value, \'^\', $test);\r\n}\r\n?>\r\n', ''),
(16, 8, 'Comparison Operators', 'Comparison operators, as their name implies, allow you to compare two values. You may also be interested in viewing the type comparison tables, as they show examples of various type related comparisons.\r\nComparison Operators\r\nExample	Name	Result\r\n$a == $b	Equal	true if $a is equal to $b after type juggling.\r\n$a === $b	Identical	true if $a is equal to $b, and they are of the same type.\r\n$a != $b	Not equal	true if $a is not equal to $b after type juggling.\r\n$a <> $b	Not equal	true if $a is not equal to $b after type juggling.\r\n$a !== $b	Not identical	true if $a is not equal to $b, or they are not of the same type.\r\n$a < $b	Less than	true if $a is strictly less than $b.\r\n$a > $b	Greater than	true if $a is strictly greater than $b.\r\n$a <= $b	Less than or equal to	true if $a is less than or equal to $b.\r\n$a >= $b	Greater than or equal to	true if $a is greater than or equal to $b.\r\n$a <=> $b	Spaceship	An int less than, equal to, or greater than zero when $a is less than, equal to, or greater than $b, respectively.\r\nIf both operands are numeric strings, or one operand is a number and the other one is a numeric string, then the comparison is done numerically. These rules also apply to the switch statement. The type conversion does not take place when the comparison is === or !== as this involves comparing the type as well as the value.\r\n\r\n', '<?php\r\nvar_dump(0 == \"a\");\r\nvar_dump(\"1\" == \"01\");\r\nvar_dump(\"10\" == \"1e1\");\r\nvar_dump(100 == \"1e2\");\r\n\r\nswitch (\"a\") {\r\ncase 0:\r\n    echo \"0\";\r\n    break;\r\ncase \"a\":\r\n    echo \"a\";\r\n    break;\r\n}\r\n?>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Project_id` int(11) NOT NULL,
  `Language_Id` int(11) NOT NULL,
  `Project_Title` varchar(40) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Source_Code` varchar(100) NOT NULL,
  `Date_Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_id`, `Language_Id`, `Project_Title`, `Description`, `Source_Code`, `Date_Time`) VALUES
(1, 1, 'Calendar', 'The Calendar in C Programming is a Calendar Project In C that helps you find the date and day you need by being built in the C programming language. It also does a few other tasks.', 'CALANDER-PROJECT-IN-C.zip', '2023-03-14 17:40:33'),
(2, 1, 'Student Management', 'Student Management System is based on the concept of managing student’s record. There’s a login system available for this system, the user can freely use its feature. This mini project contains limited features, but the essential one.', 'Student_Management_System_In_C_With_Source_Code.zip', '2023-03-14 17:53:18'),
(3, 1, 'Calculator', 'This program takes an arithmetic operator +, -, *, / and two operands from the user. Then, it performs the calculation on the two operands depending upon the operator entered by the user.', 'calculter.zip', '2023-03-14 17:55:06'),
(4, 1, 'Library Management', 'The Library Management System is a type of console-based application without graphics which is developed using c language. The compiler used to make project is code:: Blocks using GCC compiler.', 'LIBRARY-MANAGEMENT-SYSTEM-IN-C.zip', '2023-03-14 17:55:45'),
(32, 2, 'TIC TAC TOE GAME ', 'This C++ program on TIC TAC TOE GAME is a simple text base game. This program is without grahics to focus on logic /algorithm used in game. Two players can play this game.', 'tic-tac-toe-project.zip', '2023-03-29 17:28:46'),
(33, 2, 'Supermarket Billing Project', 'This C++ menu driven programs on SUPERMARKET BILLING SYSTEM has product class with data members like product no, product name...', 'super-market-billing.zip', '2023-03-29 17:35:20'),
(34, 2, 'Casino Number Guessing Game', 'This C++ program on CASINO GAME is a simple text base number guessing game.We have used procedure oriented approach to design this game. ', 'casino-game-project.zip', '2023-03-29 17:47:07'),
(35, 3, 'Website Copier', 'Website Copier is a software application that allows users to download the entire contents of a website onto their local computer for offline browsing. The website copier works by crawling through the website.', '__Project_minicopier-master.zip', '2023-03-29 17:49:31'),
(36, 3, 'Network Load Balancing project in Java', 'Network Load Balancing (NLB) is a method of distributing network traffic across multiple servers or network resources to improve...', '__Project_Network-Load-Bal-Java.zip', '2023-03-29 17:50:27'),
(37, 3, 'Online GLOBAL Mailing System in Java', 'User has to login with his/her credentials and send mails to others by using compose button, see the mails received from others in Inbox folder.', '__Project_Global-Email-System.zip', '2023-03-29 17:51:54'),
(38, 3, 'Loan Approval System in Java', 'A loan approval system is a software application that automates the loan approval process for financial institutions, such as banks and credit unions.', '__Project_Loan Approval System in JSP-EnggRoom.com.zip', '2023-03-29 17:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `Query_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Language_id` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Date_Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Preference` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`Query_Id`, `User_Id`, `Language_id`, `Description`, `Date_Time`, `Preference`) VALUES
(4, 3, 3, 'how to define loop in java ?', '2023-01-30 17:53:34', 0),
(5, 3, 7, 'how to create a table.', '2023-01-30 17:53:55', 0),
(6, 3, 8, 'how to make div element in center ', '2023-01-30 17:54:28', 0),
(8, 3, 6, 'how to increment variable value in for loop', '2023-01-30 17:58:08', 0),
(9, 3, 2, 'how to create class and object ?', '2023-01-30 17:59:14', 0),
(11, 6, 1, 'what is c', '2023-02-27 17:55:35', 0),
(12, 6, 2, 'What is difference between c and c++', '2023-02-28 11:10:19', 0),
(13, 6, 2, 'What is difference between c and c++', '2023-02-28 11:10:53', 0),
(14, 6, 3, 'who developed java', '2023-02-28 11:11:28', 0),
(25, 1, 4, 'what is php?', '2023-03-25 17:04:59', 0),
(26, 6, 5, 'What is Javascript', '2023-03-30 16:40:55', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `query report`
-- (See below for the actual view)
--
CREATE TABLE `query report` (
`Query_Id` int(11)
,`first_name` varchar(15)
,`Language_Name` varchar(15)
,`Description` varchar(200)
,`Date_Time` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `query_answer`
--

CREATE TABLE `query_answer` (
  `Answer_Id` int(11) NOT NULL,
  `Query_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Answer_desc` varchar(200) NOT NULL,
  `Date_Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query_answer`
--

INSERT INTO `query_answer` (`Answer_Id`, `Query_Id`, `User_Id`, `Answer_desc`, `Date_Time`) VALUES
(20, 11, 7, 'c is programming language', '2023-02-27 17:57:09'),
(23, 14, 7, 'James Gosling', '2023-02-28 11:26:44'),
(30, 5, 1, 'use table tag', '2023-03-11 22:47:11'),
(31, 5, 1, 'use table tag with tr for rows and td for columns', '2023-03-11 22:47:38'),
(44, 9, 1, 'using class keyword', '2023-03-25 17:04:26'),
(46, 26, 6, 'JavaScript is the Programming Language for the Web.', '2023-04-02 21:52:07');

-- --------------------------------------------------------

--
-- Stand-in structure for view `quiz report`
-- (See below for the actual view)
--
CREATE TABLE `quiz report` (
`Question_Id` int(5)
,`Language_Name` varchar(15)
,`Question` varchar(150)
,`Options` varchar(100)
,`Answer` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_option`
--

CREATE TABLE `quiz_option` (
  `Option_Id` int(5) NOT NULL,
  `Question_Id` int(5) NOT NULL,
  `Answer` int(2) NOT NULL,
  `Options` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_option`
--

INSERT INTO `quiz_option` (`Option_Id`, `Question_Id`, `Answer`, `Options`) VALUES
(1, 1, 0, '__FILE__'),
(2, 1, 0, '__DATE__'),
(3, 1, 0, '__TIME__'),
(4, 1, 1, '__C++__'),
(5, 2, 0, 'dos.h'),
(6, 2, 0, 'stdio.h'),
(7, 2, 1, 'math.h'),
(8, 2, 0, 'conio.h'),
(9, 3, 0, 'Steve Jobs'),
(10, 3, 0, 'James Gosling'),
(11, 3, 1, 'Dennis Ritchie'),
(12, 3, 0, 'Rasmus Lerdorf'),
(13, 4, 0, 'Steve Jobs'),
(14, 4, 0, 'James Gosling'),
(17, 4, 1, 'Dennis Ritchie'),
(18, 4, 0, 'Rasmus Lerdorf'),
(19, 5, 0, 'They can contain alphanumeric characters as well as special characters'),
(20, 5, 0, 'It is not an error to declare a variable to be one of the keywords(like goto, static'),
(21, 5, 1, 'Variable names cannot start with a digit'),
(22, 5, 0, 'Variable can be of any length'),
(23, 6, 0, ' Internal'),
(24, 6, 1, 'External'),
(25, 6, 0, 'Both Internal and External'),
(26, 6, 0, 'External and Internal are not valid terms for functions'),
(29, 7, 0, 'File inclusion directive'),
(30, 7, 1, 'Preprocessor directive'),
(31, 7, 0, 'Inclusion directive'),
(32, 7, 0, 'None of the mentioned'),
(36, 8, 0, '#'),
(37, 8, 0, '$'),
(38, 8, 1, '” ”'),
(39, 8, 0, '&'),
(40, 9, 0, 'int'),
(41, 9, 0, 'char *'),
(42, 9, 0, 'struct'),
(43, 9, 1, 'None of the mentioned'),
(44, 10, 0, '1 bit'),
(45, 10, 0, '2 bits'),
(46, 10, 1, '1 Byte'),
(47, 10, 0, '2 Bytes'),
(48, 11, 0, 'stdlib. h'),
(49, 11, 0, 'ctype. h'),
(50, 11, 1, 'stdio. h'),
(51, 11, 0, 'stdarg. h'),
(54, 12, 0, 'File inclusion'),
(55, 12, 0, 'Selective inclusion'),
(56, 12, 1, 'Conditional compilation'),
(57, 12, 0, 'Recursive macros'),
(70, 13, 0, 'for'),
(71, 13, 0, 'while'),
(72, 13, 0, 'do-while'),
(73, 13, 1, 'all of the mentioned'),
(74, 14, 0, 'Functions can return any type'),
(75, 14, 1, 'Functions can return any type except array and functions'),
(76, 14, 0, 'Functions can return any type except array, functions and union'),
(77, 14, 0, 'Functions can return any type except array, functions, function pointer and union'),
(94, 62, 0, 'Thomas Kushz'),
(95, 62, 0, 'John Kemney'),
(96, 62, 1, 'Bjarne Stroutstrup'),
(97, 62, 0, 'James Goling'),
(98, 63, 0, 'Size'),
(99, 63, 0, 'Key'),
(100, 63, 0, 'Jump'),
(101, 63, 1, 'Switch'),
(106, 65, 0, 'Variable'),
(107, 65, 0, 'Control'),
(108, 65, 0, 'Character'),
(109, 65, 1, 'Token'),
(110, 66, 1, 'Character'),
(111, 66, 0, 'Numeric'),
(112, 66, 0, 'Fixed'),
(113, 66, 0, 'Floating point'),
(114, 67, 0, '+'),
(115, 67, 0, '*'),
(116, 67, 0, '/'),
(117, 67, 1, '%'),
(126, 70, 0, 'Jump'),
(127, 70, 1, 'break'),
(128, 70, 0, 'exit'),
(129, 70, 0, 'both a and b');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `Question_Id` int(5) NOT NULL,
  `Language_Id` int(5) NOT NULL,
  `Question` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`Question_Id`, `Language_Id`, `Question`) VALUES
(1, 1, 'Choose the invalid predefined macro as per ANSI C.'),
(2, 1, ' In the standard library of C programming language, which of the following header file is designed for basic mathematical operations?'),
(3, 1, 'Who is the father of C language?'),
(4, 1, 'Who is the father of C language?'),
(5, 1, 'Which of the following is true for variable names in C?'),
(6, 1, 'Functions in C Language are always _________'),
(7, 1, 'What is #include <stdio.h>?'),
(8, 1, 'The C-preprocessors are specified with _________ symbol.'),
(9, 1, 'In C language, FILE is of which data type?'),
(10, 1, 'What is the sizeof(char) in a 32-bit C compiler?'),
(11, 1, 'scanf() is a predefined function in______header file.'),
(12, 1, 'What is an example of iteration in C?'),
(13, 1, 'Which of the following loops are available in C?'),
(14, 1, '  Which of the following is true about return type of functions in C?'),
(62, 2, 'C++ was developed by ___'),
(63, 2, 'Which one of the following is a keyword?'),
(65, 2, '____ is the smallest individual unit in a program.'),
(66, 2, 'What is a constant that contains a single character enclosed within single quotes?'),
(67, 2, 'The modulus operator uses ___ character.'),
(70, 1, 'In the switch case statement, every case should have a ---- statement as the last statement');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_Id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL DEFAULT 0,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email_Id` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Id`, `user_type_id`, `first_name`, `last_name`, `email_Id`, `Password`) VALUES
(1, 2, 'Admin', 'Admin', 'admin@gmail.com', 'c83ac3bf0be6fd86d43ed9efd8417bcd'),
(3, 0, 'Mayur', 'Mistri', 'mayur123@gmail.com', '92d263eb9c601e831315bd7b0a1ee4b7'),
(6, 1, 'Manoj', 'Kumar', 'manoj123@gmail.com', 'aa642831014aac0d43062b0f7fc18174'),
(7, 1, 'Mayur', 'Kumar', 'mayur1234@gmail.com', '58c54684874c60c14d26cd99893869f8'),
(8, 0, 'Harsh', 'Lakhani', 'harsh123@gmail.com', '049708aa6eeff6c166625718d73a6cdf'),
(9, 0, 'Divyesh', 'Sojitra', 'divyesh123@gmail.com', '00e20ac9d018c3ae3455e3c986c6f530'),
(10, 0, 'Amit', 'Patel', 'amit123@gmail.com', '0752207362500694fb11eba92dafe642');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users report`
-- (See below for the actual view)
--
CREATE TABLE `users report` (
`user_Id` int(11)
,`User_Type` varchar(100)
,`first_name` varchar(15)
,`last_name` varchar(15)
,`email_Id` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `User_Type_Id` int(5) NOT NULL,
  `User_Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`User_Type_Id`, `User_Type`) VALUES
(0, 'User'),
(1, 'Premium User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Structure for view `language content`
--
DROP TABLE IF EXISTS `language content`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `language content`  AS SELECT `language`.`Language_Name` AS `Language_Name`, `language_title`.`Title_Name` AS `Title_Name`, `java`.`Subtitle_id` AS `Subtitle_id`, `java`.`Subtitle` AS `Subtitle` FROM ((`language` join `language_title` on(`language`.`Language_Id` = `language_title`.`Language_Id`)) join `java` on(`language_title`.`Title_Id` = `java`.`Title_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `language report`
--
DROP TABLE IF EXISTS `language report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `language report`  AS SELECT `language`.`Language_Id` AS `Language_Id`, `language`.`Language_Name` AS `Language_Name` FROM `language` ORDER BY `language`.`Language_Id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `package report`
--
DROP TABLE IF EXISTS `package report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `package report`  AS SELECT `package`.`Package_Id` AS `Package_Id`, `package`.`Title` AS `Title`, `package`.`Package_Desc` AS `Package_Desc`, `package`.`Duration` AS `Duration`, `package`.`Price` AS `Price` FROM `package``package`  ;

-- --------------------------------------------------------

--
-- Structure for view `query report`
--
DROP TABLE IF EXISTS `query report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `query report`  AS SELECT `query`.`Query_Id` AS `Query_Id`, `user`.`first_name` AS `first_name`, `language`.`Language_Name` AS `Language_Name`, `query`.`Description` AS `Description`, `query`.`Date_Time` AS `Date_Time` FROM ((`language` join `query` on(`language`.`Language_Id` = `query`.`Language_id`)) join `user` on(`user`.`user_Id` = `query`.`User_Id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `quiz report`
--
DROP TABLE IF EXISTS `quiz report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quiz report`  AS SELECT `quiz_question`.`Question_Id` AS `Question_Id`, `language`.`Language_Name` AS `Language_Name`, `quiz_question`.`Question` AS `Question`, `quiz_option`.`Options` AS `Options`, `quiz_option`.`Answer` AS `Answer` FROM ((`language` join `quiz_question` on(`language`.`Language_Id` = `quiz_question`.`Language_Id`)) join `quiz_option` on(`quiz_question`.`Question_Id` = `quiz_option`.`Question_Id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `users report`
--
DROP TABLE IF EXISTS `users report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users report`  AS SELECT `user`.`user_Id` AS `user_Id`, `user_type`.`User_Type` AS `User_Type`, `user`.`first_name` AS `first_name`, `user`.`last_name` AS `last_name`, `user`.`email_Id` AS `email_Id` FROM (`user` join `user_type` on(`user_type`.`User_Type_Id` = `user`.`user_type_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c`
--
ALTER TABLE `c`
  ADD PRIMARY KEY (`Subtitle_Id`),
  ADD KEY `Title_Id` (`Title_Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_Id`);

--
-- Indexes for table `java`
--
ALTER TABLE `java`
  ADD PRIMARY KEY (`Subtitle_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`Language_Id`);

--
-- Indexes for table `language_title`
--
ALTER TABLE `language_title`
  ADD PRIMARY KEY (`Title_Id`),
  ADD KEY `Language_Id` (`Language_Id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Package_Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_Id`);

--
-- Indexes for table `php`
--
ALTER TABLE `php`
  ADD PRIMARY KEY (`Subtitle_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_id`),
  ADD KEY `Language_Id` (`Language_Id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`Query_Id`);

--
-- Indexes for table `query_answer`
--
ALTER TABLE `query_answer`
  ADD PRIMARY KEY (`Answer_Id`);

--
-- Indexes for table `quiz_option`
--
ALTER TABLE `quiz_option`
  ADD PRIMARY KEY (`Option_Id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`Question_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_Id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`User_Type_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c`
--
ALTER TABLE `c`
  MODIFY `Subtitle_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `java`
--
ALTER TABLE `java`
  MODIFY `Subtitle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `Language_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `language_title`
--
ALTER TABLE `language_title`
  MODIFY `Title_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `Package_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `php`
--
ALTER TABLE `php`
  MODIFY `Subtitle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `Project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `Query_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `query_answer`
--
ALTER TABLE `query_answer`
  MODIFY `Answer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `quiz_option`
--
ALTER TABLE `quiz_option`
  MODIFY `Option_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `Question_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `language_title`
--
ALTER TABLE `language_title`
  ADD CONSTRAINT `language_title_ibfk_1` FOREIGN KEY (`Language_Id`) REFERENCES `language` (`Language_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
