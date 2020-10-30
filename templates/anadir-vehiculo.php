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
$enviarVehiculo = new DBforms();

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $InputCeina->enviarFormulario($_POST);
}
$existeValidacion = !empty($InputCeina) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false; 

?>
    <body>
        <main>
      
<div class="container-box">
<div class="formulario-registro-cliente">
<h2>REGISTRA TU COCHE.</h2>
   <form 
     action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
     method="post"
     
>

<?php   
 

//INPUTS TEXT
     $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "marca",
     $placeholder = "Pon aquí la marca de tu vehículo",
     $label = "Marca",
     $validacion = $existeValidacion);
//--
     $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "modelo",
     $placeholder = "Pon aquí el modelo",
     $label = "Modelo",
     $validacion = $existeValidacion);

//--
 
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "tipo_motor",
     $placeholder = "Pon aquí el tipo de motor",
     $label = "Tipo de motor",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "number",
     $id = "input-text",
     $name = "num_puertas",
     $placeholder = "Pon aquí el número de puertas",
     $label = "Número de puertas",
     $validacion = $existeValidacion);
//--     
                

?>
<button type="submit" class="submit">Enviar</button>
<?php

$errores = $InputCeina->hayErrores();
if (!$errores && $existeValidacion) {
    // Enviar a la base de datos
    $idvehiculo = $enviarVehiculo->enviarVehiculo(
        'sssi',
        $InputCeina->datosRecibidos['marca'],
        $InputCeina->datosRecibidos['modelo'],
        $InputCeina->datosRecibidos['tipo_motor'],
        $InputCeina->datosRecibidos['num_puertas']
        ); 
    
   
    if (!empty($idvehiculo)) {
        echo '<p>Gracias, hemos recibido y guardado sus datos</p>';
    }
}

    
   
   /*  $datosAEnviar = $miConexion->prepare($prepare); */

?>
</form>
</div>

</div>

</main>
</body>
</html>
