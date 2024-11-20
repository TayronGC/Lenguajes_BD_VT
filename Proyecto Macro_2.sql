--PROYECTO MACRO 

--CREACION DE TABLAS 2.0
CREATE TABLE FIDE_ESTADO_TB (
ID_ESTADO NUMBER CONSTRAINT FIDE_ESTADO_TB_ID_ESTADO_PK PRIMARY KEY,
DESCRIPCION VARCHAR2(50),
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100)
);

CREATE TABLE FIDE_CATEGORIA_TB (
ID_CATEGORIA NUMBER CONSTRAINT FIDE_CATEGORIA_TB_ID_CATEGORIA_PK PRIMARY KEY,
NOMBRE_CATEGORIA VARCHAR2(50) CONSTRAINT FIDE_CATEGORIA_TB_NOMBRE_CATEGORIA_NO_NULL NOT NULL,
DESCRIPCION VARCHAR2(50),
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_CATEGORIA_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);


CREATE TABLE FIDE_ROL_TB (
ID_ROL NUMBER CONSTRAINT FIDE_ROL_TB_ID_ROL_PK PRIMARY KEY,
NOMBRE VARCHAR2 (50),
DESCRIPCION VARCHAR2(50),
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_ROL_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_PAIS_TB (
ID_PAIS NUMBER CONSTRAINT FIDE_PAIS_TB_ID_PAIS_PK PRIMARY KEY,
NOMBRE VARCHAR2(50) CONSTRAINT FIDE_PAIS_TB_NOMBRE_NO_NULL NOT NULL,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_PAIS_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_PROVINCIA_TB (
ID_PROVINCIA NUMBER CONSTRAINT FIDE_PROVINCIA_TB_ID_PROVINCIA_PK PRIMARY KEY,
NOMBRE VARCHAR2(50) CONSTRAINT FIDE_PROVINCIA_TB_NOMBRE_NO_NULL NOT NULL,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_PROVINCIA_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_CANTON_TB (
ID_CANTON NUMBER CONSTRAINT FIDE_CANTON_TB_ID_CANTON_PK PRIMARY KEY,
NOMBRE VARCHAR2(50) CONSTRAINT FIDE_CANTON_TB_NOMBRE_NO_NULL NOT NULL,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_CANTON_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_DISTRITO_TB (
ID_DISTRITO NUMBER CONSTRAINT FIDE_DISTRITO_TB_ID_DISTRITO_PK PRIMARY KEY,
NOMBRE VARCHAR2(50) CONSTRAINT FIDE_DISTRITO_TB_NOMBRE_NO_NULL NOT NULL,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_DISTRITO_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_DIRECCION_TB (
ID_DIRECCION NUMBER CONSTRAINT FIDE_DIRECCION_TB_ID_DIRECCION_PK PRIMARY KEY,
DETALLE VARCHAR2(50),
ID_PAIS NUMBER,
ID_PROVINCIA NUMBER,
ID_CANTON NUMBER,
ID_DISTRITO NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_DIRECCION_TB_FK_PAIS FOREIGN KEY (ID_PAIS) REFERENCES FIDE_PAIS_TB (ID_PAIS),
CONSTRAINT FIDE_DIRECCION_TB_FK_PROVINCIA FOREIGN KEY (ID_PROVINCIA) REFERENCES FIDE_PROVINCIA_TB (ID_PROVINCIA),
CONSTRAINT FIDE_DIRECCION_TB_FK_CANTON FOREIGN KEY (ID_CANTON) REFERENCES FIDE_CANTON_TB (ID_CANTON),
CONSTRAINT FIDE_DIRECCION_TB_FK_DISTRITO FOREIGN KEY (ID_DISTRITO) REFERENCES FIDE_DISTRITO_TB (ID_DISTRITO),
CONSTRAINT FIDE_DIRECCION_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);


CREATE TABLE FIDE_PROVEEDOR_TB (
ID_PROVEEDOR NUMBER CONSTRAINT FIDE_PROVEEDOR_TB_ID_PROVEEDOR_PK PRIMARY KEY,
NOMBRE_PROVEEDOR VARCHAR2(50) CONSTRAINT FIDE_PROVEEDOR_TB_NOMBRE_PROVEEDOR_NO_NULL NOT NULL,
APELLIDO1 VARCHAR2(50) CONSTRAINT FIDE_PROVEEDOR_TB_APELLIDO1_NO_NULL NOT NULL,
APELLIDO2 VARCHAR2(50),
TELEFONO VARCHAR2(20),
ID_DIRECCION NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_PROVEEDOR_TB_FK_DIRECCION FOREIGN KEY (ID_DIRECCION) REFERENCES FIDE_DIRECCION_TB (ID_DIRECCION),
CONSTRAINT FIDE_PROVEEDOR_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_PRODUCTO_TB (
ID_PRODUCTO NUMBER CONSTRAINT FIDE_PRODUCTO_TB_ID_PRODUCTO_PK PRIMARY KEY,
NOMBRE_PRODUCTO VARCHAR2(50) CONSTRAINT FIDE_PRODUCTO_TB_NOMBRE_PRODUCTO_NO_NULL NOT NULL,
DESCRIPCION VARCHAR2(50),
PRECIO_UNITARIO NUMBER,
FECHA_VENCIMIENTO DATE,
ID_CATEGORIA NUMBER,
ID_PROVEEDOR NUMBER,
ID_ESTADO NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
CONSTRAINT FIDE_PRODUCTO_TB_FK_CATEGORIA FOREIGN KEY (ID_CATEGORIA) REFERENCES FIDE_CATEGORIA_TB (ID_CATEGORIA),
CONSTRAINT FIDE_PRODUCTO_TB_FK_PROVEEDOR FOREIGN KEY (ID_PROVEEDOR) REFERENCES FIDE_PROVEEDOR_TB (ID_PROVEEDOR),
CONSTRAINT FIDE_PRODUCTO_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_PERSONA_TB (
ID_PERSONA NUMBER CONSTRAINT FIDE_PERSONA_TB_ID_PERSONA_PK PRIMARY KEY,
NOMBRE VARCHAR2(50) CONSTRAINT FIDE_PERSONA_TB_NOMBRE_NO_NULL NOT NULL,
APELLIDO1 VARCHAR2(50) CONSTRAINT FIDE_PERSONA_TB_APELLIDO1_NO_NULL NOT NULL,
APELLIDO2 VARCHAR2(50),
CORREO VARCHAR2(100) CONSTRAINT FIDE_PERSONA_TB_CORREO_NO_NULL NOT NULL,
TELEFONO VARCHAR2(20) CONSTRAINT FIDE_PERSONA_TB_TELEFONO_NO_NULL NOT NULL,
NOMBRE_USUARIO VARCHAR2(50) CONSTRAINT FIDE_PERSONA_TB_NOMBRE_USUARIO_NO_NULL NOT NULL,
CONTRASENA VARCHAR2(50) CONSTRAINT FIDE_PERSONA_TB_CONTRASENA_NO_NULL NOT NULL,
ID_DIRECCION NUMBER,
ID_ROL NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_PERSONA_TB_FK_DIRECCION FOREIGN KEY (ID_DIRECCION) REFERENCES FIDE_DIRECCION_TB (ID_DIRECCION),
CONSTRAINT FIDE_PERSONA_TB_FK_ROL FOREIGN KEY (ID_ROL) REFERENCES FIDE_ROL_TB (ID_ROL),
CONSTRAINT FIDE_PERSONA_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_PEDIDO_TB (
ID_PEDIDO NUMBER CONSTRAINT FIDE_PEDIDO_TB_ID_PEDIDO_PK PRIMARY KEY,
FECHA_PEDIDO DATE CONSTRAINT FIDE_PEDIDO_TB_FECHA_PEDIDO_NO_NULL NOT NULL,
ID_PROVEEDOR NUMBER,
ID_PERSONA NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_PEDIDO_TB_FK_PROVEEDOR FOREIGN KEY (ID_PROVEEDOR) REFERENCES FIDE_PROVEEDOR_TB (ID_PROVEEDOR),
CONSTRAINT FIDE_PEDIDO_TB_FK_PERSONA FOREIGN KEY (ID_PERSONA) REFERENCES FIDE_PERSONA_TB (ID_PERSONA),
CONSTRAINT FIDE_PEDIDO_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_SUCURSAL_TB (
ID_SUCURSAL NUMBER CONSTRAINT FIDE_SUCURSAL_TB_ID_SUCURSAL_PK PRIMARY KEY,
NOMBRE VARCHAR2(50) CONSTRAINT FIDE_SUCURSAL_TB_NOMBRE_NO_NULL NOT NULL,
ID_DIRECCION NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_SUCURSAL_TB_FK_DIRECCION FOREIGN KEY (ID_DIRECCION) REFERENCES FIDE_DIRECCION_TB (ID_DIRECCION),
CONSTRAINT FIDE_SUCURSAL_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);


CREATE TABLE FIDE_INVENTARIO_TB (
ID_INVENTARIO NUMBER CONSTRAINT FIDE_INVENTARIO_TB_ID_INVENTARIO_PK PRIMARY KEY,
CANTIDAD NUMBER,
ID_PRODUCTO NUMBER,
ID_SUCURSAL NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_INVENTARIO_TB_FK_PRODUCTO FOREIGN KEY (ID_PRODUCTO) REFERENCES FIDE_PRODUCTO_TB (ID_PRODUCTO),
CONSTRAINT FIDE_INVENTARIO_TB_FK_SUCURSAL FOREIGN KEY (ID_SUCURSAL) REFERENCES FIDE_SUCURSAL_TB (ID_SUCURSAL),
CONSTRAINT FIDE_INVENTARIO_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);


CREATE TABLE FIDE_PROMOCION_TB (
ID_PROMOCION NUMBER CONSTRAINT FIDE_PROMOCION_TB_ID_PROMOCION_PK PRIMARY KEY,
DESCRIPCION VARCHAR2(50),
FECHA_INICIO DATE,
FECHA_FIN DATE,
DESCUENTO NUMBER,
ID_PRODUCTO NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_PROMOCION_TB_FK_PRODUCTO FOREIGN KEY (ID_PRODUCTO) REFERENCES FIDE_PRODUCTO_TB (ID_PRODUCTO),
CONSTRAINT FIDE_PROMOCION_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_ANALISIS_VENTA_TB (
ID_ANALISIS NUMBER CONSTRAINT FIDE_ANALISIS_VENTA_TB_ID_ANALISIS_PK PRIMARY KEY,
TOTAL_VENTAS NUMBER,
FRECUENCIA NUMBER,
ID_PRODUCTO NUMBER,
ID_PERSONA NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_ANALISIS_VENTA_TB_FK_PRODUCTO FOREIGN KEY (ID_PRODUCTO) REFERENCES FIDE_PRODUCTO_TB (ID_PRODUCTO),
CONSTRAINT FIDE_ANALISIS_VENTA_TB_FK_PERSONA FOREIGN KEY (ID_PERSONA) REFERENCES FIDE_PERSONA_TB (ID_PERSONA),
CONSTRAINT FIDE_ANALISIS_VENTA_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_METODO_PAGO_TB (
ID_METODO_PAGO NUMBER CONSTRAINT FIDE_METODO_PAGO_TB_ID_METODO_PAGO_PK PRIMARY KEY,
NOMBRE VARCHAR2(50),
DESCRIPCION VARCHAR2(50),
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_METODO_PAGO_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_FACTURA_HEADER_TB (
ID_FACTURA_HEADER NUMBER CONSTRAINT FIDE_FACTURA_HEADER_TB_ID_FACTURA_HEADER_PK PRIMARY KEY,
FECHA_FACTURA DATE,
SUBTOTAL NUMBER,
IMPUESTO NUMBER DEFAULT 0.13,
TOTAL NUMBER,
TOTAL_LINEAS NUMBER,
ID_METODO_PAGO NUMBER,
ID_PERSONA NUMBER,
ID_SUCURSAL NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_FACTURA_HEADER_TB_FK_METODO_PAGO FOREIGN KEY (ID_METODO_PAGO) REFERENCES FIDE_METODO_PAGO_TB (ID_METODO_PAGO),
CONSTRAINT FIDE_FACTURA_HEADER_TB_FK_PERSONA FOREIGN KEY (ID_PERSONA) REFERENCES FIDE_PERSONA_TB (ID_PERSONA),
CONSTRAINT FIDE_FACTURA_HEADER_TB_FK_SUCURSAL FOREIGN KEY (ID_SUCURSAL) REFERENCES FIDE_SUCURSAL_TB (ID_SUCURSAL),
CONSTRAINT FIDE_FACTURA_HEADER_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_FACTURA_DETALLE_TB (
ID_FACTURA_DETALLE NUMBER CONSTRAINT FIDE_FACTURA_DETALLE_TB_ID_FACTURA_DETALLE_PK PRIMARY KEY,
PRECIO NUMBER,
CANTIDAD NUMBER,
ID_PRODUCTO NUMBER,
ID_FACTURA_HEADER NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_FACTURA_DETALLE_TB_FK_PRODUCTO FOREIGN KEY (ID_PRODUCTO) REFERENCES FIDE_PRODUCTO_TB (ID_PRODUCTO),
CONSTRAINT FIDE_FACTURA_DETALLE_TB_FK_FACTURA_HEADER FOREIGN KEY (ID_FACTURA_HEADER) REFERENCES FIDE_FACTURA_HEADER_TB (ID_FACTURA_HEADER),
CONSTRAINT FIDE_FACTURA_DETALLE_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);

CREATE TABLE FIDE_DEVOLUCION_TB (
ID_DEVOLUCION NUMBER CONSTRAINT FIDE_DEVOLUCION_TB_ID_DEVOLUCION_PK PRIMARY KEY,
RAZON VARCHAR2(50),
FECHA_DEVOLUCION DATE,
ID_PRODUCTO NUMBER,
ID_FACTURA_HEADER NUMBER,
ID_INVENTARIO NUMBER,
CREADO_POR VARCHAR2(100),
FECHA_CREACION TIMESTAMP,
MODIFICADO_POR VARCHAR2(100),
FECHA_MODIFICACION TIMESTAMP,
ACCION VARCHAR2(100),
ID_ESTADO NUMBER,
CONSTRAINT FIDE_DEVOLUCION_TB_FK_PRODUCTO FOREIGN KEY (ID_PRODUCTO) REFERENCES FIDE_PRODUCTO_TB (ID_PRODUCTO),
CONSTRAINT FIDE_DEVOLUCION_TB_FK_FACTURA_HEADER FOREIGN KEY (ID_FACTURA_HEADER) REFERENCES FIDE_FACTURA_HEADER_TB (ID_FACTURA_HEADER),
CONSTRAINT FIDE_DEVOLUCION_TB_FK_INVENTARIO FOREIGN KEY (ID_INVENTARIO) REFERENCES FIDE_INVENTARIO_TB (ID_INVENTARIO),
CONSTRAINT FIDE_DEVOLUCION_TB_FK_ESTADO FOREIGN KEY (ID_ESTADO) REFERENCES FIDE_ESTADO_TB (ID_ESTADO)
);














