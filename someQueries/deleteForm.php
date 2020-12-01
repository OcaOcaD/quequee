<?php
    include("../connection.php");
    $form_id = $_POST["data"];
    // echo $form_id;
    $q_query = "DELETE FROM formulario WHERE id_formulario = {$form_id}";
    $q = mysqli_query($conn, $q_query);
    if ($q){
        echo "consulta correcta";
    }else{
        echo $q_query;
        var_dump($q);
    }
    // deletetQuestion
?>