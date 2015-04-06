CREATE TABLE tipo_dni
(
  id serial NOT NULL primary key,
  nombre character varying,
  descripcion character varying
);
INSERT INTO tipo_dni (nombre, descripcion) VALUES ('DNI','Documento Nacional de Identidad');
INSERT INTO tipo_dni (nombre, descripcion) VALUES ('LC','Libreta Cívica');
INSERT INTO tipo_dni (nombre, descripcion) VALUES ('LE','Libreta Enrolamiento');