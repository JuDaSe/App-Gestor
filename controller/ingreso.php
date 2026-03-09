<?php

require_once '../model/Connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
}

     $sql = "SELECT * FROM usuarios WHERE nombre = :usuario";
     $stmt = $pdo->prepare($sql);
     $stmt->execute([':usuario' => $usuario]);

     $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

     if($resultado){
      echo json_encode([
        "exito" => true, 
        "mensaje" => "¡Login correcto!"
      ]);
        exit();
     } else {
         echo json_encode([
         "exito" => false,
         "mensaje" => "Login incorrecto!"
      ]);
        exit();
     }

?>