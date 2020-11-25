CREATE TABLE `produto` (
    `id` SMALLINT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(70) NOT NULL,
    `valor` VARCHAR(70) NOT NULL,
    `percDesconto` VARCHAR(70) NOT NULL
);

INSERT INTO `produto` (nome, valor, percDesconto) VALUES ('Coca-cola','5.00','0.00');
INSERT INTO `produto` (nome, valor, percDesconto) VALUES ('Batata Frita','15.00','0.00');
INSERT INTO `produto` (nome, valor, percDesconto) VALUES ('Batata Frita Promo Quinta','15.00','10.00');