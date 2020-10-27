<?php 


class CeinaForms{

    public $errores;
    public $mensajes_error;
    public $datosRecibidos;
    public function __construct(){

    }

    public function enviarFormulario($datos){

        $this->datosRecibidos = $datos;
    }
    public function showInput($type, $id, $name, $placeholder, $label, $validacion, $options = null){
        switch ($type) {
            case 'text':
                return $this->getTypeInput($type, $id, $name, $placeholder, $label, $validacion);
                break;
            case 'password':
                return $this->getTypePassword($type, $id, $name, $placeholder, $label, $validacion);
                break;
            case 'number':
                return $this->getTypeNumber($type, $id, $name, $placeholder, $label, $validacion); 
            default:
                # code...
                break;
            
            
                
        }
    }
//FUNCIÓN INPUT TEXT
private function getTypeInput($type, $id, $name, $placeholder, $label, $validacion){

    $classes;
    $miDato;
    $esValido = null;
    if($validacion){
        $miDato = $this -> sanitizacion($this->datosRecibidos[$name], $type);
        $esValido = $this-> validacion($miDato, $type);
        if($esValido){
                $classes .= "valid-input";
        }else{
            $classes .= "error-input";
              $this->errores = true;
        }
    }
   
    $textInput .= "<label class=label for=`. $id . `>";
    $textInput .= $label;
    $textInput .= "</label>";
    $textInput.= '<input value="'. $miDato. '" type=text   name="'. $name .'" id=" '.$id.' " placeholder=" '.$placeholder.' " class=" '.$classes.' " />';
    if($miDato && $esValido){
        $textInput .="<p class=success-small>Datos Válidos</p>";
    } if($esValido === false){
        $textInput .="<p class=error-small>Datos incorrectos. El campo está vacío o el dato no es válido</p>";
    }

    echo $textInput;
}
private function getTypeNumber($type, $id, $name, $placeholder, $label, $validacion){

    $classes;
    $miDato;
    $esValido = null;
    if($validacion){
        $miDato = $this -> sanitizacion($this->datosRecibidos[$name], $type);
        $esValido = $this-> validacion($miDato, $type);
        if($esValido){
                $classes .= "valid-input";
        }else{
            $classes .= "error-input";
              $this->errores = true;
        }
    }
   
    $textInput .= "<label class=label for=`. $id . `>";
    $textInput .= $label;
    $textInput .= "</label>";
    $textInput.= '<input value="'. $miDato. '" type=text   name="'. $name .'" id=" '.$id.' " placeholder=" '.$placeholder.' " class=" '.$classes.' " />';
    if($miDato && $esValido){
        $textInput .="<p class=success-small>Datos Válidos</p>";
    } if($esValido === false){
        $textInput .="<p class=error-small>Datos incorrectos. El campo está vacío o el dato no es válido</p>";
    }

    echo $textInput;
}
private function getTypePassword($type, $id, $name, $placeholder, $label, $validacion){

    $classes;
    $miDato;
    $esValido = null;
    if($validacion){
        $miDato = $this -> sanitizacion($this->datosRecibidos[$name], $type);
        $esValido = $this-> validacion($miDato, $type);
        if($esValido){
                $classes .= "valid-input";
        }else{
            $classes .= "error-input";
        }
    }
   
    $textInput .= "<label class=label for=`. $id . `>";
    $textInput .= $label;
    $textInput .= "</label>";
    $textInput.= '<input value="'. $miDato. '" type="'. $type.'"   name="'. $name .'" id=" '.$id.' " placeholder=" '.$placeholder.' " class=" '.$classes.' " />';
    if($miDato && $esValido){
        $textInput .="<p class=success-small>Datos Válidos</p>";
    } if($esValido === false){
        $textInput .="<p class=error-small>Datos incorrectos. El campo está vacío o el dato no es válido</p>";
    }

    echo $textInput;
}
//FUNCIÓN INPUT CHECKBOX
private function getTypeCheckbox($type, $id, $name, $placeholder, $label, $validacion){
    $classes;
    $miDato;
  
      
    if($validacion && in_array($name, array_keys($this->datosRecibidos))){
          $isChecked = "checked";       
          $classes.="valid-input";
    }
    $checkbox = '<div class="grupo grupo-checkbox">';
    $checkbox .= "<label class=label for=`. $id . `>";
    $checkbox .= $label;
    $checkbox .= "</label>";
    $checkbox.= '<input '.$isChecked.' type="checkbox"  name="'. $name .'" id=" '.$id.' " placeholder=" '.$placeholder.' " class=" '.$classes.' "  />';
    $checkbox .= `</div>`;
    echo $checkbox;
}
//FUNCIÓN INPUT SELECT
private function getTypeSelect($type, $id, $name, $placeholder, $label, $validacion, $options){
    $classes="input input-select";
    $isChecked ="";
    if($validacion && in_array($name, array_keys($this->datosRecibidos))){
          $isChecked = "checked";       
          $classes.="valid-input";
    }
    $select = '<div class= "grupo grupo-select" >';
    $select .= "<label class='label' for='". $id . "'>";
    $select .= $label;
    $select .= "</label>";
    $select .= '<select id= "'. $id .'" name= "'. $name .'" class=" '.$classes.' " >';
  foreach ($options as $key => $value) {
      
        $select .= '<option value="' . $key . '">'. $value .'</option>';
    };
    $select .= "</select>";
    $select .= `</div>`;
    echo $select;
}
private function sanitizacion($valor, $tipo){

    switch ($tipo) {
        case 'text':
          $filter =  FILTER_SANITIZE_STRING;
            break;
        case 'password':
          $filter =  FILTER_SANITIZE_ENCODED;
            break;
        case 'number':
          $filter =  FILTER_SANITIZE_NUMBER_INT;
            break;
        
        default:
            # code...
            break;
    }
   return filter_var($valor, $filter);
}
private function validacion($valor, $tipo){

    switch ($tipo) {
        case 'text':
             return $valor != "" ? true : false;
           
            break;
        case 'password':
             return $valor != "" ? true : false;
           
            break;
        case 'number':
             return $valor != "" ? true : false;
           
            break;
        
        
        default:
            # code...
            break;
    }
 
}
public function hayErrores()
    {
        return $this->errores;
    }
}

?>