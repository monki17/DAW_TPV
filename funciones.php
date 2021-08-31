<?php
			function conexion($db){
				$c=mysql_connect('127.0.0.1','root','root');
				mysql_select_db($db);
				return $c;	
			}
			function desconectar($a){
				mysql_close($a);
			}
			function inicioSesion(){
				$c=conexion('tpv');
				$orden='select nombre from camareros';
				$q=mysql_query($orden);
				
				
				echo '<form action="principal.php" method="post">
            <select name="PCamarero" id="Camarero">';
			while ($r=mysql_fetch_array($q)){
			echo'
              <option value="'.$r[0].'">'.$r[0].'
			  
			  </option>';
			}
			echo '</select>
            <input type="password" name="Pcontrasena" id="contrasena" />
            <input type="submit" name="go_button" value="Login" />
          </form>';
		  desconectar($c);
			}
			function modifica($mod,$indice){//$mod es el operador q se le pasa y $indice es el elemento a modificar
				if ($mod=='+'){
					$_SESSION['pido'][$indice]['cantidad']++;
				}else{
					if($_SESSION['pido'][$indice]['cantidad']==1){//eliminar el articulo si la cantidad es 0
						unset($_SESSION['pido'][$indice]);
					}else{
						$_SESSION['pido'][$indice]['cantidad']--;	
					}
				}
			}
			function comanda($x,$comanda){
				//lleva como parametros el array que le llega con los productos nuevos
				//y la variable a la que añadira los nuevos productos
				$pedirlo=$comanda;
				$conexion=conexion('tpv');
				$orden1="SELECT nombre,cod_producto,precio FROM productos";
					
				$t2=mysql_query($orden1);
				while ($r3=mysql_fetch_array($t2)){
			  
				  foreach($x as $i=>$c){
						if ($c[1]!=0){
							if($r3[1]==$c[0]){
								
								$prod['codigo']=$r3[1];
								$prod['articulo']=$r3[0];
								//si llega mas pedido de un mismo producto aumentarlo
								if($pedirlo[$r3[1]]['codigo']==$c[0]){
									$prod['cantidad']=$c[1]+$pedirlo[$r3[1]]['cantidad'];
								}else{
									$prod['cantidad']=$c[1];
								}
								$prod['precio']=$r3[2];
								$pedirlo[$r3[1]]=$prod;
								
								
							}
						}
					   
					}
				}
				/*
				Comanda contiene 
				$comanda[1]------>Codigo de producto ---->1
				$comanda[1]['articulo']------>nombre del producto
				$comanda[1]['cantidad']------>cantidad 
				$comanda[1]['precio']------>precio*/
				return $pedirlo;	
			}
	?>