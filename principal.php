
<?php 
  session_start(); 
 
 include("funciones.php");
  if($_POST['cierraSesion']=='Salir'){
	 session_destroy();
	 header('Location:principal.php');
	 
 }
 if($_POST['cancelar']=='Cancelar pedido'){
	 unset($_SESSION['pido']);
	 header('Location:principal.php');
	 
 }
 
 
 if(!isset($_SESSION['SCamarero'])){
 	$_SESSION['SCamarero']=$_POST['PCamarero'];
	$_SESSION['Scontrasena']=$_POST['Pcontrasena'];
 }

 
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/
xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tpv Frijolito</title>

<link href="estilo/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body >
<div id="todo" >
	<div id="cabecera">
        <div id="contenido1" align="center">
           <strong>TPV Frijolito </strong>
        </div>
       
        <div id="segundo1" align="center"> 
        <?php
			if ($_SESSION['SCamarero']=='Jefe'){
				echo '
				<form action="resumen.php" method="post">
				<input type="hidden" name="Usuario" value='.$_SESSION['SCamarero'].'/>
				<input type="hidden" name="Contrasena" value='.$_SESSION['Scontrasena'].'/>
				<strong><input type="submit" name="submit" value="Resumen del dia" /></strong>
				</form>';
			}else{
				echo '<strong>Resumen del dia</strong>';
			}
		?>
        </div>
        
        <div id="segundo" align="center"> 
        <?php
		if(!isset($_SESSION['SCamarero'])){
          inicioSesion();
		}else{
			if(isset($_SESSION['SCamarero'])&&isset($_SESSION['Scontrasena'])){
				$con=conexion('tpv');
				$orden2="Select nombre,cod_camarero from camareros where nombre ='".$_SESSION['SCamarero']."' and contrasena='".$_SESSION['Scontrasena']."';";
				$q=mysql_query($orden2);
				
				$r1=mysql_fetch_array($q);
				if($r1[0]==""){
					echo"<script> alert('Usuario o contraseña Incorrecto');</script>";
					unset($_SESSION['SCamarero'],$_SESSION['Scontrasena']);
					inicioSesion();
				}else{
					echo'<table>
					<tr>
					
					<td>Bienvenido: '.$r1[0].'</td>';
					
					echo '<td><form action="principal.php" method="post">
					<input type="submit" name="cierraSesion" value="Salir" />
					</form></td>
					</tr>
					</table>';
					$_SESSION['Siniciada']='si';
					$_SESSION['cod_camarero']=$r1[1];
					
					
				}
				desconectar($con);
			}
		}
		 ?>
        </div>
        <div class="clear"></div>
    </div>
    <div id="tipos" align="center"> 
    
      <p id="cat">Categorias</p>
    
      <?php
	  
		  if ($_SESSION['Siniciada']=='si'){
				  echo '
			<div id="button">
				<ul>
				 <li ><a href="principal.php?categoria=CERVEZAS">Cervezas</a></li>
				 <li><a href="principal.php?categoria=MONTADITOS">Montaditos</a></li>
				</ul>
			</div>';
		  }
        ?>
    </div>
    <div id="productos" align="center"> 
		<?php 
		 
		 
		 //meter los productos que se reciben en $x
		 $x=$_POST['producto'];
		 $cat=$_SESSION['cat'];
		 if(($_POST['categoria']!="")&&($_GET['categoria']=="")){
		 	$cat=$_POST['categoria'];
		}else if(($_POST['categoria']=="")&&($_GET['categoria']!="")){
			 $cat=$_GET['categoria'];
		 }else if(($_POST['categoria']!="")&&($_GET['categoria']!="")){
			 $cat=$_POST['categoria'];
		 }
		 
		 
		 $inc=$_POST['incrementar'];//esto de momento no hace nada, intentaba controlar cuando se recargue la pagina
		
		 	/*ir añadiedo los pedidos a una matris que hay en sesion*/
			modifica( $_POST['modifica'],$_POST['indice']);//eliminar o añadir un articulo
			if($inc==1){//intentar controlar el reenvio
				$ped=$_SESSION['pido'];
				//añadir mas productos al pedido
				$pedido=comanda($x,$ped);
				$_SESSION['pido']=$pedido;
				$inc=0;
			}
			if ($_SESSION['Siniciada']=='si'){
				$conexion=conexion('tpv');
				$orden1="SELECT nombre,cod_producto FROM productos where categoria='".$cat."'";
				
				$t2=mysql_query($orden1);
				echo '<form action="principal.php" method="post">';
				while ($r3=mysql_fetch_array($t2)){
					echo '
					<table id="producto" align="center" border="1">
						<tr>
							<td colspan="2" align="center">
								<button type="submit"  title="'.$r3[0].'"> <img src="productos/'.$cat.'/'.$r3[0].'.bmp"/></button>
							</td>
						</tr>
						<tr>
							<td align="center">
								<input name="producto['.$r3[1].'][0]" type="radio" value="'.$r3[1].'"/>
							</td>
							<td align="center"> 
								<select name="producto['.$r3[1].'][1]" >
								  ';
								  for ($i=0;$i<10;$i++){
								  echo'<option value="'.$i.'">'.$i.'</option>';
								  
								  }
								  echo '
								</select>
							</td>
						</tr>
					</table>';
				
				}
				echo '<div class="clear"></div>';
				echo '<input type="hidden" name="categoria" value="'.$cat.'" />
				<input name="Camarero" type="hidden" value="'.$_POST['Camarero'].'" />';
				
				echo '<input name=incrementar type="hidden"  value="'.(1).'" />';//instentar controlar el reenvio
				desconectar($conexion);
			}else{
				echo'<h1>Bienvenido a TPV Frijolito</h1>';
			}
		?>
        <div class="clear"></div>
    </div>
    <div id="cargaproducto" align="center">
    <?php 
	if ($_SESSION['Siniciada']=='si'){
		
   		echo ' <table>
    <tr>
    <td>
   	<input  type="submit" value="Añadir" />
	</form>
    </td>
	<td>
	<form action="principal.php" method="post">
    <input name="cancelar" type="submit" value="Cancelar pedido" />
    </form>
	</td>
    <td>
    <form action="factura.php" method="post">
    <input name="submit" type="submit" value="Pagar" />
    </form>
    </td>
    </tr>
      </table>  ';
	}else{
	echo '<strong style=" font-size:x-large; position:relative; top:50% left:50%"> Logueate!</strong>';
	}
	?>
            
    </div>
    
		<div id="cuenta" align="center"> 
		  
          <?php 
			echo '<table style="position:relative; top:2px" >
			  <tr >
				<th>Articulo</th>
				<th>Cantidad</th>
				<th>Precio</th>
			  </tr>';
  
			foreach($_SESSION['pido'] as $i=>$c){
				if($i!=""){
					echo '<tr style="border-bottom: 1px solid blue">
							<td style="border-bottom: 1px solid blue" >'.$c['articulo'].'</td>
							<td style="border-bottom: 1px solid blue" align="center">'.$c['cantidad'].'</td>
							<td style="border-bottom: 1px solid blue; " align="right">'.number_format($c['precio'], 2, '.', ' ').'€</td>
							<form action="principal.php" method="post">
								<td><input name="modifica" type="submit" value="+" /></td>
								<td><input name="modifica" type="submit" value="-" /></td>
								<input name="indice" type="hidden" value="'.$i.'" />
								<input type="hidden" name="categoria" value="'.$cat.'" />
								<input name="Camarero" type="hidden" value="'.$_POST['Camarero'].'" />
							</form>
						</tr>';
						$total=$total+($c['precio']*$c['cantidad']);
				}
				
			}

			echo '</table>';
		  ?>
		</div>
        <div id="total" align="center"> 
		  <p>Aqui se muestran el total</p>
          <?php 
		 	echo '<h2> Total:'.number_format($total, 2, '.', ' ').'€</h2>';
		  ?>
		</div>
    <div class="clear"></div>
</div>


<div class="clear"></div>
</body>
</html>