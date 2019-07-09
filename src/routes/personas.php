<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//Obtener todos los clientes
$app->get('/api/personas', function(Request $request, Response $response){
    $consulta = "SELECT * FROM personas";
    try{
        // Instanciar la base de datos
        $db = new db();

        // Conexión
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $personas = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en formato JSON
        echo json_encode($personas);

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

//Obtener un solo cliente
$app->get('/api/personas/{id}', function(Request $request, Response $response){

    $id = $request->getAttribute('id');

    $consulta = "SELECT * FROM personas WHERE id='$id'";
    try{
        // Instanciar la base de datos
        $db = new db();

        // Conexión
        $db = $db->conectar();
        $ejecutar = $db->query($consulta);
        $persona = $ejecutar->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        //Exportar y mostrar en formato JSON
        echo json_encode($persona);
        
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


// Agregar Cliente
$app->post('/api/personas/agregar', function(Request $request, Response $response){
    $nombre = $request->getParam('nombre');
    $apellido = $request->getParam('apellido');
    $direccion = $request->getParam('direccion');
    $ciudad = $request->getParam('ciudad');
    $zona = $request->getParam('zona');
    $fecha_de_nacimiento = $request->getParam('fecha_de_nacimiento');
    $ciudad_nacimiento = $request->getParam('ciudad_nacimiento');
    $email = $request->getParam('email');
    $cedula = $request->getParam('cedula');
    $tipo_identificacion = $request->getParam('tipo_identificacion');
    $celular = $request->getParam('celular');
    $telefono = $request->getParam('telefono');
    $tipo_empleo = $request->getParam('tipo_empleo');
    $empresa = $request->getParam('empresa');
    $cargo = $request->getParam('cargo');
    $antiguedad = $request->getParam('antiguedad');
    $sueldo = $request->getParam('sueldo');
    $deudas = $request->getParam('deudas');
    $referido = $request->getParam('referido');
    $telefono_referido = $request->getParam('telefono_referido');

    $consulta = "INSERT INTO personas (nombre, apellido, direccion, ciudad, zona, fecha_de_nacimiento, ciudad_nacimiento, email, cedula, tipo_identificacion, celular, telefono, tipo_empleo, empresa, cargo, antiguedad, sueldo, deudas, referido, telefono_referido) VALUES 
    (:nombre, :apellido, :direccion, :ciudad, :zona, :fecha_de_nacimiento, :ciudad_nacimiento, :email, :cedula, :tipo_identificacion, :celular, :telefono, :tipo_empleo, :empresa, :cargo, :antiguedad, :sueldo, :deudas, :referido, :telefono_referido)";
    try{
        // Instanciar la base de datos
        $db = new db();

        // Conexión
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':nombre',   $nombre);
        $stmt->bindParam(':apellido',   $apellido);
        $stmt->bindParam(':direccion',   $direccion);
        $stmt->bindParam(':ciudad',   $ciudad);
        $stmt->bindParam(':zona',   $zona);
        $stmt->bindParam(':fecha_de_nacimiento',   $fecha_de_nacimiento);
        $stmt->bindParam(':ciudad_nacimiento',   $ciudad_nacimiento);
        $stmt->bindParam(':email',   $email);
        $stmt->bindParam(':cedula',   $cedula);
        $stmt->bindParam(':tipo_identificacion',   $tipo_identificacion);
        $stmt->bindParam(':celular',   $celular);
        $stmt->bindParam(':telefono',   $telefono);
        $stmt->bindParam(':tipo_empleo',   $tipo_empleo);
        $stmt->bindParam(':empresa',   $empresa);
        $stmt->bindParam(':cargo',   $cargo);
        $stmt->bindParam(':antiguedad',   $antiguedad);
        $stmt->bindParam(':sueldo',   $sueldo);
        $stmt->bindParam(':deudas',   $deudas);
        $stmt->bindParam(':referido',   $referido);
        $stmt->bindParam(':telefono_referido',   $telefono_referido);
        $stmt->execute();
        echo '{"notice": {"text": "Cliente agregado con exito"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


// Actualizar Cliente
$app->put('/api/personas/actualizar/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $nombre = $request->getParam('nombre');
    $apellido = $request->getParam('apellido');
    $direccion = $request->getParam('direccion');
    $ciudad = $request->getParam('ciudad');
    $zona = $request->getParam('zona');
    $fecha_de_nacimiento = $request->getParam('fecha_de_nacimiento');
    $ciudad_nacimiento = $request->getParam('ciudad_nacimiento');
    $email = $request->getParam('email');
    $cedula = $request->getParam('cedula');
    $tipo_identificacion = $request->getParam('tipo_identificacion');
    $celular = $request->getParam('celular');
    $telefono = $request->getParam('telefono');
    $tipo_empleo = $request->getParam('tipo_empleo');
    $empresa = $request->getParam('empresa');
    $cargo = $request->getParam('cargo');
    $antiguedad = $request->getParam('antiguedad');
    $sueldo = $request->getParam('sueldo');
    $deudas = $request->getParam('deudas');
    $referido = $request->getParam('referido');
    $telefono_referido = $request->getParam('telefono_referido');


     $consulta = "UPDATE personas SET
                nombre               = :nombre,     
                apellido             = :apellido,
                direccion            = :direccion,
                ciudad               = :ciudad,
                zona                 = :zona,
                fecha_de_nacimiento  = :fecha_de_nacimiento,
                ciudad_nacimiento    = :ciudad_nacimiento,
                email                = :email,
                cedula               = :cedula,
                tipo_identificacion  = :tipo_identificacion,
                celular              = :celular,
                telefono             = :telefono, 
                tipo_empleo          = :tipo_empleo,
                empresa              = :empresa,
                cargo                = :cargo,
                antiguedad           = :antiguedad,
                sueldo               = :sueldo,
                deudas               = :deudas,
                referido             = :referido,
                telefono_referido    = :telefono_referido
			WHERE id = $id";


    try{
        // Instanciar la base de datos
        $db = new db();

        // Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($consulta);
        $stmt->bindParam(':nombre',   $nombre);
        $stmt->bindParam(':apellido',   $apellido);
        $stmt->bindParam(':direccion',   $direccion);
        $stmt->bindParam(':ciudad',   $ciudad);
        $stmt->bindParam(':zona',   $zona);
        $stmt->bindParam(':fecha_de_nacimiento',   $fecha_de_nacimiento);
        $stmt->bindParam(':ciudad_nacimiento',   $ciudad_nacimiento);
        $stmt->bindParam(':email',   $email);
        $stmt->bindParam(':cedula',   $cedula);
        $stmt->bindParam(':tipo_identificacion',   $tipo_identificacion);
        $stmt->bindParam(':celular',   $celular);
        $stmt->bindParam(':telefono',   $telefono);
        $stmt->bindParam(':tipo_empleo',   $tipo_empleo);
        $stmt->bindParam(':empresa',   $empresa);
        $stmt->bindParam(':cargo',   $cargo);
        $stmt->bindParam(':antiguedad',   $antiguedad);
        $stmt->bindParam(':sueldo',   $sueldo);
        $stmt->bindParam(':deudas',   $deudas);
        $stmt->bindParam(':referido',   $referido);
        $stmt->bindParam(':telefono_referido',   $telefono_referido);
        $stmt->execute();
        echo '{"notice": {"text": "Cliente actualizado con exito"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


// Borrar cliente
$app->delete('/api/personas/borrar/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "DELETE FROM personas WHERE id = $id";
    try{
        // Instanciar la base de datos
        $db = new db();

        // Conexion
        $db = $db->conectar();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Cliente borrado con exito"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});