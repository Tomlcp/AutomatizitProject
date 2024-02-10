drop database if exists automatizit;
create database if not exists automatizit;
use automatizit;

############################################################################################################
		-- Tabela de Usuários.
############################################################################################################

Create table usuarios (
	id_usuario int primary key,
    username varchar(15) not null,
    senha varchar(90) not null
);

############################################################################################################
		-- Tabela de Clientes.
############################################################################################################

create table clientes (
	id_cliente int primary key,
    nome varchar(90) not null,
    telefone varchar(11),
    cpf varchar(12) not null,
    dtnasc date,
    genero enum("Masculino", "Feminino")
);

############################################################################################################
		-- Tabela de Serviços.
############################################################################################################

create table servicos (
	id_servico int primary key,
    cad_cliente int,
    nome_servico varchar(90),
    descricao varchar(90),
    custo decimal(10, 2),
    foreign key(cad_cliente) references clientes(id_cliente)
);

############################################################################################################
		-- Tabela de Automóveis.
############################################################################################################

create table automoveis (
	id_auto int primary key,
    nome_carro varchar(90),
    cad_cliente int,
    placa varchar(7) not null unique,
    foreign key(cad_cliente) references clientes(id_cliente)
);







