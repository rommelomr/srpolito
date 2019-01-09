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
    created_at date not null,
    PRIMARY KEY(id)
    
);
insert into users(nombre,apellido,user,pass,privileges,status,created_at) values('root','root','root','$2y$10$M/rx0pFFvSqwRjJKpbaOaODA/MoajIG8pxX9VAu0w8VufOJ4D06gm','1111',1,'2018-12-29');
insert into users(nombre,apellido,user,pass,privileges,status,created_at) values('Rommel','Montoya','rommelomr','$2y$10$M/rx0pFFvSqwRjJKpbaOaODA/MoajIG8pxX9VAu0w8VufOJ4D06gm','1111',1,'2018-12-29');
insert into users(nombre,apellido,user,pass,privileges,status,created_at) values('Omar','Montoya','luisomm','$2y$10$M/rx0pFFvSqwRjJKpbaOaODA/MoajIG8pxX9VAu0w8VufOJ4D06gm','1111',1,'2018-12-29');

create table publicaciones(

	id int not null auto_increment,
	id_usuario int not null,
	bueno int default 0,
	regular int default 0,
	malo int default 0,
	denunciada int default 0,
	estado int,
	fecha datetime not null,
	tipo varchar(1),
	primary key(id),
	foreign key (id_usuario) references users(id)
);

create table imagenes(
	id int not null auto_increment,
	id_publicacion int not null,
	nombre text,
	primary key(id),
	foreign key (id_publicacion) references publicaciones(id)
);

create table memes(

	id int not null auto_increment,
	id_publicacion int not null,
	primary key(id),
	foreign key (id_publicacion) references publicaciones(id)

);
create table frases(
	id int not null auto_increment,
	id_publicacion int not null,
	frase text,
	primary key(id),
	foreign key (id_publicacion) references publicaciones(id)
);
create table criticas(
	id int not null auto_increment,
	id_usuario int not null,
	id_publicacion int not null,
	cod_critica varchar(1),

	primary key(id),
	foreign key (id_usuario) references users(id),
	foreign key (id_publicacion) references publicaciones(id)
);

create table criticos(
	id int not null auto_increment,
	id_usuario int not null,
	num_criticas int default 0,
	primary key(id),
	foreign key (id_usuario) references users(id)

);
create table respondedores(
	id int not null auto_increment,
	id_usuario int not null,
	num_respuestas int default 0,
	num_memes int default 0,
	primary key(id),
	foreign key (id_usuario) references users(id)

);
create table creadores_frases(
	id int not null auto_increment,
	id_usuario int not null,
	num_frases int default 0,
	num_memes int default 0,
	primary key(id),
	foreign key (id_usuario) references users(id)

);
