<?php
     session_start();
     //$_SESSION['variable_name']=variable_value;
?>
<html>

    <title>Lobby</title>
    <link rel="stylesheet" href="css/entrada1.css">
    <body>
        <?php

        if(count($_POST)==0){
            $aciertoCajaFuerte=false;
            $recogeLlave=false;
            $aciertoCajaFuerte=false;
            $codigo="0000";
            $claveSecreta= "";
            for($i=0;$i<4;$i++){
                $claveSecreta = $claveSecreta.rand(0,9);
            }
        }else{
            $claveSecreta=$_POST['claveSecreta'];
            $aciertoCajaFuerte=$_POST['aciertoCF'];
            $recogeLlave=$_POST['recogeLlave'];
        }
        ?>
    <form action="<?php
        if (isset($_POST['puertaH1'])) {
             echo "model/h1.php";
         }elseif(isset($_POST['puertaH2'])){
            echo "model/h2.php";
         }elseif(isset($_POST['escalera'])){
            echo "model/escalera.php";
         }elseif (isset($_POST['cajaFuerte'])) {
             if($aciertoCajaFuerte){
                echo "model/fondoCajaFuerte.php";
            }else{
                echo "model/cajaFuerte.php";
            }
         } ?>" method="POST">
        <input type=submit name="puertaH1" class="puertaH1" value="" style="cursor: pointer;">
        <input type="submit" name="puertaH2" class="puertaH2" disabled style="cursor: pointer;">
        <input type="submit" name="escalera" class="escalera" disabled style="cursor: pointer;">
        <input type="submit" name="cajaFuerte" value="" class="cajaFuerte" src="./src/cajaFuerte.png">

        <input type="hidden" name="aciertoCF" value="<?php echo $aciertoCajaFuerte ?>">

        <input type="hidden" name="recogeLlave" value="<?php echo $recogeLlave; ?>">
        <input type="hidden" name="claveSecreta" value="<?php echo $claveSecreta ?>">
    </form>
    </body>
</html>