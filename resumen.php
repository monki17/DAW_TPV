<?php 
  session_start(); 
 include("funciones.php");
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/
xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tpv Frijolito</title>

<link href="estilo/estiloresumen.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="todo">
        <div id="cuenta" align="center"> 
			<?php
            if(($_SESSION['Siniciada']=='si')&&($_SESSION['cod_camarero']==3)){
                
                $con=conexion('tpv');
                $orden2="Select nombre,cod_camarero from camareros where nombre ='".$_SESSION['SCamarero']."' and contrasena='".$_SESSION['Scontrasena']."';";
                $q=mysql_query($orden2);
                $r1=mysql_fetch_array($q);
                echo '<strong> Bar Frijolito Estadistica </strong><br> A dia: '.date("d-m-Y");
            
            echo '
        </div>
		<div class="clear"></div>
		<div id="totalCamareros" align="center">
			<table border="1" align="center">
			<tr> <th>Nombre</th> <th>Recaudado</th> </tr>
			';
			$orden3="Select nombre,cod_camarero from camareros";
			$q2=mysql_query($orden3);
			while ($r2=mysql_fetch_array($q2)){
				$orden4="select total_camarero_hoy(".$r2[1].");";
				$q3=mysql_query($orden4);
				$r3=mysql_fetch_array($q3);
			echo '<tr> <td>'.$r2[0].'</td> <td align="right">'.number_format($r3[0], 2, '.', ' ').'€</td></tr>'; 
			
			}
			echo '</table>
		</div>
		<div id="totalProductos">
			<table border="1" align="center">
			<tr> <th>Producto</th> <th>Cantidad</th> <th>Precio</th></tr>
			';
			$orden6="call total_productos_hoy";
			$q5=mysql_query($orden6);
			while ($r5=mysql_fetch_array($q5)){
				
			echo '<tr> <td>'.$r5[0].'</td> <td align="center">'.$r5[1].'</td> <td align="right">'.number_format($r5[2], 2, '.', ' ').'€</td></tr>'; 
			
			}
			desconectar($con);
			echo '</table>
		</div>
		<div class="clear" ></div>
		<div id="cuenta" align="center">';
			$con=conexion('tpv');
			$ord="select total_hoy();";
			$qt=mysql_query($ord);
			
			$rt=mysql_fetch_array($qt);
			
			echo '<h2> El total de hoy:</h2><h2> '.number_format($rt[0], 2, '.', ' ').'€</h2>';
			echo '</div>
			';
			desconectar($con);
			}else{
				echo '<h1> Acceso no permitido</h1>';
				
			}
			?>
        
    
    </div>
<div class="clear"></div>
<a href="principal.php"> Volver al tpv</a>
</body>
</html>