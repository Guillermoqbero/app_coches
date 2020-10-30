<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
         <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="../assets/styles.css" />
    </head>
    <?php



include "../classes/class.forms.php";
include "../classes/class.db.php";

$InputCeina =new CeinaForms();
$enviarVendedor = new DBforms();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
  $InputCeina->enviarFormulario($_POST);
}
$existeValidacion = !empty($InputCeina) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false; 

?>
    <body>
        <main>
      
<div class="container-box">
<div class="formulario-registro-cliente">
<h2>REGISTRATE COMO VENDEDOR.</h2>
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
    // Enviar a la base de datos
    $idvendedor = $enviarVendedor->enviarVendedor(
        'ssssss',
        $InputCeina->datosRecibidos['nombre'],
        $InputCeina->datosRecibidos['apellidos'],
        $InputCeina->datosRecibidos['email'],
        $InputCeina->datosRecibidos['provincia'],
        $InputCeina->datosRecibidos['ciudad'],
        $InputCeina->datosRecibidos['calle']
    ); 
    
   
    if (!empty($idvendedor)) {
        echo '<p>Gracias, hemos recibido y guardado sus datos</p>';
    }
}

    
   
   /*  $datosAEnviar = $miConexion->prepare($prepare); */

?>
</div>
<div class="boton-modal">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 VISUALIZAR BASE DE DATOS
</button>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">BASE DE DATOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table>
          

  <tr>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>APELLIDOS</th>
    <th>EMAIL</th>
    <th>PROVINCIA</th>
    <th>CIUDAD</th>
    <th>DIRECCIÓN</th>
  </tr>
  <?php
$conexion=mysqli_connect('Localhost','root', '','guillermo_db2' );
$sql = "SELECT * from vendedores"; 
$result = mysqli_query($conexion,$sql);
while($mostrar=mysqli_fetch_array($result)){
?>

  <tr>
      <td><?php echo $mostrar["id"] ?></td>
      <td><?php echo $mostrar["nombre"] ?></td>
      <td><?php echo $mostrar["apellidos"] ?></td>
      <td><?php echo $mostrar["email"] ?></td>
      <td><?php echo $mostrar["provincia"] ?></td>
      <td><?php echo $mostrar["ciudad"] ?></td>
      <td><?php echo $mostrar["calle"] ?></td>
  </tr>

  <?php 
}
 ?>
</table>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
</div>

</main>
<script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"
        ></script>
</body>
</html>
