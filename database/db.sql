create database gerenciador_estoque;
use gerenciador_estoque;

create table produtos(
    id int auto_increment primary key,
    nome varchar(100) not null,
    categoria enum('Comida','Bebida','Material de Limpeza'),
    descricao varchar(255) not null,
    preco int not null,
    quantidade_estoque int not null
    data_validade date not null

);