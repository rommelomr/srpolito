create database srpolito;
use srpolito;
create table users(
	
    id int not null AUTO_INCREMENT,
    nombre varchar(20) not null,
    apellido varchar(20) not null,
    user varchar(20) UNIQUE,
    pass varchar(255),
    privileges varchar(4),
    status int not null,
    PRIMARY KEY(id)
    
);
insert into users(nombre,apellido,user,pass,privileges,status) values('root','root','root','$2y$10$M/rx0pFFvSqwRjJKpbaOaODA/MoajIG8pxX9VAu0w8VufOJ4D06gm','1111',1);