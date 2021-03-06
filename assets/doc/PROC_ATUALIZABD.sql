delete from registros where data_er = '0000-00-00';
drop table registroslog;
alter table users 
change column cpf id char(36),
add column user varchar(100) not null after id,
add column pass varchar(250) not null after user,
add column status char(1) not null;
update users set status = '1';
alter table registros
change column id_user id_user char(36);

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `PROC_AtualizaUsersId`()
BEGIN
DECLARE c INT DEFAULT 1;
select @contador := count(id) from users where length(id) <= 32;
WHILE c <= @contador DO
select @id := id,@nome := name FROM users WHERE  length(id) <= 32 ORDER BY id DESC LIMIT 1 ;
UPDATE users set id = UUID(), user = LOWER(CONCAT(SUBSTRING_INDEX(SUBSTRING_INDEX(@nome, ' ', 1), ' ', -1),'.',TRIM( SUBSTR(@nome, LOCATE(' ', @nome)) ))) where id = @id;
UPDATE registros set id_user = (select id from users where name = @nome ) WHERE id_user = @id;
SET c = c + 1;
END WHILE;
create table card(
id int not null auto_increment primary key,
origem varchar(100) not null,
link varchar(100) null,
img varchar(100) null,
titulo varchar(100) null
);
alter table groups
add column card_acesso varchar(255) null;
insert into card set origem = 'Home', link = '/records', img = '/assets/images/icons/icon_report_ent_sai.png', titulo = 'Registros Portaria';
insert into card set origem = 'Home', link = '/veiculos', img = '/assets/images/icons/icon_report_veiculos.png', titulo = 'Veiculos';
insert into card set origem = 'Home', link = '/chaves', img = '/assets/images/icons/icon_report_chaves.png', titulo = 'Chaves';
insert into card set origem = 'Home', link = '/producao', img = '/assets/images/icons/icon_report_producao.png', titulo = 'Produção';
insert into card set origem = 'Home', link = '/producao/perda', img = '/assets/images/icons/icon_report_perda.png', titulo = 'Perda';
insert into card set origem = 'Home', link = '/limpeza', img = '/assets/images/icons/icon_report_limpeza.png', titulo = 'Limpeza de Maquinas';
insert into card set origem = 'Home', link = '/operador', img = '/assets/images/icons/icon_report_operador.png', titulo = 'Operador';
insert into card set origem = 'Home', link = '/reports', img = '/assets/images/icons/icon_report_reports.png', titulo = 'Relatorios';
insert into card set origem = 'Home', link = '/graphics', img = '/assets/images/icons/icon_report_graphics.png', titulo = 'Graficos';
insert into card set origem = 'Reports', link = '/reports/entradaSaidaVeiculos', img = '/assets/images/icons/icon_report_ent_sai.png', titulo = 'Relação Entrada Saída Veículos';
insert into card set origem = 'Reports', link = '/reports/recebimentoColeta', img = '/assets/images/icons/icon_report_ent_sai.png', titulo = 'Relação Coleta-Recebimentos';
insert into card set origem = 'Reports', link = '/reports/controleChaves', img = '/assets/images/icons/icon_report_ent_sai.png', titulo = 'Controle de Chaves Retiradas-Devolvidas';
insert into card set origem = 'Reports', link = '/reports/chaves', img = '/assets/images/icons/icon_report_chaves.png', titulo = 'Relação Chaves';
insert into card set origem = 'Reports', link = '/reports/veiculos', img = '/assets/images/icons/icon_report_veiculos.png', titulo = 'Relação Veículos';
insert into card set origem = 'Reports', link = '/reports/producao', img = '/assets/images/icons/icon_report_producao.png', titulo = 'Relação de Produção';
insert into card set origem = 'Reports', link = '/reports/perda', img = '/assets/images/icons/icon_report_perda.png', titulo = 'Relação de Perda';
insert into card set origem = 'Reports', link = '/reports/limpeza', img = '/assets/images/icons/icon_report_limpeza.png', titulo = 'Relação Limpeza de Maquinas';
insert into card set origem = 'Graficos', link = '/graphics/producao', img = '/assets/images/icons/icon_report_producao.png', titulo = 'Relação Produção - Extrusão';
update groups set card_acesso = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18' where id = 1;
update groups set card_acesso = '1,2,3,8,10,11,12,13,14' where id = 2;
update groups set card_acesso = '1,2' where id = 3;
update groups set card_acesso = '1,18' where id = 4;
update groups set card_acesso = '1,8,11' where id = 5;
update groups set card_acesso = '4,5,6,7,8,9,15,16,17,18' where id = 6;
update groups set card_acesso = '4,5,6,7,8,9,15,16,17,18' where id = 8;
update groups set card_acesso = '4,5,6,15,16,17' where id = 9;
update groups set card_acesso = '5,6,15,16' where id = 10;
update groups set card_acesso = '5,6,16,17' where id = 11;
update groups set card_acesso = '5,6,16,17' where id = 12;
update groups set card_acesso = '5,6,16,17' where id = 13;
update groups set card_acesso = '5,6,16,17' where id = 14;
update groups set card_acesso = '5,6,16,17' where id = 15;
update groups set card_acesso = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,16,18' where id = 16;
update menu set className = 'fa fa-home' where id = 1;
update menu set className = 'fa fa-lock' where id = 2;
update menu set className = 'fa fa-users' where id = 3;
update menu set className = 'fa fa-file' where id = 4;
update menu set className = 'fa fa-car' where id = 5;
update menu set className = 'fa fa-key' where id = 6;
update menu set className = 'fa fa-file-pdf-o' where id = 7;
update menu set className = 'fa fa-cogs' where id = 8;
update menu set className = 'fa fa-industry' where id = 9;
update menu set className = 'fa fa-clipboard' where id = 10;
update menu set className = 'fa fa-id-badge' where id = 11;
update menu set className = 'fa fa-pie-chart' where id = 12;
update menu set className = 'fa fa-times-circle' where id = 13;
insert into menu set className = 'fa fa-columns', caminho = '/card', descricao = 'Card';
insert into permissions set name = 'card_view', descricao = 'VISUALIZAR CARD';
insert into permissions set name = 'card_add', descricao = 'ADICIONAR CARD';
insert into permissions set name = 'card_edit', descricao = 'EDITAR CARD';
insert into permissions set name = 'card_del', descricao = 'DELETAR CARD';
insert into permissions set name = 'usuario_edit', descricao = 'EDITAR USUARIO';
END;
CALL PROC_AtualizaUsersId();
DROP PROCEDURE PROC_AtualizaUsersId;
 
 
 