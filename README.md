# DAW_TPV
Practica TPV BAR Frijoliito
Requisitos previos:
-Por parte del servidor:
	-Servidor Apache instalada en nuestra maquina.
	-Tener instalado el modulo de PHP en nuestro equipo
	-Tener instalado mysql en nuestro equipo 
	-En lugar de todo lo anterior tener un servidor LAMP o WAMP
-Por parte del cliente:
	-Tener un navegador compatible con la web
	-Recomendados: chrome, Firefox.
Instalación:
Cuando se tiene instalado los componentes mencionados anteriormente en el directorio que se comparten las paginas webs en apache. (hay que controlar que en el documento de configuración de apache este la opción de tomar como directorio de inicio el index.php).
En el administrador de mysql hay que restaurar el backup que se incluye junto con este documento.
Funcionamiento de aplicación.
 
Ilustración 1: pagina principal de la aplicación. Sin nadie logueado.

A Continuación se explica cada una de las partes de la página principal.
En la cabecera hay tres elementos, estos son el nombre, el resumen del día y la parte del login.

 
Ilustración 2 Login de un camarero normal
Con este login el camarero normal se autentica mediante un nombre y su contraseña que coincide que la contraseña por defecto es la misma que el nombre, excepto en la en el jefe cuya contraseña será root y cuya validación hará que se habilite la parte de resumen del día el cual lleva a una web con el resumen del día. Cuando el camarero pulse el botón de salir se borrará toda la información que contenga la sesión actual.
 
Ilustración 3 Login del jefe con el botón de resumen del día habilitado.

Al acceder al resumen del día se muestra lo siguiente.
 
Ilustración 4 Panel de resumen del dia.
En este panel se muestra en la parte superior el titulo y la fecha en la que se muestra el resumen. En el panel alineado a la izquierda se muestra el resumen de lo productos vendidos ese día, mostrando el nombre del producto, la cantidad total vendida ese día y el precio al que se ha vendido. En el panel derecho se muestra el resumen del dinero recaudado por cada camarero ese día. En el panel inferior se muestra el total recaudado ese día. Al final se ofrece la opción de volver al tpv.

A la izquierda se muestra una barra de categorías habilitadas y a la derecha deshabilitadas.
Barra de categorías, en esta barra se mostraran las categorías de las que se dispones en el tpv. Esta barra estará deshabilitada cuando no haya ningún camarero logueado. 

 
Ilustración 5 Caja principal de productos. Tras pulsar la categoría cerveza.
En la ilustración anterior se muestra los productos de la categoría seleccionada. En esta se permite seleccionar vario productos mediante el check radio, para que estos sean añadidos a la lista de compra han de estar seleccionadas por el radio y la cantidad debe ser superior a 0, en caso de estar seleccionados y que la cantidad sea 0 el producto no se añadirá a la lista de compra.
Para añadir los productos a la lista de la compra se puede hacer mediante dos métodos, primero pulsando sobre la imagen de un producto o bien pulsando el botón añadir situado en la barra lateral debajo del login.
 
Ilustración 6 Botones debajo de la parte del login.
Botón de añadir, este botón añade al la lista de pedidos los artículos que estén seleccionados y cuya cantidad sea mayor que 0.
Botón Cancelar pedido, este botón borra todos los artículos que haya en la lista actual y comienza un nuevo.
 
Ilustración 7 Lista de artículos a cobrar.
 
Ilustración 8 Lista de articulos vacia tra hacer clic en cancelar pedido
Boton Pagar, este botón lleva a la factura del pedido e inserta esta en la base de datosual. Tras volver a la factura después de ver la factura se reiniciara la lista de productos.
 
Ilustración 9 factura generada tras hacer clic en pagar
En la factura generada tras hacer clic en pagar nos da el detalle de todos los productos, muestra también el camarero que atendió y el numero de factura, al final de la factura se ofrece la opción de volver al tvp, la cual vuelve a reinicial el pedido que haya.

 
Ilustración 10 Lisa de Artículos a que se han pedido
Esta lista se actualiza automáticamente cada vez que se pide un producto, también permite mediante los botones + y – sumar o restar una unidad del producto seleccionado, desapareciendo este de la lista en caso de que la cantidad sea cero.
Errores conocidos de la aplicación: 
Hasta el momento la aplicación solo tiene unos fallos que de momento hay que controlar hasta que esta llegue a una versión final y estos errores sean subsanados.
Estos son:
-El problema del reenvío de valores de una variable, al hacer clic en recargar la aplicación vuelve a enviar los valores que se hayan enviado mediante los formularios.
-Las facturas vacías, al hacer clic en pagar cuando la lista esta vacía se genera una factura vacía y se inserta en la base de datos.

Luis Miguel Pineda Arias.
