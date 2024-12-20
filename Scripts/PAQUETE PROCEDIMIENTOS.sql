create or replace package BODY FIDE_PROYECTO_FINAL_SP_PKG AS
---#1
PROCEDURE FIDE_ANANLISIS_VENTA_TB_INSERTAR_DATOS_SP(
    P_TOTAL_VENTAS IN NUMBER,
    P_FRECUENCIA IN NUMBER,
    P_ID_PRODUCTO IN NUMBER,
    P_ID_PERSONA IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_ANALISIS_VENTA_TB
    (TOTAL_VENTAS,FRECUENCIA,ID_PRODUCTO,ID_PERSONA)
    VALUES(P_TOTAL_VENTAS,P_FRECUENCIA,P_ID_PRODUCTO,P_ID_PERSONA);
    COMMIT;
END FIDE_ANANLISIS_VENTA_TB_INSERTAR_DATOS_SP;


--#2
PROCEDURE FIDE_CANTON_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2
)AS
BEGIN
    INSERT INTO FIDE_CANTON_TB(NOMBRE)
    VALUES(P_NOMBRE);
    COMMIT;
END FIDE_CANTON_TB_INSERTAR_DATOS_SP;


---#3
PROCEDURE FIDE_CATEGORIA_TB_INSERTAR_DATOS_SP(
    P_NOMBRE_CATEGORIA IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2
)AS
BEGIN
    INSERT INTO FIDE_CATEGORIA_TB(NOMBRE_CATEGORIA,DESCRIPCION)
    VALUES(P_NOMBRE_CATEGORIA,P_DESCRIPCION);
    COMMIT;
END FIDE_CATEGORIA_TB_INSERTAR_DATOS_SP;


---#4
PROCEDURE FIDE_DEVOLUCION_TB_INSERTAR_DATOS_SP(
    P_RAZON IN VARCHAR2,
    P_FECHA_DEVOLUCION IN DATE,
    P_ID_PRODUCTO IN NUMBER,
    P_ID_FACTURA_HEADER IN NUMBER,
    P_ID_INVENTARIO IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_DEVOLUCION_TB(RAZON,FECHA_DEVOLUCION,ID_PRODUCTO,ID_FACTURA_HEADER,ID_INVENTARIO)
    VALUES(P_RAZON,P_FECHA_DEVOLUCION,P_ID_PRODUCTO,P_ID_FACTURA_HEADER,P_ID_INVENTARIO);
    COMMIT;
END FIDE_DEVOLUCION_TB_INSERTAR_DATOS_SP;


--#5
PROCEDURE FIDE_DIRECCION_TB_INSERTAR_DATOS_SP(
    P_DETALLE IN VARCHAR2,
    P_ID_PAIS IN NUMBER,
    P_ID_PROVINCIA IN NUMBER,
    P_ID_CANTON IN NUMBER,
    P_ID_DISTRITO IN NUMBER,
    P_ID_DIRECCION OUT NUMBER
)AS
BEGIN
    INSERT INTO FIDE_DIRECCION_TB(DETALLE,ID_PAIS,ID_PROVINCIA,ID_CANTON,ID_DISTRITO)
    VALUES(P_DETALLE,P_ID_PAIS,P_ID_PROVINCIA,P_ID_CANTON,P_ID_DISTRITO)
    RETURNING ID_DIRECCION INTO P_ID_DIRECCION;
    COMMIT;
END FIDE_DIRECCION_TB_INSERTAR_DATOS_SP;


--#6
PROCEDURE FIDE_DISTRITO_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2
)AS
BEGIN
    INSERT INTO FIDE_DISTRITO_TB(NOMBRE)
    VALUES(P_NOMBRE);
    COMMIT;
END FIDE_DISTRITO_TB_INSERTAR_DATOS_SP;

--#7
PROCEDURE FIDE_ESTADO_TB_INSERTAR_DATOS_SP(
    P_ID_ESTADO IN NUMBER,
    P_DESCRIPCION IN VARCHAR2
)AS
BEGIN
    INSERT INTO FIDE_ESTADO_TB(ID_ESTADO,DESCRIPCION)
    VALUES(P_ID_ESTADO,P_DESCRIPCION);
    COMMIT;
END FIDE_ESTADO_TB_INSERTAR_DATOS_SP;



