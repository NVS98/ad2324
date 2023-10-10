<html>

    <?php if(isset($_POST['volverH1_x'])){
            header("Location: ../entrada.php");
            die();
        }?>

    <title>Habitación 1</title>
    <link rel="stylesheet" href="../css/h1.css">
    <body>
    	<form method="POST">
	        <input type="image" name="volverH1" class="volverH1" src="../src/volverH1.png">
	    </form>
    </body>
</html>