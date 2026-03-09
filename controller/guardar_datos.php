<?php

require_once '../model/Connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $empresas = $_POST['empresa'] ?? [];
    $montos = $_POST['monto'] ?? [];

    try{ 
        $sql = "INSERT INTO deudas (empresa, monto, fecha_deuda) VALUES (:empresa, :monto, :fecha_actual)";
        $stmt = $pdo->prepare($sql);

        var_dump($_POST['empresa']);
        var_dump($_POST['monto']);


        foreach($empresas as $index => $empresa){
            $monto = $montos[$index] ?? null;

            $fecha_actual = date("Y-m-d");
            $stmt->bindParam(':empresa', $empresa);
            $stmt->bindParam(':monto', $monto);
            $stmt->bindParam(':fecha_actual', $fecha_actual);
            if($stmt->execute()){
                echo json_encode(["mensaje" => "Guardado con éxito!", "fecha" => $fecha_actual]);
            }
        }
     }  
     catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(["error" => "Hubo un problema: " . $e->getMessage()]);
    }

}
?>


