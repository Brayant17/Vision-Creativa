CREATE DATABASE valeriaDB;

use valeriaDB;

CREATE TABLE Empleado (
	empleadoID int primary key auto_increment not null, 
    nombre varchar(45) not null, 
    apellido varchar(45) not null, 
    email varchar(60) not null, 
    numero varchar(10) not null,
    password varchar(60) not null, 
    direccion varchar(100) not null
);

CREATE TABLE Cliente (
	clienteID int primary key auto_increment not null, 
    nombre varchar(45) not null, 
    apellidos varchar(45) not null, 
    email varchar(60) not null
);
/** Servicios que ofrecen y el costo por unidad **/
CREATE TABLE Servicio (
	servicioID int primary key auto_increment not null, 
    nombre varchar(45) not null, 
    descripcion text not null, 
    costoUnidad decimal not null, 
    imagenURL varchar(45)
);

/** La venta tiene la informacion del cliente y servicio **/
CREATE TABLE Venta (
	ventaID int primary key auto_increment not null, 
    clienteID int not null, 
    empleadoID int not null, 
    cantidad int not null, 
    foreign key (clienteID) references Cliente(clienteID), 
    foreign key (empleadoID) references empleado(empleadoID)
);

CREATE TABLE VentaServicio (
	ventaID int not null, 
    servicioID int not null, 
    cantidad decimal not null, 
    foreign key (ventaID) references Venta(ventaID),
	foreign key (servicioID) references Servicio(servicioID)
)