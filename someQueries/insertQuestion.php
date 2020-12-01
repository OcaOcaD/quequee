<?php
    include("../connection.php");
    $form_id = $_POST["data"];
    // echo $form_id;
    $q_query = "INSERT INTO pregunta(
        formulario_id, texto_pregunta, orden) VALUES ({$form_id}, 'Nada aquí', 1)";
    $q = mysqli_query($conn, $q_query);
    if ($q){
        echo "consulta correcta";
    }else{
        echo $q_query;
        var_dump($q);
    }
?>