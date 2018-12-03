create database biblioteca;
use biblioteca;
create table usuarios(
	
    id int not null AUTO_INCREMENT,
    usuario varchar(20) UNIQUE,
    clave varchar(255),
    permisos varchar(2),
    estado int not null,
    PRIMARY KEY(id)
    
);
insert into usuarios(usuario,clave,permisos,estado) values('root','$2y$10$M/rx0pFFvSqwRjJKpbaOaODA/MoajIG8pxX9VAu0w8VufOJ4D06gm','11',1);