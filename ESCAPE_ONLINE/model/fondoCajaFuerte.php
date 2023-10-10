<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/fondoCajaFuerte.css">
	<title>Interiror Caja Fuerte</title>
</head>
	<body>
		<?php
		if(count($_POST)==0){
	    	$recogeLlave=false;
	    	$aciertoCajaFuerte=true;
	    }else{
	    	$recogeLlave=$_POST['recogeLlave'];
	    	$aciertoCajaFuerte=$_POST['aciertoCF'];
	    }

	    //if(isset($_POST['volver_x'])){
		//	header("Location: ../entrada1.php");
		//	die();
		//}
		var_export($_POST);
		
	?>
	<form action="<?php if(isset($_POST['volver_x'])){
			echo "../entrada1.php";
		} ?>" method="POST">
		<input type="image" name="llave" class='llave' src="<?php
			if(count($_POST)>0){
				if(isset($_POST['llave_x'])){
					echo "";
					$recogeLlave= true;
				}elseif ($recogeLlave) {
					echo "";
				}else{
					echo "../src/llave.png";
				}
			}else{
				echo "../src/llave.png";
			}
		?>" <?php if($recogeLlave){echo "hidden";} ?> >
		<input type="image" name="volver" class='volver' src="../src/volver.png">

		<input type="hidden" name="aciertoCF" value="<?php echo $aciertoCajaFuerte ?>">

		<input type="hidden" name="recogeLlave" value="<?php echo $recogeLlave; ?>">
	</form>
	</body>
</html>