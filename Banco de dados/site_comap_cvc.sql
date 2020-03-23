create database site_comap_cvc;

use site_comap_cvc;

CREATE TABLE tb_login(
	id int auto_increment not null,
    usuario varchar(100) not null,
    senha varchar(32) not null,
    primary key (id)
    );
    
INSERT INTO tb_login (usuario, senha) VALUES ('administrador', md5('com@pcvc'));
    
SELECT * FROM tb_login;