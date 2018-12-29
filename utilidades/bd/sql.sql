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

create table imagenes(
	id int not null auto_increment,
	nombre char,
	primary key(id)
);

create table publicaciones(

	id int not null auto_increment,
	id_usuario int not null,
	bueno int default 0,
	regular int default 0,
	malo int default 0,
	fecha date not null,
	estado date default 1,
	primary key(id),
	foreign key (id_usuario) references users(id)
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
	estado int default 1,
	primary key(id),
	foreign key (id_publicacion) references publicaciones(id)
);

create table meme_frase(
	id int not null auto_increment,
	id_frase int not null,
	id_meme int not null,
	primary key(id),
	foreign key (id_frase) references frases(id),
	foreign key (id_meme) references memes(id)
);

create table meme_imagen(
	id int not null auto_increment,
	id_imagen int not null,
	id_meme int not null,
	primary key(id),
	foreign key (id_imagen) references imagenes(id),
	foreign key (id_meme) references memes(id)
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

create table observaciones(
	id int not null auto_increment,
	id_critica int not null,
	observacion varchar(255),
	primary key(id),
	foreign key (id_critica) references criticas(id)

);

