CREATE TABLE usuario (
nome varchar(50),
email varchar (25),
senha varchar (8),
cod_usuario serial PRIMARY KEY,
cod_curso int );

CREATE TABLE emprestimo (
hora varchar(5),
data date,
cod_emprestimo serial PRIMARY KEY,
cod_atendente int,
cod_usuario int,
FOREIGN KEY(cod_usuario) REFERENCES usuario (cod_usuario)
);

CREATE TABLE atendente (
nome varchar (50),
email varchar (25),
cod_atendente serial PRIMARY KEY
);
CREATE TABLE livro (
titulo varchar (50),
edicao varchar (50),
ano_publicacao int,
isbn varchar (10),
cod_livro serial PRIMARY KEY 
);
CREATE TABLE curso (nome varchar (50),
cod_curso serial PRIMARY KEY
);
CREATE TABLE emprestimo_livro (
emprestado int,
data_prevista_entrega date,
cod_emprestimo int,
cod_livro int,
FOREIGN KEY(cod_emprestimo) REFERENCES emprestimo (cod_emprestimo),
FOREIGN KEY(cod_livro) REFERENCES livro (cod_livro) );
ALTER TABLE usuario ADD FOREIGN KEY(cod_curso) REFERENCES
curso (cod_curso);
ALTER TABLE emprestimo ADD FOREIGN KEY(cod_atendente) REFERENCES
atendente (cod_atendente);



insert into atendente (nome,email) values ('atendente01','atendente01@hotmail.com');
insert into atendente (nome,email) values ('atendente02','atendente02@hotmail.com');
insert into atendente (nome,email) values ('atendente03','atendente03@hotmail.com');
insert into atendente (nome,email) values ('atendente04','atendente04@hotmail.com');
insert into atendente (nome,email) values ('atendente05','atendente05@hotmail.com');




insert into curso (nome) values ('informática');
insert into curso (nome) values ('Biotecnologia');
insert into curso (nome) values ('Agroecologia');
insert into curso (nome) values ('Eletrônica');
insert into curso (nome) values ('Automação');



insert into usuario (nome,email,senha,cod_curso) values
('Douglas Juliani','douglas.julian','12345678',1);
insert into usuario (nome,email,senha,cod_curso) values
('Janaina','jana@ifsc.edu.br','12345678',2);
insert into usuario (nome,email,senha,cod_curso) values
('Fedra','douglas.juliani@if','12345678',3);
insert into usuario (nome,email,senha,cod_curso) values
('Alex','alex@ifsc.edu.br','12345678',4);
insert into usuario (nome,email,senha,cod_curso) values
('Juliano','juliano@ifsc.edu.br','12345678',1);

insert into livro (titulo,edicao,ano_publicacao,isbn) values ('Banco de Dados','Editora Juliani','2007',33334444);
insert into livro (titulo,edicao,ano_publicacao,isbn) values ('Lógica de Programação','Editora Pearson','2010',33335555);
insert into livro (titulo,edicao,ano_publicacao,isbn) values ('Engenharia de Software','Editora Pearson','2009',33336666);
insert into livro (titulo,edicao,ano_publicacao,isbn) values ('Scrum','Editora Pearson','2011',33337777);

insert into emprestimo (hora,data,cod_atendente,cod_usuario) values ('14:00','2012-07-30','1',1);
insert into emprestimo_livro (emprestado,data_prevista_entrega,cod_emprestimo,cod_livro) values (1,'2012-08-15',1,1);
insert into emprestimo_livro (emprestado,data_prevista_entrega,cod_emprestimo,cod_livro) values (1,'2012-08-15',1,2);
insert into emprestimo (hora,data,cod_atendente,cod_usuario) values ('15:00','2012-07-30','2',2);
insert into emprestimo_livro (emprestado,data_prevista_entrega,cod_emprestimo,cod_livro) values (1,'2012-08-15',2,3);
insert into emprestimo_livro(emprestado,data_prevista_entrega,cod_emprestimo,cod_livro) values (1,'2012-08-15',2,3);
