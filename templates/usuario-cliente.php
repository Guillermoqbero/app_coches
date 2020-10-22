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

$InputCeina =new CeinaForms();

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
     $name = "usuario-cliente",
     $placeholder = "Pon aquí tu nombre de Usuario",
     $label = "Nombre de Usuario",
     $validacion = $existeValidacion);
//--
     $InputCeina ->showInput(
     $type = "password",
     $id = "input-text",
     $name = "contraseña-cliente",
     $placeholder = "Pon aquí tu Contraseña",
     $label = "Contraseña",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "calle",
     $placeholder = "Dirección",
     $label = "Dirección Postal ",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "number",
     $id = "input-text",
     $name = "codigo-postal",
     $placeholder = "Código Postal",
     $label = "Código Postal",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "localidad",
     $placeholder = "Localidad",
     $label = "Localidad",
     $validacion = $existeValidacion);
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "provincia",
     $placeholder = "Provincia",
     $label = "Provincia",
     $validacion = $existeValidacion);  
//--     
      $InputCeina ->showInput(
     $type = "text",
     $id = "input-text",
     $name = "pais",
     $placeholder = "País",
     $label = "País",
     $validacion = $existeValidacion);            

?>
<button type="submit" class="submit">Enviar</button>
</form>
</div>
</div>

</main>
</body>
</html>