--#8
PROCEDURE FIDE_FACTURA_DETALLE_TB_INSERTAR_DATOS_SP(
    P_CANTIDAD IN NUMBER,
    P_ID_PRODUCTO IN NUMBER,
    P_ID_FACTURA_HEADER IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_FACTURA_DETALLE_TB(CANTIDAD,ID_PRODUCTO,ID_FACTURA_HEADER)
    VALUES(P_CANTIDAD,P_ID_PRODUCTO,P_ID_FACTURA_HEADER);
    COMMIT;
END FIDE_FACTURA_DETALLE_TB_INSERTAR_DATOS_SP;

---#9
PROCEDURE FIDE_FACTURA_HEADER_TB_INSERTAR_DATOS_SP(
    P_SUBTOTAL IN NUMBER,
    P_IMPUESTO IN NUMBER,
    P_TOTAL IN NUMBER,
    P_TOTAL_LINEAS IN NUMBER,
    P_ID_METODO_PAGO IN NUMBER,
    P_ID_PERSONA IN NUMBER,
    P_ID_SUCURSAL IN NUMBER,
    P_ID_FACTURA OUT NUMBER
)AS
BEGIN
    INSERT INTO FIDE_FACTURA_HEADER_TB
    (SUBTOTAL,IMPUESTO,TOTAL,TOTAL_LINEAS,ID_METODO_PAGO,ID_PERSONA,ID_SUCURSAL)
    VALUES(P_SUBTOTAL,P_IMPUESTO,P_TOTAL,P_TOTAL_LINEAS,P_ID_METODO_PAGO,P_ID_PERSONA,P_ID_SUCURSAL)
    RETURNING ID_FACTURA_HEADER INTO P_ID_FACTURA;
    COMMIT;
END FIDE_FACTURA_HEADER_TB_INSERTAR_DATOS_SP;


--#10
PROCEDURE FIDE_INVENTARIO_TB_INSERTAR_DATOS_SP(
    P_CANTIDAD IN NUMBER,
    P_ID_PRODUCTO IN NUMBER,
    P_ID_SUCURSAL IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_INVENTARIO_TB(CANTIDAD,ID_PRODUCTO,ID_SUCURSAL)
    VALUES(P_CANTIDAD,P_ID_PRODUCTO,P_ID_SUCURSAL);
    COMMIT;
END FIDE_INVENTARIO_TB_INSERTAR_DATOS_SP;

--#11
PROCEDURE FIDE_METODO_PAGO_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2
)AS
BEGIN
    INSERT INTO FIDE_METODO_PAGO_TB(NOMBRE,DESCRIPCION)
    VALUES(P_NOMBRE,P_DESCRIPCION);
    COMMIT;
END FIDE_METODO_PAGO_TB_INSERTAR_DATOS_SP;


--#12
PROCEDURE FIDE_PAIS_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2
)AS
BEGIN
    INSERT INTO FIDE_PAIS_TB(NOMBRE)
    VALUES(P_NOMBRE);
    COMMIT;
END FIDE_PAIS_TB_INSERTAR_DATOS_SP;

