drop database if exists oesproject;
create database oesproject;
use oesproject;
  
set names utf8MB4;
set character_set_client = utf8mb4;

create table `users`(
	`application_no` bigint not null auto_increment,
    `name` varchar(55) not null,
    `Dob` date not null,
    `mobile_no` bigint not null,
    `email` varchar(55) default null,
    `password` varchar(255) not null,
    `exam_pending` ENUM('Yes','No') default 'yes',
    primary key (`application_no`)
)auto_increment=2314050010001;

create table `questions`(
	`q_no` int not null auto_increment,
    `ques` text,
    `op1` text,
    `op2` text,
    `op3` text,
    `op4` text,
    `ans` ENUM('1', '2', '3', '4') default null,
    primary key (`q_no`)
);

CREATE TABLE responses (
    response_id INT NOT NULL AUTO_INCREMENT,
    application_no BIGINT NOT NULL,
    q_no INT NOT NULL,
    response ENUM('1', '2', '3', '4') DEFAULT NULL,
    PRIMARY KEY (response_id),
    key `application_no_idx` (`application_no`),
    key `q_no` (`q_no`),
    constraint `application_no_idx` FOREIGN KEY (application_no) REFERENCES users(application_no) ON delete CASCADE on update restrict,
    constraint `q_no` FOREIGN KEY (q_no) REFERENCES questions(q_no) ON delete CASCADE on update restrict
);

