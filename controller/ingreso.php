<?php

require_once '../model/Connection.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre AND contrasena = :contrasena";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nombre' => $nombre, ':contrasena' => $contrasena]);
     
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['identificador'] = $resultado['id'];
}

     if($resultado){
      echo json_encode([
        "exito" => true, 
        "mensaje" => "¡Login correcto!, ID usuario:",
        $_SESSION['identificador']
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