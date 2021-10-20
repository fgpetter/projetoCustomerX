CREATE TABLE `gestaocontatos`.`clientes` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`telefone` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`data_registro` DATETIME NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE 'utf8_general_ci';

insert into clientes (nome, email, telefone) values ('Clerissa', 'cbiermatowicz0@reddit.com', '3817855006');
insert into clientes (nome, email, telefone) values ('Thedrick', 'tsturror1@cloudflare.com', '8607949138');
insert into clientes (nome, email, telefone) values ('Corabella', 'cwharton2@myspace.com', '6255525046');
insert into clientes (nome, email, telefone) values ('Oberon', 'ocalder3@hud.gov', '9693568338');
insert into clientes (nome, email, telefone) values ('Bartel', 'bhaycox4@nymag.com', '3807518083');
insert into clientes (nome, email, telefone) values ('Jacqui', 'jbremond5@mtv.com', '1466610162');
insert into clientes (nome, email, telefone) values ('Christiane', 'cdoidge6@google.fr', '5442475330');
insert into clientes (nome, email, telefone) values ('Shaine', 'ssimonsen7@flickr.com', '2442351825');
insert into clientes (nome, email, telefone) values ('Teri', 'thannaway8@bbc.co.uk', '4129346219');
insert into clientes (nome, email, telefone) values ('Fields', 'fkirkman9@census.gov', '5154257816');