--#13
PROCEDURE FIDE_PEDIDO_TB_INSERTAR_DATOS_SP(
    P_FECHA_PEDIDO IN DATE,
    P_ID_PROVEEDOR IN NUMBER,
    P_ID_PERSONA IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_PEDIDO_TB(FECHA_PEDIDO,ID_PROVEEDOR,ID_PERSONA)
    VALUES(P_FECHA_PEDIDO,P_ID_PROVEEDOR,P_ID_PERSONA);
    COMMIT;
END FIDE_PEDIDO_TB_INSERTAR_DATOS_SP;

--#14
PROCEDURE FIDE_PERSONA_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2,
    P_APELLIDO1 IN VARCHAR2,
    P_APELLIDO2 IN VARCHAR2,
    P_CORREO IN VARCHAR2,
    P_TELEFONO IN VARCHAR2,
    P_NOMBRE_USUARIO IN VARCHAR2,
    P_CONTRASENA IN VARCHAR2,
    P_ID_DIRECCION IN NUMBER,
    P_ID_ROL IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_PERSONA_TB
    (NOMBRE,APELLIDO1,APELLIDO2,CORREO,TELEFONO,NOMBRE_USUARIO,CONTRASENA,ID_DIRECCION,ID_ROL)
    VALUES(P_NOMBRE,P_APELLIDO1,P_APELLIDO2,P_CORREO,P_TELEFONO,P_NOMBRE_USUARIO,P_CONTRASENA,P_ID_DIRECCION,P_ID_ROL);
    COMMIT;
END FIDE_PERSONA_TB_INSERTAR_DATOS_SP;


--#15
PROCEDURE FIDE_PRODUCTO_TB_INSERTAR_DATOS_SP(
    P_NOMBRE_PRODUCTO IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2,
    P_PRECIO_UNITARIO IN NUMBER,
    P_FECHA_VENCIMIENTO IN DATE,
    P_ID_CATEGORIA IN NUMBER,
    P_ID_PROVEEDOR IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_PRODUCTO_TB
    (NOMBRE_PRODUCTO,DESCRIPCION,PRECIO_UNITARIO,FECHA_VENCIMIENTO,ID_CATEGORIA,ID_PROVEEDOR)
    VALUES(P_NOMBRE_PRODUCTO,P_DESCRIPCION,P_PRECIO_UNITARIO,P_FECHA_VENCIMIENTO,P_ID_CATEGORIA,P_ID_PROVEEDOR);
    COMMIT;
END FIDE_PRODUCTO_TB_INSERTAR_DATOS_SP;


--#16
PROCEDURE FIDE_PROMOCION_TB_INSERTAR_DATOS_SP(
    P_DESCRIPCION IN VARCHAR2,
    P_FECHA_INICIO IN DATE,
    P_FECHA_FIN IN DATE,
    P_DESCUENTO IN NUMBER,
    P_ID_PRODUCTO IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_PROMOCION_TB
    (DESCRIPCION,FECHA_INICIO,FECHA_FIN,DESCUENTO,ID_PRODUCTO)
    VALUES(P_DESCRIPCION,P_FECHA_INICIO,P_FECHA_FIN,P_DESCUENTO,P_ID_PRODUCTO);
    COMMIT;
END FIDE_PROMOCION_TB_INSERTAR_DATOS_SP;

--#17
PROCEDURE FIDE_PROVEEDOR_TB_INSERTAR_DATOS_SP(
    P_NOMBRE_PROVEEDOR IN VARCHAR2,
    P_APELLIDO1 IN VARCHAR2,
    P_APELLIDO2 IN VARCHAR2,
    P_TELEFONO IN VARCHAR2,
    P_ID_DIRECCION IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_PROVEEDOR_TB
    (NOMBRE_PROVEEDOR,APELLIDO1,APELLIDO2,TELEFONO,ID_DIRECCION)
    VALUES(P_NOMBRE_PROVEEDOR,P_APELLIDO1,P_APELLIDO2,P_TELEFONO,P_ID_DIRECCION);
    COMMIT;
END FIDE_PROVEEDOR_TB_INSERTAR_DATOS_SP;


--#18

PROCEDURE FIDE_PROVINCIA_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2
)AS
BEGIN
    INSERT INTO FIDE_PROVINCIA_TB(NOMBRE)VALUES(P_NOMBRE);
    COMMIT;
END FIDE_PROVINCIA_TB_INSERTAR_DATOS_SP;


--#19
PROCEDURE FIDE_ROL_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2
)AS
BEGIN
    INSERT INTO FIDE_ROL_TB(NOMBRE,DESCRIPCION)VALUES(P_NOMBRE,P_DESCRIPCION);
    COMMIT;
END FIDE_ROL_TB_INSERTAR_DATOS_SP;


--#20
PROCEDURE FIDE_SUCURSAL_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2,
    P_ID_DIRECCION IN NUMBER
)AS
BEGIN
    INSERT INTO FIDE_SUCURSAL_TB(NOMBRE,ID_DIRECCION)VALUES(P_NOMBRE,P_ID_DIRECCION);
    COMMIT;
END FIDE_SUCURSAL_TB_INSERTAR_DATOS_SP;


--#20
--PROCEDIMIENTOS PARA VER 1 REGISTRO
PROCEDURE FIDE_CATEGORIA_TB_VER_DATOS_SP(
    P_ID_CATEGORIA IN NUMBER,
    P_NOMBRE_CATEGORIA OUT VARCHAR2,
    P_DESCRIPCION OUT VARCHAR2
)AS
BEGIN
    SELECT NOMBRE_CATEGORIA,DESCRIPCION 
    INTO P_NOMBRE_CATEGORIA,P_DESCRIPCION
    FROM FIDE_CATEGORIA_TB 
    WHERE ID_CATEGORIA=P_ID_CATEGORIA;
END FIDE_CATEGORIA_TB_VER_DATOS_SP;


---#21

--MODIFICAR SOLAMENTE LOS DATOS DE CATEGORIA
PROCEDURE FIDE_CATEGORIA_TB_MODIFICAR_DATOS_SP(
    P_ID_CATEGORIRA IN NUMBER,
    P_NOMBRE_CATEGORIA IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2
)AS
BEGIN
    UPDATE FIDE_CATEGORIA_TB
    SET NOMBRE_CATEGORIA=P_NOMBRE_CATEGORIA,
    DESCRIPCION = P_DESCRIPCION
    WHERE ID_CATEGORIA = P_ID_CATEGORIRA;
    COMMIT;
END FIDE_CATEGORIA_TB_MODIFICAR_DATOS_SP;


---#22
---PROCEDIMIENTO PARA DESACTIVAR UN REGISTRO
PROCEDURE FIDE_CATEGORIA_TB_DESACTIVAR_DATOS_SP(
    P_ID_CATEGORIRA IN NUMBER
)AS
BEGIN
    UPDATE FIDE_CATEGORIA_TB
    --2 PORQUE 1 ES ACTIVO Y 2 INACTIVO
    SET ID_ESTADO = 2 
    WHERE ID_CATEGORIA = P_ID_CATEGORIRA;
    COMMIT;
END FIDE_CATEGORIA_TB_DESACTIVAR_DATOS_SP;



--#23
--PROCEDIMIENTO PARA MODIFICAR DATOS Y TAMBIEN PODER DESACTIVAR UN REGISTRO
PROCEDURE FIDE_CATEGORIA_TB_MODIFICAR_DATOS2_SP(
    P_ID_CATEGORIRA IN NUMBER,
    P_NOMBRE_CATEGORIA IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2,
    P_ID_ESTADO IN VARCHAR2
)AS
BEGIN
    UPDATE FIDE_CATEGORIA_TB
    SET NOMBRE_CATEGORIA=P_NOMBRE_CATEGORIA,
    DESCRIPCION = P_DESCRIPCION,
    ID_ESTADO = P_ID_ESTADO
    WHERE ID_CATEGORIA = P_ID_CATEGORIRA;
    COMMIT;
END FIDE_CATEGORIA_TB_MODIFICAR_DATOS2_SP;





--#24
----PROCEDIMIENTO PARA EL INICIO DE SESSION
PROCEDURE FIDE_PERSONA_TB_OBTENER_USUARIO_SP(
    P_NOMBRE_USUARIO IN VARCHAR2,
    P_ID_PERSONA OUT NUMBER,
    P_CONTRASENA OUT VARCHAR2,
    P_ID_ROL OUT NUMBER
)AS
BEGIN
    SELECT ID_PERSONA, CONTRASENA, ID_ROL 
    INTO P_ID_PERSONA, P_CONTRASENA,P_ID_ROL
    FROM FIDE_PERSONA_TB 
    WHERE NOMBRE_USUARIO = P_NOMBRE_USUARIO
    AND ID_ESTADO = 1;
    EXCEPTION
    WHEN NO_DATA_FOUND THEN
        P_ID_PERSONA:= NULL;
        P_CONTRASENA:= NULL;
        P_ID_ROL:= NULL;
END FIDE_PERSONA_TB_OBTENER_USUARIO_SP;

---------------------------------------
PROCEDURE FIDE_CATEGORIA_VER_CATEGORIAS_SP (
    P_CURSOR OUT SYS_REFCURSOR
) AS
BEGIN
    OPEN P_CURSOR FOR
    SELECT ID_CATEGORIA,NOMBRE_CATEGORIA,DESCRIPCION, ID_ESTADO
    FROM FIDE_CATEGORIA_TB WHERE ID_ESTADO = 1
    ORDER BY fecha_creacion;
END FIDE_CATEGORIA_VER_CATEGORIAS_SP;


PROCEDURE FIDE_INFO_FACTURA_VER_DATOS_SP 
(p_cursor OUT SYS_REFCURSOR) IS
BEGIN
    OPEN p_cursor FOR
        SELECT ID_FACTURA_HEADER,FECHA_CREACION,SUBTOTAL,IMPUESTO,
            TOTAL,TOTAL_LINEAS,NOMBRE_METODO_PAGO,NOMBRE_USUARIO,NOMBRE_SUCURSAL,
            PRECIO,CANTIDAD,NOMBRE_PRODUCTO,ID_ESTADO
        FROM FIDE_INFO_FACTURA_V;
END FIDE_INFO_FACTURA_VER_DATOS_SP;

PROCEDURE FIDE_PRODUCTO_VER_TODOS_SP (
    P_CURSOR OUT SYS_REFCURSOR
) AS
BEGIN
    OPEN P_CURSOR FOR
    SELECT P.ID_PRODUCTO,P.NOMBRE_PRODUCTO,P.DESCRIPCION,P.PRECIO_UNITARIO,P.FECHA_VENCIMIENTO,
    P.ID_CATEGORIA,C.NOMBRE_CATEGORIA,P.ID_PROVEEDOR,PRO.NOMBRE_PROVEEDOR,P.ID_ESTADO
    FROM FIDE_PRODUCTO_TB P
    INNER JOIN FIDE_CATEGORIA_TB C
    ON P.ID_CATEGORIA = C.ID_CATEGORIA
    INNER JOIN FIDE_PROVEEDOR_TB PRO
    ON P.ID_PROVEEDOR = PRO.ID_PROVEEDOR
    WHERE P.ID_ESTADO = 1
    ORDER BY P.fecha_creacion;
END FIDE_PRODUCTO_VER_TODOS_SP;



PROCEDURE FIDE_PROMOCION_TB_VER_PROMOCIONES_ACTIVAS_SP (
    P_CURSOR OUT SYS_REFCURSOR
)
AS
BEGIN
    OPEN P_CURSOR FOR
    SELECT 
        ID_PROMOCION, 
        DESCRIPCION, 
        FECHA_INICIO, 
        FECHA_FIN, 
        DESCUENTO, 
        ID_PRODUCTO, 
        NOMBRE_PRODUCTO, 
        PRECIO_UNITARIO,
        PRECIO_FINAL
    FROM FIDE_PROMOCIONES_ACTIVAS_V;
END FIDE_PROMOCION_TB_VER_PROMOCIONES_ACTIVAS_SP;


PROCEDURE FIDE_PROVEEDOR_TB_VER_PROVEEDORES_SP (
    P_CURSOR OUT SYS_REFCURSOR
) AS
BEGIN
    OPEN P_CURSOR FOR
    SELECT ID_PROVEEDOR,NOMBRE_PROVEEDOR, APELLIDO1,APELLIDO2, TELEFONO, ID_DIRECCION
    FROM FIDE_PROVEEDOR_TB WHERE ID_ESTADO = 1
    ORDER BY FECHA_CREACION;
END FIDE_PROVEEDOR_TB_VER_PROVEEDORES_SP;


PROCEDURE FIDE_CANTON_VER_DATOS_SP (p_cursor OUT SYS_REFCURSOR) IS
BEGIN
    OPEN p_cursor FOR
        SELECT ID_CANTON, NOMBRE
        FROM FIDE_CANTON_TB;
END FIDE_CANTON_VER_DATOS_SP;


PROCEDURE FIDE_PROVINCIA_VER_DATOS_SP (p_cursor OUT SYS_REFCURSOR) IS
BEGIN
    OPEN p_cursor FOR
        SELECT ID_PROVINCIA, NOMBRE
        FROM FIDE_PROVINCIA_TB;
END FIDE_PROVINCIA_VER_DATOS_SP;

PROCEDURE FIDE_PAIS_VER_DATOS_SP (p_cursor OUT SYS_REFCURSOR) IS
BEGIN
    OPEN p_cursor FOR
        SELECT ID_PAIS, NOMBRE
        FROM FIDE_PAIS_TB;
END FIDE_PAIS_VER_DATOS_SP;


PROCEDURE FIDE_DISTRITO_VER_DATOS_SP (p_cursor OUT SYS_REFCURSOR) IS
BEGIN
    OPEN p_cursor FOR
        SELECT ID_DISTRITO, NOMBRE
        FROM FIDE_DISTRITO_TB;
END FIDE_DISTRITO_VER_DATOS_SP;

PROCEDURE FIDE_PRODUCTO_TB_VER_PRODUCTO_SP(
    P_ID_PRODUCTO IN NUMBER,
    P_NOMBRE_PRODUCTO OUT VARCHAR2,
    P_PRECIO_UNITARIO OUT NUMBER
)AS
BEGIN
    SELECT NOMBRE_PRODUCTO,PRECIO_UNITARIO
    INTO P_NOMBRE_PRODUCTO,P_PRECIO_UNITARIO
    FROM FIDE_PRODUCTO_TB 
    WHERE ID_PRODUCTO=P_ID_PRODUCTO AND
    ID_ESTADO = 1;
END FIDE_PRODUCTO_TB_VER_PRODUCTO_SP;


END FIDE_PROYECTO_FINAL_SP_PKG;




-----LLAMADO
------------------------------------------------------------------------------------------------------------------------------
create or replace package FIDE_PROYECTO_FINAL_SP_PKG AS 
PROCEDURE FIDE_ANANLISIS_VENTA_TB_INSERTAR_DATOS_SP(
    P_TOTAL_VENTAS IN NUMBER,
    P_FRECUENCIA IN NUMBER,
    P_ID_PRODUCTO IN NUMBER,
    P_ID_PERSONA IN NUMBER
);


--#2
PROCEDURE FIDE_CANTON_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2
);


