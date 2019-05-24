SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Table `produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(100) NULL,
  `ano` YEAR(4) NULL,
  `cor` VARCHAR(100) NULL,
  `dt_cadastramento` DATE NULL,
  `dt_cancelamento` DATE NULL,
  `nr_seguro` INT NULL,
  `foto` VARCHAR(200) NULL,
  `id_usuario` INT NOT NULL,
  `produtocol` VARCHAR(45) NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE INDEX `id_produto_UNIQUE` (`id_produto` ASC));


-- -----------------------------------------------------
-- Table `localidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `localidade` (
  `id_localidade` INT NOT NULL AUTO_INCREMENT,
  `cidade` VARCHAR(100) NULL,
  `regiao` VARCHAR(100) NULL,
  `endereco` VARCHAR(100) NULL,
  `numero` VARCHAR(100) NULL,
  PRIMARY KEY (`id_localidade`));


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_tipo` INT NOT NULL,
  `nome` VARCHAR(100) NULL,
  `dt_cadastro` DATE NULL,
  `dt_cancelamento` DATE NULL,
  `cpf` VARCHAR(11) NULL,
  `telefone` INT(12) NULL,
  `senha` VARCHAR(200) NULL,
  `id_conta_corrente` INT NULL,
  `id_dados_pagamento` INT NULL,
  `email` VARCHAR(100) NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `id_usuario_UNIQUE` (`id_usuario` ASC));


-- -----------------------------------------------------
-- Table `usuario_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario_tipo` (
  `id_usuario_tipo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`id_usuario_tipo`),
  UNIQUE INDEX `id_usuario_tipo_UNIQUE` (`id_usuario_tipo` ASC))
;


-- -----------------------------------------------------
-- Table `conta_corrente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conta_corrente` (
  `id_conta_corrente` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nr_conta` INT NULL,
  `nr_agencia` INT NULL,
  `banco` VARCHAR(45) NULL,
  PRIMARY KEY (`id_conta_corrente`),
  UNIQUE INDEX `id_conta_corrente_UNIQUE` (`id_conta_corrente` ASC))
;


-- -----------------------------------------------------
-- Table `dados_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dados_pagamento` (
  `id_dados_pagamento` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nr_cartao` INT NULL,
  `dt_validade` DATE NULL,
  `nome_cartao` VARCHAR(100) NULL,
  `bandeira` VARCHAR(100) NULL,
  PRIMARY KEY (`id_dados_pagamento`),
  UNIQUE INDEX `id_dados_pagamento_UNIQUE` (`id_dados_pagamento` ASC))
;


-- -----------------------------------------------------
-- Table `usuario_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario_produto` (
  `id_usuario_produto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `local_retirada` INT NULL,
  `local_entrega` INT NULL,
  `id_usuario` INT NULL,
  `id_produto` INT NULL,
  `dt_cadastro` DATE NULL,
  `dt_cancelamento` DATE NULL,
  `valor_dia` DECIMAL NULL,
  `dt_inicio_disp` DATE NULL,
  `dt_fim_disp` DATE NULL,
  `dt_inicio_uso` DATE NULL,
  `dt_fim_uso` DATE NULL,
  PRIMARY KEY (`id_usuario_produto`))
;


-- -----------------------------------------------------
-- Table `avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id_avaliacao` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario_avaliador` INT NULL,
  `id_usuario_avaliado` INT NULL,
  `sentido` VARCHAR(45) NULL,
  `descricao` VARCHAR(100) NULL,
  `dt_cadastro` DATE NULL,
  PRIMARY KEY (`id_avaliacao`))
;


-- -----------------------------------------------------
-- Table `aluguel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aluguel` (
  `id_aluguel` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario_dono` INT NULL,
  `id_usuario_locador` INT NULL,
  `id_status` INT NULL,
  `dt_inicio` DATE NULL,
  `dt_fim` DATE NULL,
  `id_produto` INT NULL,
  `status` INT NULL,
  PRIMARY KEY (`id_aluguel`))
;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;