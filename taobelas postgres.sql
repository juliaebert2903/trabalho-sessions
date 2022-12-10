CREATE DATABASE taobelas;

USE taobelas;

DROP TABLE IF EXISTS usuarios cascade;
DROP TABLE IF EXISTS livros cascade;
DROP TABLE IF EXISTS autores cascade;
DROP TABLE IF EXISTS autor_livro cascade;
DROP TABLE IF EXISTS livro_usuario cascade;

create table usuarios (
	chave serial,
	nome varchar(200),
	email text,
	password varchar(200),
	primary key(chave)
);


create table livros (
	chave serial,
	titulo varchar(200),
	ano date,
	editora varchar(200),
	primary key(chave)
);

create table autores (
    chave serial, 
    nome varchar(200),
    primary key(chave)
);

create table autor_livro (
    chave serial,
	autorfk int,
	livrofk int,
	primary key(chave),
 	FOREIGN KEY (autorfk) REFERENCES autores(chave),
	FOREIGN KEY (livrofk) REFERENCES livros(chave)
);



create table livro_usuario (
    chave serial,
	usuariofk int,
	livrofk int,
	primary key(chave),
 	FOREIGN KEY (usuariofk) REFERENCES usuario(chave),
	FOREIGN KEY (livrofk) REFERENCES livros(chave)
);
