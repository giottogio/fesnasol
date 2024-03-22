<?php
//// librerias 

header("Content-Type: text/html;charset=utf-8");
//session_start();
include('../modelos/clasedb.php');
// include('controlador_datos.php');

extract($_REQUEST);

class controlador_registro{

	static function controlador($operacion){
	$registro=new controlador_registro();
    switch ($operacion){
   	
 	
    	case 'festival':
		$registro->festival();			 		
			break;

		case 'grupo':
		$registro->grupo();			 		
			break;	

		case 'persona':
		$registro->persona();			 		
			break;		
     	  	

	
   }//cierre del swich
}//cierrre de la funcion controlador

	

	
	  public function festival(){

      extract($_POST); //extrayendo variables del formulario
      $db=new clasedb();
      $conex=$db->conectar(); //conectando con la base de datos



      $sql1="SELECT * FROM festivales WHERE nombre='".$nombre."'";//verificando que el mismo nombre no exista

      $res1=mysqli_query($conex,$sql1);
      $cuantos=mysqli_num_rows($res1);
      
      if ($cuantos>0){  //SI EXISTE EL nombre ENTONCES

       ?> 
			<script type="text/javascript">
				alert('El festival ya existe!');
				window.location="../home.php";
			</script> <?php
     
      }else{ //SI NO EXISTE EL nombre 

      	//variables
      	 $pais= $_POST["pais"];
      	 $nombre= $_POST["nombre"];
      	 $date_1= $_POST["fecha_inicial"];
      	 $date_2= $_POST["fecha_final"];


           
      $sql="INSERT INTO festivales(pais,nombre,fecha_inicio,fecha_final) VALUES ('$pais','$nombre','$date_1','$date_2')"; //insertando datos 


			if ($res=mysqli_query($conex,$sql))  { 			   

					?> 
			<script type="text/javascript">
				alert('Festival guardado exito!');
				window.location="../vistas/festivales.php";
			</script> <?php
					


			}else{

				?> 
		<!-- <script type="text/javascript">
			alert('Error al guardar festival ');
			window.location="../home.php"
		</script> --> <?php 

			}
 
         }

}// fin de la funcuion guardar festival

	
	  public function grupo(){

      extract($_POST); //extrayendo variables del formulario
      $db=new clasedb();
      $conex=$db->conectar(); //conectando con la base de datos



      $sql1="SELECT * FROM grupo WHERE nombre='".$nombre."'";//verificando que el mismo nombre no exista

      $res1=mysqli_query($conex,$sql1);
      $cuantos=mysqli_num_rows($res1);
      
      if ($cuantos>0){  //SI EXISTE EL nombre ENTONCES

       ?> 
			<script type="text/javascript">
				alert('El grupo ya existe!');
				window.location="../home.php";
			</script> <?php
     
      }else{ //SI NO EXISTE EL nombre 

      	//variables
      	 $nombre= $_POST["nombre"];
      	 $pais= $_POST["pais"];
      	 $estado= $_POST["estado"];
      	 $telefono= $_POST["telefono"];
      	 $mail= $_POST["mail"];
      	 $nombre_dir= $_POST["name_dir"];


           
      $sql="INSERT INTO grupos(nombre,pais,estado,n_telefono,correo,nombre_director,id_festivales) VALUES ('$nombre','$pais','$estado','$telefono','$mail','$nombre_dir','$id_festivales')"; //insertando datos 


			if ($res=mysqli_query($conex,$sql))  { 			   

					?> 
			<script type="text/javascript">
				alert('Grupo guardado exito!');
				window.location="../vistas/grupos.php";
			</script> <?php
					


			}else{

				?> 
		<script type="text/javascript">
			alert('Error al guardar grupo ');
			window.location="../home.php"
		</script>  <?php 

			}
 
         }

}// fin de la funcuion guardar grupo





	
	  public function persona(){

      extract($_POST); //extrayendo variables del formulario
      $db=new clasedb();
      $conex=$db->conectar(); //conectando con la base de datos



      $sql1="SELECT * FROM integrantes WHERE documento_identidad='".$dni."'";//verificando que el mismo dni no exista

      $res1=mysqli_query($conex,$sql1);
      $cuantos=mysqli_num_rows($res1);
      
      if ($cuantos>0){  //SI EXISTE EL dni ENTONCES

       ?> 
			<script type="text/javascript">
				alert('La persona ya existe!');
				window.location="../home.php";
			</script> <?php
     
      }else{ //SI NO EXISTE EL dni 

      	//variables
      	 $nombre= $_POST["nombre"];
      	 $apellido= $_POST["apellido"];
      	 $cargo= $_POST["cargo"];
      	 $dni= $_POST["dni"];
      	 $talla= $_POST["talla"];
      	 $comida= $_POST["comida"];
      	 $ig= $_POST["ig"];
      	 $id_grupo= $_POST["id_grupo"];
      	 $id_festivales= $_POST["id_festivales"];
      	 $pasaporte= $_POST["pasaporte"];
      	 $llegada= $_POST["llegada"];
      	 $n_vuelo_1= $_POST["n_vuelo_1"];
      	 $salida= $_POST["salida"];
      	 $n_vuelo_2= $_POST["n_vuelo_2"];


           
      $sql="INSERT INTO integrantes(nombre,apellido,cargo,documento_identidad,talla_camisa,tipo_comida,instagram,pasaporte,llegada_aeropuerto,n_vuelo_llegada,salida_aeropuerto,n_vuelo_salida,id_grupo,id_festivales) VALUES ('$nombre','$apellido','$cargo','$dni','$talla','$comida','$ig','$id_grupo','$id_festivales','$pasaporte','$llegada','$n_vuelo_1','$salida','$n_vuelo_2')"; //insertando datos 


			if ($res=mysqli_query($conex,$sql))  {


			///foto/////
				$id_registro=mysqli_insert_id($conex); //extrayendo id del registro

									
						if ($_FILES["foto"]["error"]>0) {
							
						
						?> 
						<script type="text/javascript">
							alert("error al cargar la foto");
							window.location="../home.php";
						</script>

						<?php

						 }else{ 

						 $permitidos= array("image/gif", "image/png", "image/jpg", "image/jpeg");
						 $tamaño = 500;

						 if (in_array($_FILES["foto"]["type"], $permitidos) && $_FILES["foto"] ["size"] <= $tamaño * 1024 )

						 {
						 //la funcion in_array permite buscar dentro de un arreglo
						 
						 	$ruta='../img/person/'.$id_registro.'/';

						 	$foto=$ruta.$_FILES["foto"]["name"];

						 if (!file_exists($ruta)) {

						 	mkdir($ruta);//en caso de no existir la ruta esta la creo

						 }

						 if (!file_exists($foto)) {
						 	//VALIDANDO QUE NO EXISTAN ARCHIVOS DUPLICADOS

						 	$resultado= @move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
						 	
						 	if ($resultado) {


						 	}else{
						 		?>
						 		<script type="text/javascript">
						 			alert("NO SE GUARDO");
						 			window.location="../home.php";
						 		</script>
						 		<?php
						 	}



						 }else{

						 ?>
						 		<script type="text/javascript">
						 			alert("El archivo ya existe");
						 			window.location="../register_phone.php";
						 		</script>
						 		<?php

						 }
//Creamos una carpeta por cada id que se registre dentro de la carpeta FILES.

 
						 }else{

						 	?>

						 	<script type="text/javascript">
						 	alert("archivo no permitido o excede el tamaño");
						 	window.location="../register_phone.php";
						 	 </script>

						 	<?php

						 }

						   }//primer if


						   //////FOTO//////////// 


			$sql2="UPDATE integrantes SET foto = '".$foto."' WHERE id='$id_registro'";	

			if ($res2=mysqli_query($conex,$sql2)) {


									?> 
			<script type="text/javascript">
				alert('persona guardada exito!');
				window.location="../vistas/personas.php";
			</script> <?php
					


			}else{

				?> 
		<script type="text/javascript">
			alert('Error de Actualizar foto');
			window.location="../register_phone.php"
		</script> <?php 

			}		   

	
					


			}else{

				?> 
		<script type="text/javascript">
			alert('Error al guardar persona ');
			window.location="../home.php"
		</script>  <?php 

			}
 
         }

}// fin de la funcuion guardar persona





	}// fin de la clase


controlador_registro::controlador($operacion);
?>