---#3
PROCEDURE FIDE_CATEGORIA_TB_INSERTAR_DATOS_SP(
    P_NOMBRE_CATEGORIA IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2
);

---#4
PROCEDURE FIDE_DEVOLUCION_TB_INSERTAR_DATOS_SP(
    P_RAZON IN VARCHAR2,
    P_FECHA_DEVOLUCION IN DATE,
    P_ID_PRODUCTO IN NUMBER,
    P_ID_FACTURA_HEADER IN NUMBER,
    P_ID_INVENTARIO IN NUMBER
);


--#5
PROCEDURE FIDE_DIRECCION_TB_INSERTAR_DATOS_SP(
    P_DETALLE IN VARCHAR2,
    P_ID_PAIS IN NUMBER,
    P_ID_PROVINCIA IN NUMBER,
    P_ID_CANTON IN NUMBER,
    P_ID_DISTRITO IN NUMBER,
    P_ID_DIRECCION OUT NUMBER
);

--#6
PROCEDURE FIDE_DISTRITO_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2
);

--#7
PROCEDURE FIDE_ESTADO_TB_INSERTAR_DATOS_SP(
    P_ID_ESTADO IN NUMBER,
    P_DESCRIPCION IN VARCHAR2
);

--#8
PROCEDURE FIDE_FACTURA_DETALLE_TB_INSERTAR_DATOS_SP(
    P_CANTIDAD IN NUMBER,
    P_ID_PRODUCTO IN NUMBER,
    P_ID_FACTURA_HEADER IN NUMBER
);


