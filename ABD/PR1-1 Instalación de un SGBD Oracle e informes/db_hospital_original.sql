CREATE TABLE doctor(
id_doctor INT(3),
nombre VARCHAR(50) NOT NULL,
apellido1 VARCHAR(50) NOT NULL,
apellido2 VARCHAR(50),
genero VARCHAR(8) NOT NULL,
especialidad VARCHAR(150) NOT NULL,
CONSTRAINT Pk_doctor
PRIMARY KEY(id_doctor),
CONSTRAINT Uk_doctor_nom
UNIQUE KEY(nombre, apellido1, apellido2));




CREATE TABLE cp_poblacion(
codigo_postal VARCHAR(5) NOT NULL,
poblacion VARCHAR(50) NOT NULL,
PRIMARY KEY(codigo_postal, poblacion)
);



CREATE TABLE via(
cod_via INT(5) PRIMARY KEY,
tipo_via VARCHAR(30) NOT NULL,
nom_via VARCHAR(100) NOT NULL,
numero INT(4) NOT NULL,
puerta VARCHAR(4) NOT NULL,
escalera VARCHAR(10),
portal VARCHAR(10),
piso VARCHAR(10));



CREATE TABLE paciente(
id_paciente INT(5),
nombre VARCHAR(50) NOT NULL,
apellido1 VARCHAR(50) NOT NULL,
apellido2 VARCHAR(50),
genero VARCHAR(8) NOT NULL,
f_nacimiento DATE NOT NULL,
cod_via INT(5) NOT NULL,
cod_post VARCHAR(5) NOT NULL,
telf_contacto VARCHAR(15) NOT NULL,
CONSTRAINT Pk_paciente
PRIMARY KEY(id_paciente),
CONSTRAINT Uk_paciente_nom
UNIQUE KEY(nombre, apellido1, apellido2),
CONSTRAINT Fk_paciente_via
FOREIGN KEY (cod_via)
REFERENCES via(cod_via),
CONSTRAINT Fk_paciente_cp_poblacion
FOREIGN KEY (cod_post)
REFERENCES cp_poblacion(codigo_postal));

CREATE TABLE consulta(
id_consulta VARCHAR(45) PRIMARY KEY,
id_doctor INT(3) NOT NULL,
id_paciente INT(5) NOT NULL,
fecha_consulta DATE NOT NULL,
CONSTRAINT Fk_consulta_doctor
FOREIGN KEY (id_doctor)
REFERENCES doctor(id_doctor),
CONSTRAINT Fk_consulta_paciente
FOREIGN KEY (id_paciente)
REFERENCES paciente(id_paciente)
);


CREATE TABLE diagnostico(
id_diagnostico INT(5),
descripcion VARCHAR(200) NOT NULL,
consulta_id VARCHAR(45) NOT NULL,
CONSTRAINT PK_diagnostico
PRIMARY KEY(id_diagnostico),
CONSTRAINT Fk_diagnostico_consulta
FOREIGN KEY (consulta_id)
REFERENCES consulta(id_consulta)
);

CREATE TABLE sTOMA(
id_sTOMA INT(5) PRIMARY KEY,
descripcion VARCHAR(200) NOT NULL,
id_diagnostico INT(5) NOT NULL,
CONSTRAINT Fk_sTOMA_diagnostico
FOREIGN KEY (id_diagnostico)
REFERENCES diagnostico(id_diagnostico)
);

CREATE TABLE medicamento(
id_medicamento INT(5) PRIMARY KEY,
nombre VARCHAR(100) NOT NULL
);

CREATE TABLE paciente_medicamento_tratamiento(
id_paciente INT(5) NOT NULL,
id_medicamento INT(5) NOT NULL,
dosis_diaria FLOAT NOT NULL,
PRIMARY KEY(id_paciente,id_medicamento),
CONSTRAINT Fk_pacmedtrat_paciente
FOREIGN KEY (id_paciente)
REFERENCES paciente(id_paciente),
CONSTRAINT Fk_pacmedtrat_medicamento
FOREIGN KEY (id_medicamento)
REFERENCES medicamento(id_medicamento)
);

CREATE TABLE medicamento_sTOMA(
id_sTOMA INT(5) NOT NULL,
id_medicamento INT(5) NOT NULL,
dosis_diaria FLOAT NOT NULL,
PRIMARY KEY(id_sTOMA,id_medicamento),
CONSTRAINT Fk_medicsint_medicamento
FOREIGN KEY (id_medicamento)
REFERENCES medicamento(id_medicamento),
CONSTRAINT Fk_medicsint_sTOMA
FOREIGN KEY (id_sTOMA)
REFERENCES sTOMA(id_sTOMA)
);


INSERT INTO via(cod_via,tipo_via,nom_via,numero,puerta)
VALUES (1,"Calle","Sant Roc",44,"2"),
(2,"Calle","Catarroja",32,"7"),
(3,"Avenida","Alicante",102,"10"),
(4,"Avenida","del Mediterráneo",144,"12"),
(5,"Calle","8 de marzo",7,"22"),
(6,"Calle","Sénia",38,"31"),
(7,"Rambla","de la Independencia",37,"7"),
(8,"Paseo","de Gracia",22,"9"),
(9,"Ronda","Norte",15,"22"),
(10,"Paseo","de la Alameda",24,"8"),
(11,"Calle","del Río Arcos",8,"2"),
(12,"Calle","Andrés Mancebo",16,"12"),
(13,"Avenida","del Pueto",41,"7");



