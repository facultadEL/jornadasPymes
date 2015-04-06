CREATE TABLE inscripto
(
  id serial NOT NULL primary key,
  nombre character varying,
  apellido character varying,
  tipo_dni integer references tipo_dni(id),
  nrodni character varying,
  direccion character varying,
  numero character varying,
  piso character varying,
  dpto character varying,
  localidad character varying,
  mail character varying,
  telfijo character varying,
  telcel character varying,  
  razon_social character varying,
  titaca character varying, 
  fechainscripto date,  
  martes boolean default false,
  jueves boolean default false,
  info character varying
);