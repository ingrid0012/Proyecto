<?php
    $con = mysqli_connect("proyectodegrado.000webhostapp.com", "id61184_proyecto", "12345678", "id61184_miproyecto");
    
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $correo= $POST["correo"];

    $statement = mysqli_prepare($con, "INSERT INTO usuario (nombre, usuario, contrasena, age, correo) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $name, $username, $password, $age, $correo);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["exito"] = true;  
    
    echo json_encode($response);
?>