INSERT INTO cp_poblacion(codigo_postal,poblacion)
VALUES ("46460","Silla"),
("46200","Paiporta"),
("46470","Catarroja"),
("46470","Massanassa"),
("46001","Valencia"),
("46002","Valencia"),
("46900","Torrent"),
("46901","Torrent"),
("46210","Picanya"),
("46970","Alaquas"),
("46470","Albal"),
("46469","Beniparrell");

INSERT INTO doctor(id_doctor,nombre,apellido1,apellido2,genero,especialidad)
VALUES(1,"Amparo","Domingo","Hernández","mujer","neumología"),
(2,"Sara","Martínez","Alberola","mujer","cardiología"),
(3,"Juan","Ibáñez","Martí","hombre","dermatología"),
(4,"Carmen","Romeu","Rosaleny","mujer","endocrinología"),
(5,"Sergio","Zaragozá","Horcajuelo","hombre","neurología"),
(6,"Ariel","del Pozo","Ribes","hombre","medicina interna"),
(7,"Arón","Sánchez","Palomares","hombre","geriatría"),
(8,"Carles","Escribá","Santamans","hombre","anestesiología"),
(9,"Alexis","Llopis","Prats","hombre","alergología"),
(10,"Pedro","Montiel","Regal","hombre","reumatología"),
(11,"Leonor","Rodrigo","Ramón","mujer","toxicología"),
(12,"Daniel","Ortuño","Carrasco","hombre","pediatría"),
(13,"Diego","Alcahut","Benavent","hombre","nutriología"),
(14,"Lorena","Dies","Ivanets","mujer","medicina familiar"),

(15,"Emilio","Ardila","Javaloyas","hombre","cardiología"),
(16,"Erik","Pla","Fernández","hombre","dermatología"),
(17,"María","Sanchis","Pérez","mujer","endocrinología"),
(18,"Esmeralda","Sahuquillo","Torrent","mujer","neurología"),
(19,"Guzmán","Girbés","Plá","hombre","medicina forense"),
(20,"Imma","Ramírez","Cebolla","mujer","geriatría"),
(21,"Francisco","Zaragozá","Girbés","hombre","anestesiología"),
(22,"Joel","Murcia","Richart","hombre","alergología"),
(23,"Miguel","Pastor","Castells","hombre","reumatología"),
(24,"Eva","Boluda","Rodríguez","mujer","toxicología"),
(25,"Dolores","Vázquez","Cebriá","mujer","pediatría"),
(26,"Julio","Adam","Mulet","hombre","nutriología"),
(27,"Julia","Dávila","Roig","mujer","medicina familiar"),


(28,"Peisen","Dong",null,"hombre","cardiología"),
(29,"Pablo","Rivero","Puigcerver","hombre","dermatología"),
(30,"Rubén","Doménech","Aranda","hombre","endocrinología"),
(31,"Xavier","Yuncal","Aliques","hombre","neurología"),
(32,"Telmo","Romero","Maíques","hombre","oncología médica"),
(33,"Víctor","Gelida","Bover","hombre","oncología radioterápica"),
(34,"Yann","Yuncal","Lacuesta","hombre","oncología radioterápica"),
(35,"Mónica","Visent","Aranda","mujer","alergología"),
(36,"Isabel","Montejano","Doménech","mujer","reumatología"),
(37,"Leonardo","Alcañiz","Murcia","hombre","toxicología"),
(38,"Emilia","Abella","González","mujer","pediatría"),
(39,"Bernardo","Baeza","Calatayud","hombre","nutriología"),
(40,"Abelardo","Martínez","Gómez","hombre","medicina familiar");

INSERT INTO paciente(id_paciente,nombre,apellido1,apellido2,genero,f_nacimiento,cod_via,cod_post,telf_contacto)
VALUES(1,"Mónico","Naranjo","Álvarez","mujer","2000-2-29",1,"46200","630697643"),
(2,"Carlos","Naranjo","Álvarez","hombre","2000-2-29",1,"46200","670441572"),
(3,"Alberto","Revert","Domingo","hombre","2010-8-19",2,"46200","645267895"),
(4,"Sara","Sánchez","Alberola","mujer","1980-2-29",3,"46200","630697643"),
(5,"Elvira","Mayordomo","Casal","mujer","1978-2-28",4,"46970","630697643"),
(6,"Manuel","Carrasco","Turizo","hombre","1984-10-29",5,"46970","630697643"),
(7,"Javier","Rosaleny","Lluesa","hombre","1997-3-25",6,"46460","630697643"),
(8,"Pedro","Rosaleny","Lluesa","hombre","1997-3-25",6,"46460","630697643"),
(9,"Ernesto","Martínez","Samper","hombre","1998-9-18",7,"46210","630697643"),
(10,"Isaac","Martínez","Samper","hombre","2000-5-23",7,"46210","630697643"),
(11,"Jose Manuel","Seda","Parada","hombre","2000-7-12",8,"46210","630697643"),
(12,"Isabel","Espuig","Álvarez ","mujer","2007-4-12",9,"46900","673897236"),
(13,"Irene","Espuig","Álvarez","mujer","2011-7-21",9,"46900","673897236"),
(14,"Verónica","Espuig","Álvarez","mujer","2013-1-10",9,"46900","673897236");