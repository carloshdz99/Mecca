/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     1/3/2020 21:32:35                            */
/*==============================================================*/


drop table if exists CITA;

drop table if exists DOCTOR;

drop table if exists DOCTOR_ESPECIALIDAD;

drop table if exists DOCTOR_HORARIO;

drop table if exists ESPECIALIDAD;

drop table if exists EXPEDIENTE;

drop table if exists HORARIO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: CITA                                                  */
/*==============================================================*/
create table CITA
(
   ID_CITA              char(4) not null,
   ID_HORARIO           char(4),
   HORARIO              char(100) not null,
   DOCTOR               char(150) not null,
   PACIENTE             char(150) not null,
   COMENTARIO           char(255) not null,
   ID_EXPEDIENTE        char(30) not null,
   primary key (ID_CITA)
);

/*==============================================================*/
/* Table: DOCTOR                                                */
/*==============================================================*/
create table DOCTOR
(
   NOMBRE_DOCTOR        varchar(50) not null,
   APELLIDO_DOCTOR      varchar(50) not null,
   ESTADO               boolean not null,
   ESPECIALIDAD         varchar(50) not null,
   ID_DOCTOR            Char(4) not null,
   primary key (ID_DOCTOR)
);

/*==============================================================*/
/* Table: DOCTOR_ESPECIALIDAD                                   */
/*==============================================================*/
create table DOCTOR_ESPECIALIDAD
(
   ID_ESPECIALIDAD      char(4) not null,
   ID_DOCTOR            char(10),
   primary key (ID_ESPECIALIDAD)
);

/*==============================================================*/
/* Table: DOCTOR_HORARIO                                        */
/*==============================================================*/
create table DOCTOR_HORARIO
(
   ID_HORARIO           char(4) not null,
   ID_DOCTOR            char(4),
   primary key (ID_HORARIO)
);

/*==============================================================*/
/* Table: ESPECIALIDAD                                          */
/*==============================================================*/
create table ESPECIALIDAD
(
   ID_ESPECIALIDAD      char(15) not null,
   NOMBRE_ESPECIALIDAD  varchar(200) not null,
   primary key (ID_ESPECIALIDAD)
);

/*==============================================================*/
/* Table: EXPEDIENTE                                            */
/*==============================================================*/
create table EXPEDIENTE
(
   IDEXPEDIENTE         char(4) not null,
   NOMBRE_PACIENTE      varchar(50) not null,
   APELLIDO_PACIENTE    varchar(50) not null,
   EDAD                 smallint not null,
   TELEFONO             int(8) not null,
   primary key (IDEXPEDIENTE)
);

/*==============================================================*/
/* Table: HORARIO                                               */
/*==============================================================*/
create table HORARIO
(
   ID_HORARIO           char(4) not null,
   FECHA                DATE not null,
   HORA                 char(5) not null,
   primary key (ID_HORARIO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID_USUARIO           char(4) not null,
   NOMBRE_USUARIO       varchar(50) not null,
   APELLIDO_USUARIO     varchar(50) not null,
   CONTRASENA           varchar(20) not null,
   TIPOUSUARIO          varchar(150) not null,
   CORREO               varchar(50) not null  
   primary key (ID_USUARIO)
);

alter table CITA add constraint FK_HORARIO_CITA foreign key (ID_HORARIO)
      references HORARIO (ID_HORARIO) on delete restrict on update restrict;

alter table DOCTOR_ESPECIALIDAD add constraint FK_DOCTOR_ESPECIALIDAD foreign key (ID_ESPECIALIDAD)
      references ESPECIALIDAD (ID_ESPECIALIDAD) on delete restrict on update restrict;

alter table DOCTOR_ESPECIALIDAD add constraint FK_DOCTOR_ESPECIALIDAD2 foreign key (ID_DOCTOR)
      references DOCTOR (ID_DOCTOR) on delete restrict on update restrict;

alter table DOCTOR_HORARIO add constraint FK_DOCTOR_HORARIO foreign key (ID_HORARIO)
      references HORARIO (ID_HORARIO) on delete restrict on update restrict;

alter table DOCTOR_HORARIO add constraint FK_DOCTOR_HORARIO2 foreign key (ID_DOCTOR)
      references DOCTOR (ID_DOCTOR) on delete restrict on update restrict;

alter table EXPEDIENTE add constraint FK_CITA_EXPEDIENTE foreign key (ID_CITA)
      references CITA (ID_CITA) on delete restrict on update restrict;

