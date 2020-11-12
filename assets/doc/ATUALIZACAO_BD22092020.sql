/* ADICIONAR PERMISSIONS */
INSERT INTO permissions set descricao = 'VISUALIZAR MATERIA PRIMA', name = 'matprima_view'
INSERT INTO permissions set descricao = 'EDITAR MATERIA PRIMA', name = 'matprima_edit'
INSERT INTO permissions set descricao = 'ADICIONAR MATERIA PRIMA', name = 'matprima_add'

INSERT INTO permissions set descricao = 'VISUALIZAR LOTE INTERNO', name = 'loteint_view'
INSERT INTO permissions set descricao = 'EDITAR LOTE INTERNO', name = 'loteint_edit'
INSERT INTO permissions set descricao = 'ADICIONAR LOTE INTERNO', name = 'loteint_add'
/* ADICIONAR MENU */ 

insert into menu set className = 'fa fa-sitemap', caminho = '/matprima', descricao = 'Materia Prima';
/*insert into menu set className = 'fa fa-cubes', caminho = '/lotefor', descricao = 'Lote Fornecedor';*/
insert into menu set className = 'fa fa-cubes', caminho = '/loteint', descricao = 'Lote Interno';
insert into menu set className = 'fa fa-cubes', caminho = '/lotpran', descricao = 'Lote MP Prandi';
insert into menu set className = 'fa fa-sitemap', caminho = '/matprima', descricao = 'Materia Prima';
/* ADICIONAR CARDS*/
insert into card set origem = 'Home', link = '/matprima', img = '/assets/images/icons/icon_report_stocks.png', titulo = 'Materia Prima';
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
  id VARCHAR(36) NOT NULL PRIMARY KEY,
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
  id VARCHAR(36) NOT NULL,
  id_lote VARCHAR(36) NULL,
  lote_fornecedor VARCHAR(150) NULL,
  tipo VARCHAR(45) NULL,
  qtd VARCHAR(45) NULL,
  id_matprima VARCHAR(36) NULL,
  PRIMARY KEY (`id`),  
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

