<?php

class DBforms {
    public $servername;
    public $username;
    public $password;
    public $myDB;

    // Variable para el directorio de los files
    /* public $dir_subida = "tmp";   */  
        
    
    

    public function __construct(
       
        $servername = 'Localhost',
        $username = 'root',
        $password = '',
        $myDB = 'guillermo_db2'
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

    
    public function enviarCliente($datos, $nombre, $apellidos, $email, $provincia, $ciudad, $calle)
    {
        $miConexion = $this->crearConexion();
        $enviarCliente = $miConexion->prepare("INSERT INTO COMPRADORES (nombre, apellidos, email, provincia, ciudad, calle ) VALUES (?, ?, ? ,?, ?, ?)");
        $enviarCliente->bind_param(
            $datos,
            $nombre,
            $apellidos,
            $email,
            $provincia,
            $ciudad,
            $calle
          );

        // Compruebo si la conexión se establece bien
        if (!$enviarCliente) {
            throw new enviarCliente($miConexion->error_list);
        }

        // Ejecute la query
        $enviarCliente->execute();
        
        // Compruebo si se envia y no hay error
        if (!$enviarCliente) {
            throw new Exception($miConexion->error_list);
        }

        // Devuelvo el último valor añadido
        $id = $enviarCliente->insert_id;

        // Cierro conexión
        $enviarCliente->close();

        // Devuevlo el ID
        return $id;

    }
public function enviarVendedor($datos, $nombre, $apellidos, $email, $provincia, $ciudad, $calle)
    {
        $miConexion = $this->crearConexion();
        $enviarVendedor = $miConexion->prepare("INSERT INTO VENDEDORES (nombre, apellidos, email, provincia, ciudad, calle ) VALUES (?, ?, ? ,?, ?, ?)");
        $enviarVendedor->bind_param(
            $datos,
            $nombre,
            $apellidos,
            $email,
            $provincia,
            $ciudad,
            $calle
          );

        // Compruebo si la conexión se establece bien
        if (!$enviarVendedor) {
            throw new enviarVendedor($miConexion->error_list);
        }

        // Ejecute la query
        $enviarVendedor->execute();
        
        // Compruebo si se envia y no hay error
        if (!$enviarVendedor) {
            throw new Exception($miConexion->error_list);
        }

        // Devuelvo el último valor añadido
        $id = $enviarVendedor->insert_id;

        // Cierro conexión
        $enviarVendedor->close();

        // Devuevlo el ID
        return $id;

    }
    
public function enviarVehiculo($datos, $marca, $modelo, $tipo_motor, $num_puertas)
    {
        $miConexion = $this->crearConexion();
        $enviarVehiculo = $miConexion->prepare("INSERT INTO COCHES  (marca, modelo, tipo_motor, num_puertas) VALUES (?, ?, ?, ?)");
        $enviarVehiculo->bind_param(
            $datos,
            $marca,
            $modelo,
            $tipo_motor,
            $num_puertas
          );

        // Compruebo si la conexión se establece bien
        if (!$enviarVehiculo) {
            throw new enviarVehiculo($miConexion->error_list);
        }

        // Ejecute la query
        $enviarVehiculo->execute();
        
        // Compruebo si se envia y no hay error
        if (!$enviarVehiculo) {
            throw new Exception($miConexion->error_list);
        }

        // Devuelvo el último valor añadido
        $id = $enviarVehiculo->insert_id;

        // Cierro conexión
        $enviarVehiculo->close();

        // Devuevlo el ID
        return $id;

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

