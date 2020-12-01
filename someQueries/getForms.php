<?php
    include("connection.php");
    $form_query = "SELECT * FROM formulario WHERE 1";
    $form = mysqli_query($conn, $form_query);
    $formList = new SplDoublyLinkedList();
    if ($form){
        // echo "consulta correcta";
        while ($form_d = mysqli_fetch_array($form)) {
            $formList->push($form_d);
        }
    }else{
        // echo "<br>query".$form_query;
        // var_dump($form);
        
    }
?>