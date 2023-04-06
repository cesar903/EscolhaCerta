CREATE DATABASE bd_clientes ;

CREATE TABLE clientes(
id int(4) AUTO_INCREMENT,
nome varchar(50) NOT NULL,
email varchar(50) NOT NULL,
cpf_cnpj varchar(17) NOT NULL,
fixo varchar(50) ,
celular varchar(50) NOT NULL,
cep varchar(11) NOT NULL,
rua varchar(50) NOT NULL,
numero varchar(4) NOT NULL,
complemento varchar(20),
cidade varchar(50) NOT NULL,
estado varchar(20) NOT NULL,
bairro varchar(50) NOT NULL,
hora_data varchar(10),
tipo varchar(10),
situacao int(1),
orcamento varchar(500),
PRIMARY KEY (id)
);
