<?php 
  session_start(); 
 include("funciones.php");
  echo "Hola";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/
xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tpv Frijolito</title>

<link href="estilo/estiilofactura.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="cuenta" align="center"> 
<?php

if($_SESSION['Siniciada']=='si'&& empty($_SESSION['pido'])==false){
	echo '<h1> Frijolito</h1>
	Cif:168786348L<br>
	C/desenga�o 21, 42001,Soria<br>
	Tel:(+34)975123456<br>';
echo'Le atendio: '.$_SESSION['SCamarero'];

	$conex=conexion('tpv');
	$orden='SELECT nuevafactura('.$_SESSION['cod_camarero'].');';
	$consulta=mysql_query($orden);
	$r1=mysql_fetch_array($consulta);
	echo '   N� factura: '.$r1[0].'<br>';
	
	//muestra de lo pedido
	echo '<table style="position:relative; top:2px" >
			  <tr >
				<th>Articulo</th>
				<th>Cantidad</th>
				<th>Precio</th>
			  </tr>';
	foreach($_SESSION['pido'] as $i=>$c){
				if($i!=""){
					
					echo '<tr style="border-bottom: 1px solid blue">
							<td style="border-bottom: 1px solid blue" >'.strtolower($c['articulo']).'</td>
							<td style="border-bottom: 1px solid blue" align="center">'.$c['cantidad'].'</td>
							<td style="border-bottom: 1px solid blue; " align="right">'.number_format($c['precio'], 2, '.', ' ').'�</td>
							
						</tr>';
						
						$total=$total+($c['precio']*$c['cantidad']);
				}
				
			}
	echo '</table>';
	//introduccionde los datos en la base dedatos 
	foreach($_SESSION['pido'] as $i=>$c){
		if($i!=""){
			$orden='insert into lineas_facturas(num_factura,cod_producto,cantidad)
					values('.$r1[0].','.$c['codigo'].','.$c['cantidad'].');';
					
			mysql_query($orden);
		}
	}
	
	
	echo '<h2> Total:'.number_format($total, 2, '.', ' ').'�</h2>';
	echo ' IVA incluido<br>';
	echo ' Gracias por su compra :)';
	unset($_SESSION['pido']);
	desconectar($conex);
}else{
	
	echo '<h1> Acceso no permitido</h1> <h1> O pedido vacio</h1>';
}
?>
</div>
<div class="clear"></div>
<a href="principal.php"> Volver al tpv</a>
</body>
</html>