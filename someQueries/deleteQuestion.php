<?php
    include("../connection.php");
    $questionId = $_POST["data"];
    // echo $questionId;
    $q_query = "DELETE FROM pregunta WHERE id_pregunta = {$questionId}";
    $q = mysqli_query($conn, $q_query);
    if ($q){
        echo "consulta correcta";
    }else{
        echo $q_query;
        var_dump($q);
    }
    // deletetQuestion
?>