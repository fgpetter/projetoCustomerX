CREATE TABLE `gestaocontatos`.`usuarios_copy` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`senha` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
 COLLATE 'utf8_general_ci';

insert into usuarios (nome, email, senha) values ('admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');
