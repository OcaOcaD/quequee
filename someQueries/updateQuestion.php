<?php
    include("../connection.php");
    var_dump($_POST["data"]);
    $questionId = $_POST["data"];
    echo "<br>";
    var_dump($_POST["qText"]);
    $questionText = $_POST["qText"];
    echo "<br>";
    $form_query = "UPDATE pregunta SET texto_pregunta = '{$questionText}' WHERE id_pregunta = {$questionId}";
    $form = mysqli_query($conn, $form_query);

    if ($form){
        
    }else{
        echo "<br>query".$form_query;
        var_dump($form);
        
    }
?>