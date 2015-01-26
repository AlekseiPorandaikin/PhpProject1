CREATE SEQUENCE id INCREMENT BY 1;

create table alluser(
id_user integer DEFAULT NEXTVAL('id'),
last_name character(50),
first_name character(50),
patronymic character(50),
type character(50),
email character(50),
login character(50) NOT NULL,
password integer NOT NULL,

constraint user_pkeys primary key (id_user));

create table role (
id_role integer DEFAULT NEXTVAL('id'),
description character (50),
constraint role_pkey primary key (id_role));

create table role_user (
id_user integer not null,
id_role integer not null,
    constraint user_role_fkey foreign key (id_user) references alluser(id_user),
    constraint role_user_fkey foreign key (id_role) references role(id_role));

insert into alluser values 
('1', '����', '������','���������', 'admin', 'admin@mail.ru', '����', '1'),
('2', '������', '�������','������', 'compiler', 'compiler@mail.ru', '������', '2'),
('3', '������', '������', '����������','test', 'test@mail.ru', '3', '������' );

insert into role values
	('1', '������ ������', 'admin'),
	('2', '��������', 'compiler'),
	('3', '���������� �����', 'test');

insert into role_user values
	('1', '1'),
	('2', '2'),
	('3', '3');