insert into questions(ques,op1,op2,op3,op4,ans)
	values("1. Which sorting algorithm has a time complexity of O(n^2) in the worst case?","Merge Sort","Quick Sort","Bubble Sort","Heap Sort",3),
		("2. What is the time complexity of inserting an element into a balanced binary search tree (BST)?","O(log n)","O(n)","O(n log n)","O(1)",1),
		("3. Which one of the following is false?","A tree is a continuous graph","A tree with n nodes contain (n-1) edges","A tree has bipartite graph","Tree contains cycle",4),
		("4. In c programming, pointer variable to be integer can be created by the declaration?","int p","int *p","int-p","int &p",2),
		("5. 4 byte IP address consists?","Network & mac address","Network & host address","Network address only","host address only",2),
		("6. A Process is in Blocked state waiting for I/O service, when the service is completed then it goes to?","Ready state","Terminate state","Suspended state","Running State",1),
		("7. Hamming distance between 001111 & 010011 is?","1","2","3","4",3),
		("8. A register capable of shift its binary information either information either to the right or to the left?","Storage","Series Register","Parallel Register","Shift Register",4),
		("9. In comparison to Gauss Seidel, Newton Raphson method takes?","less of iterations and more time per iteration","more of iterations and less time per iteraction","more of iterations and more time per iteration","less of iteration and less time per iteratione",2),
		("10. Which of the following command in DBMS is used to remove all row from a table, yet keeping the structure of row?","Truncate","Remove","Drop","None",1),
        ("11. Which data structure follows the Last In, First Out (LIFO) principle?","Queue","Stack"," Linked List","Tree",2),
		("12. In UNIX system can creates new program by?","Init","New","Create","Fork",3),
		("13. An alternate name for the completely interconnected network topology is?","Mesh","Star","Tree","Ring",1),
		("14. A collection of conceptual tools for describing data, relationships, semantics and constraints is referred to as?","ER Model","Data base","Data Model","DBMS",3),
		("15. Which of the following memory chip is faster?","There is no certainty","DRAM","SRAM","DRAM is faster for larger chips",3),
		("16. The Cache Memory is  more effective because of?","Memory Localization","Locality of reference","Memory Size","None of these",2),
		("17. To fetch data from secondary memory which one of the following register is used?","MAR","PC","IR","MBR",1),
		("18. The smallest integer that can be represented by an 8 bit number in 2's complement form is?","-256","-128","-127","-255",2),
		("19. The time required for fetching and execution of one simple machine instruction is known as?","Delay Time","CPU Cycle","Real Time","Seek Time",2),
		("20. A bulb in the staircase has two switches, one switch is at the ground floor and the other one is at the first floor. The bulb can be turned ON and also can be turned OFF by any of the switches irrespective of the state of the other switch. The logic of the switching of the bulb resembles?","XOR Gate","XNOR Gate","AND Gate","OR Gate",1),
		("21. How many 32K × 1 RAM chips are needed to provide a memory capacity of 256K bytes?","64","32","8","28",1),
		("22. What is a potential problem of 1’s complement representation of numbers?","Binary subtractions are not possible","Binary additions are not posiible","Multiplication of two numbers cannot be carried out","There are two different representations of zero",4),
		("23. In IEEE single precision floating point representation, exponent is represented in?","8 Bit Sign-magnitude representation","8 Bit 2's complement representation","Biased exponent representation with a bias value 127","Biased exponent representation with a bias value 128",3),
		("24. If we can generate a maximum of 4 Boolean functions using n Boolean variables, what will be minimum value of n?","65536","16","1","4",3),
		("25. The first instruction of bootstrap loader program of an operating system is stored in?","RAM","Hard Disk","BIOS","None of these",1),
		("26. In Operating Systems, which of the following is/are CPU scheduling algorithms?","Priority","Round Robin","Shortest Job First","All of the mentioned",4),
		("27. What is the full form of OSI?","optical service implementation","open service Internet","open system interconnection","operating system interface",3),
		("28. Which one of the following is not a function of network layer?","congestion control","error control","routing","inter-networking",2),
		("29. What type of transmission is involved in communication between a computer and a keyboard?","Half-duplex","Full-duplex","Simplex","Automatic",3),
		("30. What is the value of the postfix expression 6 3 2 4 + – *?","74","-18","22","40",2),
		("31. The optimal data structure used to solve Tower of Hanoi is?","Tree","Heap","Priority queue","Stack",4),
		("32. What is a dequeue?","A queue implemented with both singly and doubly linked lists","A queue with insert/delete defined for front side of the queue","A queue with insert/delete defined for both front and rear ends of the queue","A queue implemented with a doubly linked list",3),
		("33. Which of the following is not included in DML (Data Manipulation Language)?","UPDATE","CREATE","INSERT","DELETE",2),
		("34. Which of the following is not a component of a data warehouse?","Data metadata","Data extraction/cleaning/preparation programs","Data warehouse data","None of the Mentioned",1),
		("35. Which gates in Digital Circuits are required to convert a NOR-based SR latch to an SR flip-flop?","Two 2 input AND gates","Two 3 input AND gates","Two 2 input OR gates","Two 3 input OR gates",1),
		("36. What will be the output from a D flip – flop if the clock is low and D = 0?","0","1","No Change","Toggle between 0 and 1",3),
		("37. What determines the output from the combinational logic circuit in Digital Electronics?","Input signals from the past condition","Input signals at the present moment","Input signals from both past and present","Input signals expected in future",2),
		("38. Which of the following command is correct to delete the values in the relation teaches?","Delete from teaches;","Delete from teaches where Id =’Null’;","Remove table teaches;","Drop table teaches;",1),
		("39. For designing a normal RDBMS which of the following normal form is considered adequate?","4NF","3NF","2NF","5NF",2),
		("40. Which of the following establishes a top-to-bottom relationship among the items?","Relational schema","Network schema","Hierarchical schema","All of the mentioned",3),
		("41. Which of the following are C preprocessors?","#ifdef","#define","#endif","all of the mentioned",4),
		("42. Which of the following declaration is not supported by C language?","String str;","char *str;","float str = 3e2;","Both “String str;” and “float str = 3e2;”",1),
		("43. Which data structure is based on the Last In First Out (LIFO) principle?","Tree","Linked List","Stack","Queue",3),
		("44. What value is to be considered for a “don’t care condition”?","0","1","Either 0 or 1","Any number except 0 and 1",3),
		("45. What is information about data called?","Hyper data","Tera data","Meta data","Relations",3),
		("46. What is the result of logical or relational expression in C?","True or False","0 or 1","0 if an expression is false and any positive number if an expression is true","None of the mentioned",2),
		("47. Property which allows to produce different executable for different platforms in C is called?","File inclusion","Selective inclusion","Conditional compilation","Recursive macros",3),
		("48. Which of the following is not the application of stack?","Data Transfer between two asynchronous process","Compiler Syntax Analyzer","Tracking of local variables at run time","A parentheses balancing program",1),
		("49. The prefix form of A-B/ (C * D ^ E) is?","-A/B*C^DE","-A/BC*^DE","-ABCD*^DE","-/*^ACBDE",1),
		("50. Which of the following codes is a sequential code?","8421 code","2421 code","5421 code","2441 code",1);