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
	disponiveis int,
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
	primary key(chave)
);



create table livro_usuario (
    chave serial,
	usuariofk int,
	livrofk int,
	primary key(chave)
);



insert into autores (nome) values ("stephen king"), ("George R. R. Martin"), ("Thomas Harris") , ("J. R. R. Tolkien") , ("Owen King"), ("Peter Straub") , ("Ilana Casoy"), ("Raphael Montes");

insert into  livros (titulo,ano,editora,disponiveis) values ("It-A coisa","1986-09-15","Suma", 5), ("Belas Adormecidas", "2017-09-26", "Suma", 1), ("Game of Thrones: A Storm of Swords", "2000-01-01", "Bantam", 3), ("Game of Thrones: A Feast for Crows", "2005-10-17","Bantam",2), ("Game of Thrones: A Dance with Dragons", "2011-07-12", "Bantam", 4), ("Bom dia, Verônica", "2020-08-27", "Darkside", 0) , ('Hannibal: A Novel',"1999-07-08","Dell", 1), ("Senhor dos Aneis - Edição de Colecionador", "1955-10-20","HarperCollins", 2), ("The Talisman", "1984-11-08", "SUMA",1) ;

insert into autor_livro (autorfk, livrofk) values (1,1), (1,2), (2,3), (2,4), (2,5), (3,7), (4,8), (5,2), (6,9), (1,9), (7,6), (8,6);

