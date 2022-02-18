create table epreuve (
	id INT auto_increment NOT NULL,
	description VARCHAR(50) NOT NULL,
	CONSTRAINT epreuve_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;

insert into epreuve (id, description) values (1, '5 kilomètres');
insert into epreuve (id, description) values (2, '10 kilomètres');
insert into epreuve (id, description) values (3, 'Demi-marathon');
insert into epreuve (id, description) values (4, 'Marathon');