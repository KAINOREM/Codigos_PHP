Create DATABASE Escola_DB;
USE Escola_DB;

CREATE TABLE Funcionario 
( 
 IdFuncionario INT PRIMARY KEY AUTO_INCREMENT,  
 Nome VARCHAR(100) NOT NULL,  
 Ativo INT NOT NULL DEFAULT '1',  
 Senha VARCHAR(100) NOT NULL
); 

CREATE TABLE Estoque 
(   
 IdProduto INT PRIMARY KEY AUTO_INCREMENT,
 Nome VARCHAR(100) NOT NULL,
 Descricao VARCHAR(500) NOT NULL,
 Valor_Unitario DECIMAL(10,2) NOT NULL,
 Quantidade INT NOT NULL,  
 Quantidade_Minima INT NOT NULL
 Ativo INT NOT NULL DEFAULT '1',  
); 

CREATE TABLE Transacao 
( 
 IdTransacao INT PRIMARY KEY AUTO_INCREMENT,  
 IdProduto INT,  
 IdFuncionario INT,  
 Data_Transacao DATE NOT NULL,
 Tipo INT NOT NULL,    
 Quantidade INT NOT NULL 
); 

ALTER TABLE Transacao ADD FOREIGN KEY(IdProduto) REFERENCES Estoque (IdProduto);
ALTER TABLE Transacao ADD FOREIGN KEY(IdFuncionario) REFERENCES Funcionario (IdFuncionario);

INSERT INTO Funcionario (Nome, Senha) VALUES 
('Admin', '123'),
('Gustavo', 'gustavo'),
('Maria', 'maria'),
('João', 'joao');
INSERT INTO Estoque (Nome, Descricao, Valor_Unitario, Quantidade, Quantidade_Minima) VALUES 
('Caderno', 'Caderno universitário 100 folhas', 15.00, 50, 10),
('Caneta', 'Caneta esferográfica azul', 2.50, 200, 50),
('Mochila', 'Mochila escolar resistente', 120.00, 30, 5),
('Lápis', 'Lápis de grafite HB', 1.00, 150, 30),
('Borracha', 'Borracha branca macia', 0.75, 100, 20);
INSERT INTO Transacao (IdProduto, IdFuncionario, Data_Transacao, Tipo, Quantidade) VALUES 
(1, 2, '2024-01-15', 1, 20),
(2, 3, '2024-01-16', 1, 50),
(3, 4, '2024-01-17', 1, 10),
(4, 2, '2024-01-18', 1, 40),
(5, 3, '2024-01-19', 1, 25);
