--Poner en TRUE a las actividades que asistió
--guardar el ID del inscripto

CREATE TABLE asistencia(
  id serial NOT NULL primary key,
  id_inscripto integer NOT NULL references inscripto(id),
  actividad1 boolean default false,
  actividad2 boolean default false,
  actividad3 boolean default false,
  actividad4 boolean default false,
  actividad5 boolean default false,
  actividad6 boolean default false,
  actividad7 boolean default false,
  actividad8 boolean default false,
  actividad9 boolean default false,
  actividad10 boolean default false
);