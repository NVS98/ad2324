<?php
	session_start();
	var_export($_POST);

	if(count($_POST)==0){
		$_SESSION['a']=range(1,9);
		shuffle($_SESSION['a']);
		$fondo="";
		$tusPuntos=0;
		$intentos=0;
	}else{
		$fondo=$_POST['fondo'];
		$tusPuntos=$_POST['tusPuntos'];
		$intentos=$_POST['intentos'];
	}
	if(isset($_POST['check']) && $tusPuntos>=15){
		header("Location: end.php");
		exit();
	}else{
		if($intentos==2){
			header("Location: game_over.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nivel 2</title>
	<style>
		.centrado1{
			text-align: center;
		}
		.centrado{
			text-align: center;
			display: inline-block;
		}

		.puntos{
			text-align: center;
			display: inline-block;
		}
		.centrado input,button{
			width: 30px;
			height: 30px;
			margin: 5px;
			padding: 10px;
			border-radius: 10px;
			background-color: black;

		}
		.centrado button{
			user-select: none;
		}
		.puntos input{
			width: 30px;
			height: 30px;
			outline: none;
			background-color: #dfe;
			border: 0;
		}
		.footer input{
			font-size: 1.5em;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
		}
		<?php 
			if(count($_POST)>0 && $intentos<2){
				if($intentos==0){
					$fondo= $fondo.".B".$_POST['foo'];
				}else{
					$fondo = $fondo. ", .B".$_POST['foo'];
				}
				echo $fondo;
			}
			
			if(count($_POST)>0){
				if($intentos<3){
					$intentos+=1;
					echo $fondo."{";
					echo "background-color: white;";
					echo "}";
					$tusPuntos+=$_SESSION['a'][$_POST['foo'] -1 ];
				}
			}
		?>
	</style>
</head>
<body>
	<center></center>
	<form method="POST">
		<div class="centrado1">
			<h1>NIVEL 2</h1><br/>
			<h2>Numero a superar: 15</h2>
			<div >
				<div class="centrado">
					<button class="B1"name="foo" value="1"  ><?php echo $_SESSION['a'][0]; ?></button>
					<button class="B2"name="foo" value="2"  ><?php echo $_SESSION['a'][1]; ?></button>
					<button class="B3"name="foo" value="3"  ><?php echo $_SESSION['a'][2]; ?></button><br/>
					<button class="B4"name="foo" value="4"  ><?php echo $_SESSION['a'][3]; ?></button>
					<button class="B5"name="foo" value="5"  ><?php echo $_SESSION['a'][4]; ?></button>
					<button class="B6"name="foo" value="6"  ><?php echo $_SESSION['a'][5]; ?></button><br/>
					<button class="B7"name="foo" value="7"  ><?php echo $_SESSION['a'][6]; ?></button>
					<button class="B8"name="foo" value="8"  ><?php echo $_SESSION['a'][7]; ?></button>
					<button class="B9"name="foo" value="9"  ><?php echo $_SESSION['a'][8]; ?></button>
				</div>
				<div class="puntos">
					<label>Intentos: </label>
					<input type="text" name="intentos" value="<?php  echo $intentos; ?>" readonly>/3
					<input type="hidden" name="nintentos" value="<?php echo $intentos+1; ?>"><br/> 
					<label>Puntos totales: </label>
					<input type="text" name="tusPuntos" value="<?php echo $tusPuntos;?>" readonly>		
					<input type="hidden" name="fondo" value="<?php echo $fondo; ?>">	
				</div>
			</div>
			<br/>
			<br/>
			<br/>
			<div class="footer">
				<?php
					if($tusPuntos>=15){
						echo "<h3 style='font-size: 3em;'>Enhorabuena, has conseguido la puntuación necesaria<h3>";

					}else{
						if($intentos==2){
							echo "<h3 style='font-size: 3em;'>No has conseguido la puntuación necesaria<h3>";
						}
					}
				?>
				<input type="submit" name="check" class="button" value="OK" <?php 
					if(count($_POST)>0){
						if($tusPuntos<15 && $_POST['nintentos']<2){echo "hidden";}else{echo "";} 
					}else{
						echo "hidden";
					}?>>
			</div>
		</div>
	</form>
	</center>
</body>
</html>