---#9
PROCEDURE FIDE_FACTURA_HEADER_TB_INSERTAR_DATOS_SP(
    P_SUBTOTAL IN NUMBER,
    P_IMPUESTO IN NUMBER,
    P_TOTAL IN NUMBER,
    P_TOTAL_LINEAS IN NUMBER,
    P_ID_METODO_PAGO IN NUMBER,
    P_ID_PERSONA IN NUMBER,
    P_ID_SUCURSAL IN NUMBER,
    P_ID_FACTURA OUT NUMBER
);

--#10
PROCEDURE FIDE_INVENTARIO_TB_INSERTAR_DATOS_SP(
    P_CANTIDAD IN NUMBER,
    P_ID_PRODUCTO IN NUMBER,
    P_ID_SUCURSAL IN NUMBER
);

--#11
PROCEDURE FIDE_METODO_PAGO_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2
);


--#12
PROCEDURE FIDE_PAIS_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2
);


--#13
PROCEDURE FIDE_PEDIDO_TB_INSERTAR_DATOS_SP(
    P_FECHA_PEDIDO IN DATE,
    P_ID_PROVEEDOR IN NUMBER,
    P_ID_PERSONA IN NUMBER
);

--#14
PROCEDURE FIDE_PERSONA_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2,
    P_APELLIDO1 IN VARCHAR2,
    P_APELLIDO2 IN VARCHAR2,
    P_CORREO IN VARCHAR2,
    P_TELEFONO IN VARCHAR2,
    P_NOMBRE_USUARIO IN VARCHAR2,
    P_CONTRASENA IN VARCHAR2,
    P_ID_DIRECCION IN NUMBER,
    P_ID_ROL IN NUMBER
);


