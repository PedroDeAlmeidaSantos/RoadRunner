CREATE DATABASE bd_road_runner;
 CREATE TABLE tbl_fale_conosco(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nome VARCHAR(100) NOT NULL,
		telefone VARCHAR(100) NULL,
		celular VARCHAR(100) NOT NULL,
		email VARCHAR(100) NOT NULL,
		home_page VARCHAR(300) NULL,
		link_facebook VARCHAR(300) NULL,
		sugestao_critica VARCHAR(500) NULL,
		informacao_produto VARCHAR(500) NULL,
		sexo VARCHAR(100) NOT NULL,
		profissao VARCHAR(100) NOT NULL
		);
        
        CREATE TABLE tbl_usuario(
		id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nome_usuario VARCHAR(100) NOT NULL,
		nome_login VARCHAR(100) NOT NULL,
		senha_usuario VARCHAR(200) NOT NULL,
		id_nivel_usuario INT NOT NULL,
		status_usuario BOOLEAN NULL,
		FOREIGN KEY (id_nivel_usuario) REFERENCES tbl_nivel_usuario (id_nivel_usuario));
        
        CREATE TABLE tbl_nivel_usuario(
		id_nivel_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nivel_usuario VARCHAR(100) NOT NULL,
		status_nivel BOOLEAN NULL
);

CREATE TABLE tbl_sobre_loja(
		id_sobre_loja INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		titulo_loja VARCHAR(40),
		titulo_patrocinio VARCHAR(40),
		imagem_patrocinador1 VARCHAR(255),
		imagem_patrocinador2 VARCHAR(255),
		imagem_patrocinador3 VARCHAR(255),
		imagem_parceria1 VARCHAR(255),
		imagem_parceria2 VARCHAR(255),
		imagem_parceria3 VARCHAR(255),
		sessao_texto1 TEXT(400) NOT NULL,
		sessao_texto2 TEXT(400) NOT NULL,
		sessao_texto3 TEXT(400) NOT NULL,
		status BOOLEAN NULL
		
);


CREATE TABLE tbl_loja(
		id_loja INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		imagem_loja VARCHAR(255) NOT NULL,
		titulo_loja VARCHAR(20) NOT NULL,
		endereco VARCHAR(60) NOT NULL,
		cep VARCHAR(20) NOT NULL,
		telefone VARCHAR(20) NOT NULL,
		horario VARCHAR(30) NOT NULL,
		endereco_mapa TEXT NOT NULL,
		status BOOLEAN NULL
);







CREATE TABLE tbl_evento(
		id_evento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		titulo_evento VARCHAR(25) NOT NULL,
		texto_evento TEXT(640) NOT NULL,
		imagem_evento VARCHAR(255) NOT NULL,
		status BOOLEAN NULL

);

CREATE TABLE tbl_nosso_evento(
	id_nosso_evento INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	status BOOLEAN NULL,
	id_evento INT NOT NULL,
	FOREIGN KEY (id_evento) REFERENCES tbl_evento (id_evento)
);

CREATE TABLE tbl_outro_evento(
	id_outro_evento INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	imagem_evento VARCHAR(255),
	local_evento VARCHAR(20) NOT NULL,
	data_evento VARCHAR(8) NOT NULL,
	horario VARCHAR(8) NOT NULL,
	status BOOLEAN NULL

);

CREATE TABLE tbl_noticia(
	id_noticia INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	imagem_noticia VARCHAR(255) NOT NULL,
	titulo_noticia VARCHAR(65) NOT NULL,
	texto TEXT(850) NOT NULL,
	status BOOLEAN NULL
	
);


CREATE TABLE tbl_promocao(
		id_promocao INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		porcentagem DOUBLE NOT NULL,
		id_produto INT NOT NULL,
		status BOOLEAN NULL,
		FOREIGN KEY (id_produto) REFERENCES tbl_produto (id_produto)
);

CREATE TABLE tbl_produto(
		id_produto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		imagem_produto VARCHAR(255) NOT NULL,
		nome_produto VARCHAR(25),
		status BOOLEAN NULL,
		preco DOUBLE NOT NULL
		
);


CREATE TABLE tbl_categoria(
	id_categoria int not null primary key auto_increment,
	status TINYINT(1) NOT NULL,
	categoria varchar(30) not null
);

CREATE TABLE tbl_subcategoria(
	id_subcategoria int not null primary key auto_increment,
    subcategoria varchar(30) not null,
    id_categoria int not null,
	status TINYINT(1) NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES tbl_categoria(id_categoria)

);

select * from tbl_produto;


CREATE TABLE tbl_produto_subcategoria(
		id int not null primary key auto_increment,
        id_categoria int not null,
        id_subcategoria int not null,
        id_produto int not null,
		status TINYINT(1) NOT NULL,
        FOREIGN KEY (id_categoria) REFERENCES tbl_categoria(id_categoria),
        FOREIGN KEY (id_subcategoria) REFERENCES tbl_subcategoria(id_subcategoria),
        FOREIGN KEY (id_produto) REFERENCES tbl_produto(id_produto)
);


/*MENU*/
select categoria from tbl_categoria;

/*SUBMENU*/
select subcategoria from tbl_subcategoria 
inner join tbl_categoria on tbl_categoria.id_categoria = tbl_subcategoria.id_categoria
WHERE tbl_categoria.id_categoria = 2;

