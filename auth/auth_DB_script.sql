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
	genre 	ENUM('Femenino','Masculino') NOT NULL,
	autonomous_community 	ENUM('Andalucia','Murcia','Extremadura','Castilla la Mancha','Comunidad Valenciana','Madrid','Castilla y Leon','Aragon','Cataluña','La Rioja','Galicia','Asturias','Cantabria','Pais Vasco','Navarra')NOT NULL,
	age 	TINYINT NOT NULL,
	role	ENUM('USUARIO','ADMIN','CREADOR_VOTACIONES') NOT NULL DEFAULT 'USUARIO',
	PRIMARY KEY(U_ID));

INSERT INTO USERS VALUE(NULL, 'pabcargar2','6d722561cf386015cb1d7c1937806bb5','Pablo José','Carrillo García','pabcargar2@alum.us.es','Masculino','Andalucia','22','USUARIO');
INSERT INTO USERS VALUE(NULL, 'julmayalv','69d597adc75eb3dd6bd50263d07ba7d0','Julián','Maya','julmayalv@alum.us.es','Masculino','Andalucia','22','USUARIO');
INSERT INTO USERS VALUE(NULL, 'josnavmar','9d9f2aad56b353eba0f1455e76ddb232','Jose Manuel','Navarro Márquez','josnavmar@alum.us.es','Masculino','Andalucia','24','USUARIO');
INSERT INTO USERS VALUE(NULL, 'sercaroli','05091978bbc2a25dc311e825950aeb0f','Sergio', 'Carrascosa Oliva','sercaroli@alum.us.es','Masculino','Andalucia','22','USUARIO');
INSERT INTO USERS VALUE(NULL, 'fuerte94','e048609908aed7af5ffe60ad8c37fb2c', 'Jorge', 'Rodríguez Fuerte','jorrodfue@alum.us.es','Masculino','Andalucia','22','USUARIO');
INSERT INTO USERS VALUE(NULL, 'aletormar','2a714a0e9c5af182865491b0969e5f60','Alejandro','Tortolero Martín','aletormar@alum.us.es','Masculino','Andalucia','27','USUARIO');
INSERT INTO USERS VALUE(NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3','Admin','Admin','admin@admin.us.es', 'Masculino', 'Andalucia','22', 'ADMIN');

COMMIT;
