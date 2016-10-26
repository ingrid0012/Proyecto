<?php
    $con = mysqli_connect("proyectodegrado.000webhostapp.com", "id61184_proyecto", "12345678", "id61184_miproyecto");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM usuario WHERE usuario = ? AND contrasena = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $name, $username, $password,$age,$correo);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["name"] = $name;
        $response["username"] = $username;
        $response["password"] = $password;
        $response["age"] = $age;
        $response["correo"] = $correo;
    }
    
    echo json_encode($response);
?>
