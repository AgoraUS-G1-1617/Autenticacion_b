start transaction;

create user 'auth-user'@'%' identified by password '*2A8D4AF90D3F6AB74436A917DAE14BFB82A01D1B';


# Privilegios para `auth-user`@`%`

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, REFERENCES, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, TRIGGER ON *.* TO 'auth-user'@'%' IDENTIFIED BY PASSWORD '*2A8D4AF90D3F6AB74436A917DAE14BFB82A01D1B' WITH GRANT OPTION;


CREATE DATABASE IF NOT EXISTS egcdb;
USE egcdb;
CREATE TABLE IF NOT EXISTS USERS(
	u_id INT AUTO_INCREMENT,
	username 	VARCHAR(30) NOT NULL,
	password 	VARCHAR(32) NOT NULL,
	name	VARCHAR(30) NOT NULL,
	surname	VARCHAR(30) NOT NULL,
	email 	VARCHAR(30) NOT NULL,
	genre 	ENUM("Femenino","Masculino") NOT NULL,
	autonomous_community 	ENUM(  "Andalucia",
                                    "Murcia",
                                    "Extremadura",
                                    "Castilla la Mancha",
                                    "Comunidad Valenciana",
                                    "Madrid",
                                    "Castilla y Leon",
                                    "Aragon",
                                    "Cataluña",
                                    "La Rioja",
                                    "Galicia",
                                    "Asturias",
                                    "Cantabria",
                                    "Pais Vasco",
                                    "Navarra") NOT NULL,
	age 	TINYINT NOT NULL,
	role	ENUM("USUARIO","ADMIN","CREADOR_VOTACIONES") NOT NULL DEFAULT 'USUARIO',
	PRIMARY KEY(U_ID));

INSERT INTO USERS VALUE(NULL, 'carcamcue','f881ef61b9c5560da346c34ddba6d66b','Carlos','Campos Cuesta','carcamcue@alum.us.es','Masculino','Andalucia','22','USUARIO');
INSERT INTO USERS VALUE(NULL, 'alerodrom','133adfeaf09e3048347388bbd4621acc','Alejandro','Rodríguez Romero','alerodrom@alum.us.es','Masculino','Andalucia','22','USUARIO');
INSERT INTO USERS VALUE(NULL, 'rubsuaalm','2ee20c748383871965771744fd81f12c','Rubén','Suárez Almenta','rubsuaalm@alum.us.es','Masculino','Andalucia','21','USUARIO');
INSERT INTO USERS VALUE(NULL, 'carruivar','10576446ce6a5b0bb83f3dd955c4ba4c','Carlos', 'Ruiz Vargas','carruivar@alum.us.es','Masculino','Andalucia','21','USUARIO');
INSERT INTO USERS VALUE(NULL, 'mancabcla','c7f3bfcb56a5d3d2623417f141edb160','Manuel', 'Caballero Clá','mancabcla@alum.us.es','Masculino','Andalucia','21','USUARIO');

INSERT INTO USERS VALUE(NULL, 'fuerte94','e048609908aed7af5ffe60ad8c37fb2c', 'Jorge', 'Rodríguez Fuerte','jorrodfue@alum.us.es','Masculino','Andalucia','22','USUARIO');
INSERT INTO USERS VALUE(NULL, 'aletormar','2a714a0e9c5af182865491b0969e5f60','Alejandro','Tortolero Martín','aletormar@alum.us.es','Masculino','Andalucia','27','USUARIO');
INSERT INTO USERS VALUE(NULL, 'raftrugon','7545bb51a421283c44a02eb657c6b03b','Rafa','Trujillo','raftrugon@alum.us.es','Masculino','Andalucia','21','CREADOR_VOTACIONES');
INSERT INTO USERS VALUE(NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3','Admin','Admin','admin@admin.us.es', 'Masculino', 'Andalucia','22', 'ADMIN');

COMMIT;
