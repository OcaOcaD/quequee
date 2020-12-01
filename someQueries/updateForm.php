<?php
    include("../connection.php");
    var_dump($_POST["data"]);
    echo "<br>";
    var_dump($_POST["fName"]);
    echo "<br>";
    $formId = $_POST["data"];
    $formName = $_POST["fName"];
    $formDescription = $_POST["fDescription"];
    $form_query = "UPDATE formulario SET nombre = '{$formName}', descripcion = '{$formDescription}' WHERE id_formulario = {$formId}";
    $form = mysqli_query($conn, $form_query);

    if ($form){
        
    }else{
        echo "<br>query".$form_query;
        var_dump($form);
        
    }
?>