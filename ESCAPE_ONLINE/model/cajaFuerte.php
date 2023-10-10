<html>
    <title>Caja fuerte</title>
    <link rel="stylesheet" href="../css/cajaFuerte.css">
    <body>

    	<?php 
    		if(count($_POST)==0){
	    		$aciertoCajaFuerte=false;
	    		$codigo="0000";
	    		$claveSecreta= "";
	    		for($i=0;$i<4;$i++){
	    			$claveSecreta = $claveSecreta.rand(0,9);
	    		}
	    	}else{
	    		$aciertoCajaFuerte = comprobarCodigo();
	    		
	    		$claveSecreta=$_POST['claveSecreta'];
	    		if(strlen($_POST['pantalla'])<4){
	    			$codigo = $_POST['pantalla'];
	    		}else{
	    			$codigo="";
	    		}
	    	}

	    	function borrar(){
	    		$codigo = substr_replace($_POST['pantalla'], "", -1);
	    		return $codigo;
	    	}
    	?>

    	<?php 
    		function comprobarCodigo(){
	    		if(isset($_POST['abrir']) && $_POST['pantalla'] == $_POST['claveSecreta']){
	    			return true;
	    		}else{
	    			return false;
	    		}
	    	}
    		
    		if(isset($_POST['volverCF_x'])){
				header("Location: ../entrada1.php");
				die();
			}
    	?>
    <form method="POST">
    <div class="conteiner">
    	
        <div class="header">
        	<div class="led-box">
				<div class="led-red" style="<?php if($aciertoCajaFuerte){
					echo "animation: paused; background-color: green;";
				}
				
			   	?>"></div>
			   	
			</div>		
			<div class='calculator'>
				<div class='display'>
			  		<input name='pantalla' type='text' maxlength='4' class='lcd' value='<?php 
				  		if(isset($_POST['pad'])){
				  			if(count($_POST)==0){
				  				echo $codigo;
				  			}elseif ($_POST['pad']!='C') {
				  				if(strlen($_POST['pantalla'])==4 && comprobarCodigo()){
				  					echo "XXXX";
				  				}else{
						  			$codigo=$codigo.$_POST['pad']?? null;
						  			echo $codigo;
						  			//$codigo=$_POST['pad'];
					  			}
					  		}else{
					  			echo borrar();
				  			}
				  		}
			  		 ?>' 
			  		 ></input>
			  	</div>
			</div>
		</div>
        <div class="content">
        	<div class="teclado">
        			<input type="submit" name="pad" value="1">
        			<input type="submit" name="pad" value="2">
        			<input type="submit" name="pad" value="3">
        			<input type="submit" name="pad" value="4">
        			<input type="submit" name="pad" value="5">
        			<input type="submit" name="pad" value="6">
        			<input type="submit" name="pad" value="7">
        			<input type="submit" name="pad" value="8">
        			<input type="submit" name="pad" value="9">
        			<input type="submit" name="pad" value="#">
        			<input type="submit" name="pad" value="0">
        			<input type="submit" name="pad" value="C">
        	</div>
        </div>
        <div class="footer">
        	<input type="submit" name="abrir" value="ABRIR">
        	

        	<input type="hidden" name="claveSecreta" value="<?php echo $claveSecreta ?>">
        </div>
    </div>
    <input type="image" name="volverCF" class="volverCF" src="../src/volver.png">
    <input type="hidden" name="aciertoCF" value="<?php echo $aciertoCajaFuerte ?>">
    </form>
    </body>
    <?php 
			   	if($aciertoCajaFuerte){
					sleep(5);
					header("Location: fondoCajaFuerte.php");
					die();
				} ?>
</html>