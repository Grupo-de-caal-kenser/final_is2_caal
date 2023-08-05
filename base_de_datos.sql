CREATE TABLE empleados (
    emp_id SERIAL NOT NULL,
    emp_nombre VARCHAR(100) NOT NULL,
    emp_dpi INTEGER NOT NULL,
    emp_id_puesto INTEGER NOT NULL,
    emp_edad INTEGER NOT NULL,
    emp_sexo VARCHAR (100) NOT NULL,
    emp_id_area INTEGER NOT NULL,
    emp_situacion smallint not null default 1,
    PRIMARY KEY(emp_id),
    FOREIGN KEY (emp_id_puesto) REFERENCES puestos(pue_id),
    FOREIGN KEY (emp_id_area) REFERENCES areas(area_id),
);

CREATE TABLE puestos  ( 
    pue_id SERIAL NOT NULL,
    pue_descripcion VARCHAR(100) NOT NULL,
    pue_sueldo DECIMAL(8,2),
    pue_situacion smallint not null default 1,
    PRIMARY KEY(pue_id)
);

CREATE TABLE areas  ( 
    area_id SERIAL NOT NULL,
    area_nombre VARCHAR(200) NOT NULL,
    area_situacion smallint not null default 1,
    PRIMARY KEY(area_id)
);