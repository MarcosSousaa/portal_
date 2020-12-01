/* ADICIONAR PERMISSIONS */
INSERT INTO permissions set descricao = 'VISUALIZAR MATERIA PRIMA', name = 'matprima_view';
INSERT INTO permissions set descricao = 'EDITAR MATERIA PRIMA', name = 'matprima_edit';
INSERT INTO permissions set descricao = 'ADICIONAR MATERIA PRIMA', name = 'matprima_add';

INSERT INTO permissions set descricao = 'VISUALIZAR LOTE INTERNO', name = 'loteint_view';
INSERT INTO permissions set descricao = 'EDITAR LOTE INTERNO', name = 'loteint_edit';
INSERT INTO permissions set descricao = 'ADICIONAR LOTE INTERNO', name = 'loteint_add';

INSERT INTO permissions set descricao = 'VISUALIZAR LOTE MP PRANDI', name = 'lotepran_view';
INSERT INTO permissions set descricao = 'EDITAR LOTE MP PRANDI', name = 'lotepran_edit';
INSERT INTO permissions set descricao = 'ADICIONAR LOTE MP PRANDI', name = 'lotepran_add';
/* ADICIONAR MENU */ 

insert into menu set className = 'fa fa-sitemap', caminho = '/matprima', descricao = 'Materia Prima';
/*insert into menu set className = 'fa fa-cubes', caminho = '/lotefor', descricao = 'Lote Fornecedor';*/
insert into menu set className = 'fa fa-cubes', caminho = '/loteint', descricao = 'Lote Interno';
insert into menu set className = 'fa fa-cubes', caminho = '/lotepran', descricao = 'Lote MP Prandi';
/*insert into menu set className = 'fa fa-sitemap', caminho = '/matprima', descricao = 'Materia Prima';*/
/* ADICIONAR CARDS*/
insert into card set origem = 'Home', link = '/matprima', img = '/assets/images/icons/icon_report_stocks.png', titulo = 'Materia Prima';
insert into card set origem = 'Home', link = '/loteint', img = '/assets/images/icons/icon_report_loteint.png', titulo = 'Lote Interno';
insert into card set origem = 'Home', link = '/lotepran', img = '/assets/images/icons/icon_report_lotepran.png', titulo = 'Lote MP Prandi';
/* 
	ATUALIZAÇÃO NO BANCO DE DADOS 
    MARCOS
    CRIAÇÃO DA TABELA matprima
    DESCRIÇÃO: MATERIA PRIMA
    22/10/2020
*/ 

create table matprima(
	id VARCHAR(36) PRIMARY KEY NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    fornecedor VARCHAR(255) NULL,
    status CHAR(1),
    TIMESTAMP DATETIME
    
);

/* 
	ATUALIZAÇÃO NO BANCO DE DADOS 
    MARCOS
    CRIAÇÃO DA TABELA lote_interno
    DESCRIÇÃO: LOTE INTERNO    8/10/2020

*/ 

CREATE TABLE IF NOT EXISTS lote_interno (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  lote INT NOT NULL UNIQUE,
  data DATE NOT NULL,
  turno VARCHAR(3) NULL,
  id_operador_m INT NULL,
  batidas INT NULL,
  produto VARCHAR(3) NULL,
  id_operador_g INT NULL,
  qtd DOUBLE(10,3) NULL,
  situacao CHAR(1) NULL,
  obs VARCHAR(255) NULL,
  TIMESTAMP DATETIME,      
  FOREIGN KEY (id_operador_m) REFERENCES operador(id),    
  FOREIGN KEY (id_operador_g) REFERENCES operador (id)
);

/* 
	ATUALIZAÇÃO NO BANCO DE DADOS 
    MARCOS
    CRIAÇÃO DA TABELA lote_lancamento
    DESCRIÇÃO: LOTE INTERNO    8/10/2020

*/ 

CREATE TABLE IF NOT EXISTS lote_lancamento (
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  id_lote INT NULL,
  lote_fornecedor VARCHAR(150) NULL,
  tipo VARCHAR(45) NULL,
  qtd VARCHAR(45) NULL,
  id_matprima VARCHAR(36) NULL,
  CONSTRAINT `id_matprima`
    FOREIGN KEY (`id_matprima`)
    REFERENCES `portariabandeirante`.`matprima` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_lote`
    FOREIGN KEY (`id_lote`)
    REFERENCES `portariabandeirante`.`lote_interno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)




/* 
	ATUALIZAÇÃO NO BANCO DE DADOS 
    MARCOS
    CRIAÇÃO DA TABELA lote_interno
    DESCRIÇÃO: LOTE INTERNO    8/10/2020

*/ 

CREATE TABLE IF NOT EXISTS lote_pran (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  n_bob INT NOT NULL UNIQUE,
  data_ini DATE NOT NULL,
  hr_ini CHAR(4) NULL,
  turno VARCHAR(3) NULL,
  maquina VARCHAR(5) NULL,
  id_operador INT NULL,
  data_fim DATE NULL,
  hr_fim CHAR(4) NULL,
  esp VARCHAR(20) NULL,
  largura DOUBLE(10,3) NULL,
  metragem DOUBLE(10,3) NULL,
  gramatura DOUBLE(10,3) NULL,
  tipo CHAR(1),/* F - FOLHA OU T - TUBULAR*/
  form VARCHAR(50) NULL,
  peso DOUBLE(10,3) NULL,
  tela CHAR(1) NULL,
  obs VARCHAR(255) NULL,
  TIMESTAMP DATETIME,
  FOREIGN KEY (id_operador) REFERENCES operador(id)  
);

/* 
	ATUALIZAÇÃO NO BANCO DE DADOS 
    MARCOS
    CRIAÇÃO DA TABELA lote_lancamento
    DESCRIÇÃO: LOTE INTERNO    8/10/2020

*/ 

CREATE TABLE IF NOT EXISTS pran_lancamento (
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  id_lote_pran INT NULL,
  lote_fornecedor VARCHAR(150) NULL,  
  qtd DOUBLE(12,3) NULL,
  id_matprima VARCHAR(36) NULL,
  CONSTRAINT `id_matprima_P`
    FOREIGN KEY (`id_matprima`)
    REFERENCES `portariabandeirante`.`matprima` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_lote_p`
    FOREIGN KEY (`id_lote_pran`)
    REFERENCES `portariabandeirante`.`lote_pran` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
