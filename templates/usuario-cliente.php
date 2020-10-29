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
$enviarCliente = new DBforms();

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
<h2>REGISTRATE COMO CLIENTE.</h2>
   <form 
     action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
     method="post"
     
>

<?php   

//INPUTS TEXT
     $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "nombre",
     $placeholder = "Pon aquí tu Nombre",
     $label = "Nombre",
     $validacion = $existeValidacion);
//--
     $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "apellidos",
     $placeholder = "Pon aquí tu Apellido",
     $label = "Apellido",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "email",
     $placeholder = "Pon aquí tu Correo Electrónico",
     $label = "Email",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "provincia",
     $placeholder = "Pon aquí tu Provincia",
     $label = "Provincia",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "ciudad",
     $placeholder = "Pon aquí tu Ciudad",
     $label = "Ciudad",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "calle",
     $placeholder = "Pon aquí tu Dirección Postal",
     $label = "Dirección Postal",
     $validacion = $existeValidacion);  
            

?>
<button type="submit" class="submit">Enviar</button>

</form>
<?php

$errores = $InputCeina->hayErrores();
if (!$errores && $existeValidacion) {

   var_dump($InputCeina->datosRecibidos);
    // Enviar a la base de datos
    $idcliente = $enviarCliente->enviarCliente(
        'ssssss',
        $InputCeina->datosRecibidos['nombre'],
        $InputCeina->datosRecibidos['apellidos'],
        $InputCeina->datosRecibidos['email'],
        $InputCeina->datosRecibidos['provincia'],
        $InputCeina->datosRecibidos['ciudad'],
        $InputCeina->datosRecibidos['calle']
    ); 
    
   
    if (!empty($idcliente)) {
        echo '<p>Gracias, hemos recibido y guardado sus datos</p>';
    }
}else{
        echo '<p>NADA</p>';
    };

    
   
   /*  $datosAEnviar = $miConexion->prepare($prepare); */

?>

</div>
</div>

</main>
</body>
</html>
