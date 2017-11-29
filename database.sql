create database lara;
use lara;
create table students(

	id int unsigned not null auto_increment,
	name varchar(30),
	age int unsigned,
	primary key (id)	
);

insert into students values
	(null,'cht',22),
	(null,'tom',21),
	(null,'tony',18);