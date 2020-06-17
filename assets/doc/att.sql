create table card(
id varchar(255) not null,
origem varchar(100) not null,
link varchar(100) null,
img varchar(100) null,
titulo varchar(100) null
);
alter table groups
add column card_acesso varchar(255) null;
SELECT link,img,titulo FROM card WHERE id IN ('1') AND origem = 'Home';
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