--#15
PROCEDURE FIDE_PRODUCTO_TB_INSERTAR_DATOS_SP(
    P_NOMBRE_PRODUCTO IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2,
    P_PRECIO_UNITARIO IN NUMBER,
    P_FECHA_VENCIMIENTO IN DATE,
    P_ID_CATEGORIA IN NUMBER,
    P_ID_PROVEEDOR IN NUMBER
);

--#16
PROCEDURE FIDE_PROMOCION_TB_INSERTAR_DATOS_SP(
    P_DESCRIPCION IN VARCHAR2,
    P_FECHA_INICIO IN DATE,
    P_FECHA_FIN IN DATE,
    P_DESCUENTO IN NUMBER,
    P_ID_PRODUCTO IN NUMBER
);


--#17
PROCEDURE FIDE_PROVEEDOR_TB_INSERTAR_DATOS_SP(
    P_NOMBRE_PROVEEDOR IN VARCHAR2,
    P_APELLIDO1 IN VARCHAR2,
    P_APELLIDO2 IN VARCHAR2,
    P_TELEFONO IN VARCHAR2,
    P_ID_DIRECCION IN NUMBER
);


--#18

PROCEDURE FIDE_PROVINCIA_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2
);


--#19
PROCEDURE FIDE_ROL_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2
);


