<?php
    include("connection.php");
    // $form_id = $_POST["data"];
    $form_query = "SELECT * FROM formulario WHERE id_formulario = {$form_id}";
    //Definiciones
    $form_d = false;
    $qList = new SplDoublyLinkedList();
    //Queries
    //  Get form title and description and save em in form_d
    $form = mysqli_query($conn, $form_query);
    // echo $form_query."<br>";
    if ($form){
        // var_dump($form);
        // echo "consulta FORM correcta";
        $form_d = mysqli_fetch_array($form);
        // echo "Noooooo:".$form_d["nombre"]."<br>";
        // var_dump($form_d);
    }else{
        // echo "<br>query".$form_query;
        // var_dump($form);
        
    }
    //  Get all questions from the form
    $q_query = "SELECT * FROM pregunta WHERE formulario_id = {$form_id}";
    $q = mysqli_query($conn, $q_query);
    if ($q){
        // echo "consulta PREGUNTAS correcta";
        while ($q_d = mysqli_fetch_array($q)) {
            $qList->push($q_d);
            // var_dump($q_d);
        }
    }else{
        // echo "<br>query".$q_query;
        // var_dump($q);
        
    }


?>