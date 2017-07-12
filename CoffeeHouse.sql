
#connecting to database
use z1815642;

#Drop the existing tables

drop table if exists credentials;
drop table if exists slot;
drop table if exists schedule;
drop table if exists member;
drop table if exists groups;

#create new tables

create table credentials(id int AUTO_INCREMENT,email_id varchar(32),pwd varchar(10),user_id varchar(20),primary key(id));


create table groups(group_id int AUTO_INCREMENT,group_name varchar(20),group_genre varchar(15),number_of_people int,pdate date,primary key(group_id));

create table member(member_id int AUTO_INCREMENT,group_id int,member_name varchar(20),email varchar(32),mobile_no bigint,ptime varchar(10),primary key(member_id),foreign key(group_id) references groups(group_id));

create table schedule(group_id int AUTO_INCREMENT,pdate date,ptime varchar(10),primary key(group_id),foreign key(group_id) references groups(group_id));

create table slot(id int AUTO_INCREMENT,pdate date,ptime varchar(10),primary key(id));

insert into slot select * from slots;
