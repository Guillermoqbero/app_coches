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

$InputCeina = new CeinaForms();
$enviarVehiculo = new DBforms();


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
<h2>REGISTRA TU VEHÍCULO.</h2>
<?php
    // ESTABLECER CONEXION
    $conLoc = $enviarVehiculo->crearConexion();

    // PREPARAR QUERY
    $prepare = $conLoc->prepare("SELECT * FROM COCHES");

    // COMPROBAR SI HAY ERROR
    if (!$prepare) {
        var_dump($conLoc->error_list);
    }

    // EJECUTAR
    $prepare->execute();

    // BIND RESULT
    // $prepare->bind_result($id, $direccion, $cp);

    // FETCH RESULT
    // while ($prepare->fetch()) {
    //     printf("%s %s %s", $id, $direccion, $cp);
    //     echo '<br>';
    // }

    // GET_RESULT
    $resultado = $prepare->get_result();
    var_dump($resultado->num_rows);

    while ($row = $resultado->fetch_assoc()) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }

    // CLOSE CONNECTION
    $conLoc->close();
    
    
?>
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
     $name = "tipo-motor",
     $placeholder = "Pon aquí el tipo de motor",
     $label = "Tipo de motor",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "num-puertas",
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
    $conexion = $enviarVehiculo->crearConexion();
    $prepare = $enviarVehiculo->enviarVehiculo();
    $datosAEnviar = $conexion->prepare($prepare);

    if (!$datosAEnviar) {
        var_dump($conexion->error_list);
    }

    for ($i = 0; $i < 20; $i++) { 
        $datosAEnviar->bind_param(
           
        'sssi',
        $InputCeina->datosRecibidos['marca'],
        $InputCeina->datosRecibidos['modelo'],
        $InputCeina->datosRecibidos['motor'],
        $InputCeina->datosRecibidos['num_puertas']
        );
        $datosAEnviar->execute();
    }
    printf("%d Row inserted.\n", $datosAEnviar->affected_rows);
    $datosAEnviar->close();
}   
?>
</form>
</div>
</div>

</main>
</body>
</html>
