create table editoriales(


	id int not null auto_increment,
	nombre char not null,
	primary key(id)

);

create table categorias(

	id int not null auto_increment,
	nombre char not null,
	primary key(id)

);

create table autores(


	id int not null auto_increment,
	nombre char not null,
	primary key(id)

);


create table libros(


	id int not null auto_increment,
	nombre char not null,
	numero_paginas int,

	id_editorial int,
	foreign key (id_editorial) references editoriales (id),
	primary key(id)

);

create table personas(


	id int not null auto_increment,
	nombre char not null,
	cedula char not null,
	tipo varchar(1) not null, 
	deuda varchar(1),
	primary key(id)

);

create table usuarios(


	id int not null auto_increment,
	usuario char not null,
	contrasena char not null,
	estado varchar(1) not null,
	id_persona int not null,
	primary key(id),
	foreign key (id_persona) references personas (id)

);


create table categorias_libros(

	id int not null auto_increment,
	id_categoria int not null,
	id_libro int not null,

	primary key(id),
	foreign key (id_categoria) references categorias (id),
	foreign key (id_libro) references libros (id)

);

create table autores_libros(


	id int not null auto_increment,
	id_autor int not null,
	foreign key (id_autor) references autores (id),
	id_libro int not null,
	foreign key (id_libro) references libros(id),
	primary key(id)

);

create table prestamos_personas(

	id int not null auto_increment,
	primary key(id),
	estado varchar(1),

	id_persona_responsable int not null,
	foreign key (id_persona_responsable) references personas (id),

	id_persona_solicitante int not null,
	foreign key (id_persona_solicitante) references personas (id)


);

create table prestamos_libros(

	id int not null auto_increment,
	primary key(id),

	id_prestamo int not null,
	foreign key (id_prestamo) references prestamos_personas (id),

	id_libro int not null,
	foreign key (id_libro) references libros (id),

	fecha_prestamo date,
	fecha_devolucion date

);
