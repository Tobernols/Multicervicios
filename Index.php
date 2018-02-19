<?php
	require("Conexion.php");
	session_start();
	if (isset($_SESSION["Usuario"]))
	 {
	 	$TipoPersonaAcceso=$_SESSION['IdTipoUsuario'];
			$PersonaAcceso=$_SESSION["Usuario"];
			switch ($TipoPersonaAcceso) {
				case 1:
					$CadenaDireccion="Welcome1.php?Usu=".$PersonaAcceso."";
					break;
				case 2:
					$CadenaDireccion="Welcome2.php?Usu=".$PersonaAcceso."";
					break;
				case 3:
					$CadenaDireccion="Welcome3.php?Usu=".$PersonaAcceso."";
					break;
				case 4:
					$CadenaDireccion="Welcome4.php?Usu=".$PersonaAcceso."";
					break;
			}
			header("Location:$CadenaDireccion");

	}
	if (!empty($_POST)) 
	{
		$var_Usuario=$_POST["txtusuario"];
		$var_Password=$_POST["txtpassword"];
		$Error="";
		$cad_SQL="SELECT * FROM Usuario WHERE Usuario='$var_Usuario' AND Password='$var_Password'";
		$Listado=$MIConexion->prepare($cad_SQL);
		$Listado->execute();
		$Num=$Listado->rowCount();
		echo $Num;
		if ($Num>0)
		{
			$Fila=$Listado->fetch();
			$_SESSION['IdUsuario']=$Fila['IdUsuario'];
			$_SESSION['IdTipoUsuario']=$Fila['IdTipoUsuario'];
			$_SESSION['Usuario']=$Fila['Usuario'];
			//echo $_SESSION['IdUsuario'];
			//echo $_SESSION['IdTipoUsuario'];
			//echo $_SESSION['Usuario'];
			$TipoPersonaAcceso=$_SESSION['IdTipoUsuario'];
			$PersonaAcceso=$_SESSION["Usuario"];
			switch ($TipoPersonaAcceso) {
				case 1:
					$CadenaDireccion="Welcome1.php?Usu=".$PersonaAcceso."";
					break;
				case 2:
					$CadenaDireccion="Welcome2.php?Usu=".$PersonaAcceso."";
					break;
				case 3:
					$CadenaDireccion="Welcome3.php?Usu=".$PersonaAcceso."";
					break;
				case 4:
					$CadenaDireccion="Welcome4.php?Usu=".$PersonaAcceso."";
					break;
			}
			header("Location:$CadenaDireccion");

			//header("location:welcome.php");
		}
		else
		{
			$Error="No coinciden los datos";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Acceso a la BD</title>
</head>
<link rel="stylesheet" type="text/css" href="css/Index.css">
<body>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
		<table align="center">
			
		<form>
		
			<center><img src="img/sesiones.png" id="img"></center>
			<label id="lbl-inicio">Iniciar Sesion</label>
			<input type="text" id="usuario" placeholder="Nombre Usuario" name="txtusuario">
			<input type="password" id="clave" placeholder="contraseña" name="txtpassword">	
			<input type="submit" id="iniciar" value="Iniciar Sesion">

			<label id="lbl-registro">¿Aun no te has registrado?<a id="nuevoR"href="Registrar.html">	Registrarse</a></label>
			
		</form>
				<tr>
					<td colspan="2"><?php echo isset($Error)?utf8_decode($Error):'';?></td>
				</tr>
		</table>
	</form>


</body>
</html>

<?php 
	//if ($sexo="m")
	//{
		//$sueldo=$sueldo-$sueldo*0.10;
	//}
	//else
	//{
		//$sueldo=$sueldo+$sueldo*0.10;
	//}
	//($sexo="m")?$sueldo=$sueldo-$sueldo*0.10:$sueldo=$sueldo+$sueldo*0.10;
?>