--#20
PROCEDURE FIDE_SUCURSAL_TB_INSERTAR_DATOS_SP(
    P_NOMBRE IN VARCHAR2,
    P_ID_DIRECCION IN NUMBER
);

--#20
PROCEDURE FIDE_CATEGORIA_TB_VER_DATOS_SP(
    P_ID_CATEGORIA IN NUMBER,
    P_NOMBRE_CATEGORIA OUT VARCHAR2,
    P_DESCRIPCION OUT VARCHAR2
);

---#21
PROCEDURE FIDE_CATEGORIA_TB_MODIFICAR_DATOS_SP(
    P_ID_CATEGORIRA IN NUMBER,
    P_NOMBRE_CATEGORIA IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2
);

---#22
PROCEDURE FIDE_CATEGORIA_TB_DESACTIVAR_DATOS_SP(
    P_ID_CATEGORIRA IN NUMBER
);

--#23
PROCEDURE FIDE_CATEGORIA_TB_MODIFICAR_DATOS2_SP(
    P_ID_CATEGORIRA IN NUMBER,
    P_NOMBRE_CATEGORIA IN VARCHAR2,
    P_DESCRIPCION IN VARCHAR2,
    P_ID_ESTADO IN VARCHAR2
);

--#24

PROCEDURE FIDE_PERSONA_TB_OBTENER_USUARIO_SP(
    P_NOMBRE_USUARIO IN VARCHAR2,
    P_ID_PERSONA OUT NUMBER,
    P_CONTRASENA OUT VARCHAR2,
    P_ID_ROL OUT NUMBER
);

PROCEDURE FIDE_CATEGORIA_VER_CATEGORIAS_SP (
    P_CURSOR OUT SYS_REFCURSOR
);

PROCEDURE FIDE_INFO_FACTURA_VER_DATOS_SP 
(p_cursor OUT SYS_REFCURSOR);

PROCEDURE FIDE_PRODUCTO_VER_TODOS_SP (
    P_CURSOR OUT SYS_REFCURSOR
);

PROCEDURE FIDE_PROMOCION_TB_VER_PROMOCIONES_ACTIVAS_SP(
    P_CURSOR OUT SYS_REFCURSOR
);

PROCEDURE FIDE_PROVEEDOR_TB_VER_PROVEEDORES_SP (
    P_CURSOR OUT SYS_REFCURSOR
);


PROCEDURE FIDE_CANTON_VER_DATOS_SP (p_cursor OUT SYS_REFCURSOR);

PROCEDURE FIDE_PROVINCIA_VER_DATOS_SP (p_cursor OUT SYS_REFCURSOR);

PROCEDURE FIDE_PAIS_VER_DATOS_SP (p_cursor OUT SYS_REFCURSOR);

PROCEDURE FIDE_DISTRITO_VER_DATOS_SP (p_cursor OUT SYS_REFCURSOR);

PROCEDURE FIDE_PRODUCTO_TB_VER_PRODUCTO_SP(
    P_ID_PRODUCTO IN NUMBER,
    P_NOMBRE_PRODUCTO OUT VARCHAR2,
    P_PRECIO_UNITARIO OUT NUMBER
);


END FIDE_PROYECTO_FINAL_SP_PKG;
