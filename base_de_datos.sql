CREATE TABLE empleados (
    empleado_id SERIAL NOT NULL,
    empleado_nombre VARCHAR(100) NOT NULL,
    empleado_dpi INTEGER NOT NULL,
    empleado_id_puesto INTEGER NOT NULL,
    empleado_edad INTEGER NOT NULL,
    empleado_sexo VARCHAR (100) NOT NULL,
    empleado_id_area INTEGER NOT NULL,
    empleado_situacion smallint not null default 1,
    PRIMARY KEY(empleadoleado_id),
    FOREIGN KEY (empleado_id_puesto) REFERENCES puestos(puesto_id),
    FOREIGN KEY (empleado_id_area) REFERENCES areas(area_id),
);

CREATE TABLE puestos  ( 
    puesto_id SERIAL NOT NULL,
    puesto_descripcion VARCHAR(100) NOT NULL,
    puesto_sueldo DECIMAL(8,2),
    puesto_situacion smallint not null default 1,
    PRIMARY KEY(puesto_id)
);

CREATE TABLE areas  ( 
    area_id SERIAL NOT NULL,
    area_nombre VARCHAR(200) NOT NULL,
    area_situacion smallint not null default 1,
    PRIMARY KEY(area_id)
);