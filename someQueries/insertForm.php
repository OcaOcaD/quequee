<?php
    include("../connection.php");
    $today = date('Y-m-d H:i:s');
    $form_query = "INSERT INTO formulario(fecha_de_creacion, nombre, descripcion) VALUES ( '{$today}', 'No name', 'No description' )";
    $form = mysqli_query($conn, $form_query);
    if ($form){
        echo "consulta correcta";
    }else{
        echo $form_query;
        var_dump($form);
        
    }
?>