<?php   
// echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
    $form_id = $_GET["form"];
    include("./someQueries/getForm.php");
    // echo "<br>";
    // echo "brooo:".$form_d["nombre"];
    // echo "<br>";
    // var_dump($form_id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿qué?¿qué?</title>
    <link rel="stylesheet" href="./css/form/form.css">
    
</head>
<body>
    <style>
        .formData{ display: flex; flex-direction: column; width: 500px; max-width: 80%; }
    </style>
    <?php 
        // import("./navbar/navbar.php")
        include("./components/navbar/navbar.php");
    ?>
    <div class="formPage">
        <!-- <img class="form_svg" src="./images/form_svg.svg" alt="Form svg"> -->
        <div class="formPageTitle">
            <h1>Preguntas: <?php echo $form_d["nombre"] ?></h1>
            <button id="newForm" class="newForm" onclick="handleNewQuestion( <?php echo $form_id ?> )">
                <!-- <img src="./images/mas.svg" alt="Añadir nuevo formulario"> -->
                <label for="newForm">NUEVA PREGUNTA</label>
            </button>
        </div>
        <div class="separation"></div>
        <br>
        <div class="row">
            <div class="column">
                <div class="formData">
                    <label for="formName"> Título </label>
                    <input 
                    style="width: 100%; justify-self: flex-start; text-indent: 1em" 
                    id="formName" 
                    placeholder="<?php echo $form_d["nombre"] ?>" 
                    value="<?php echo $form_d["nombre"] ?>" 
                    type="text" value="">
                </div>
                <div class="formData">
                    <label for="formDescription"> Descripción </label>
                    <textarea 
                    id="formDescription"
                    placeholder="<?php echo $form_d["descripcion"] ?>"
                    value="<?php echo $form_d["descripcion"] ?>"
                    type="text"
                        cols="30"
                        rows="5"
                        style="width: 100%; justify-self: flex-start; text-indent: 1em"
                        ></textarea>
                    <button 
                    name="<?php echo $form_id ?>"
                    style="margin: 5px 0; background: #FFFFAA"
                     onclick="handleSaveFormInfo(event)"
                      class="queBtn sm"> Guardar </button>
                </div>
            </div>
            <div class="column">
                <button name="<?php echo $form_d["id_formulario"] ?>" onclick="handleQR(event)" class="queBtn"> Código QR </button>
            </div>
        </div>
        
        <br>
        <div class="separation"></div>
        <?php
            if ( sizeof($qList) == 0 ) {
                echo "<br><h3>No tienes preguntas aún</h3>";
            }
            //
            for ($i=0; $i < sizeof($qList); $i++) { 
                ?>
                <label style="padding: 1em; font-size: 110%;" for="pregunta<?php echo $i ?>">Pregunta <?php echo $i+1 ?></label>
                <div class="row holdOnBooi">
                    <input 
                     id="pregunta<?php echo $qList[$i]["id_pregunta"] ?>"
                      name="<?php echo $qList[$i]["id_pregunta"] ?>"
                       type="text"
                        value="<?php echo $qList[$i]["texto_pregunta"] ?>"
                         style="width: 480px; max-width: 50%; text-indent: 1em"
                        >
                    <div class="column">
                        <button 
                        name="<?php echo $qList[$i]["id_pregunta"] ?>"
                         onclick="handleSaveBtn(event)"
                          style="margin: 5px 0"
                           class="queBtn sm"> Guardar </button>
                        <button 
                        name="<?php echo $qList[$i]["id_pregunta"] ?>"
                         style="margin: 5px 0"
                          class="queBtn danger sm"
                           onclick="handleDeleteBtn(event)"> Eliminar </button>
                    </div>

                </div>
                <?php
            }
        ?>
        <br><br>
    </div>
    <script src="/quequee/jquery.js"></script>
    <script>
        const handleNewQuestion = (formData) => {
            console.log("form id sent:", formData)
            $.ajax({
                type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url:"/quequee/someQueries/insertQuestion.php", //url guarda la ruta hacia donde se hace la peticion
                data: "data="+formData, 
                success:function(response){
                    console.log("Server responded: ",response)
                    window.location.reload();
                },
                
            })
        }
        // handleDeleteBtn Receives the id of a question and deletes it
        const handleDeleteBtn = ( event ) => {
            const questionId = event.target.name
            console.log("q id:", questionId)
            //
            $.ajax({
                type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url:"/quequee/someQueries/deleteQuestion.php", //url guarda la ruta hacia donde se hace la peticion
                data: "data="+questionId, 
                success:function(response){
                    console.log("Server responded: ",response)
                    window.location.reload();
                },
            })
            //
        }
        // handleSaveBtn Receives the id of a question and updates it
        const handleSaveBtn = ( event ) => {
            const questionId = event.target.name
            console.log("q id:", questionId)
            const questionInputId = `pregunta${questionId}`
            const questionInput = document.getElementById(questionInputId).value
            console.log("update with value:", questionInput)
            //
            $.ajax({
                type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url:"/quequee/someQueries/updateQuestion.php", //url guarda la ruta hacia donde se hace la peticion
                data: "data=" + questionId + '&qText=' + questionInput, 
                success:function(response){
                    console.log("Server responded: ",response)
                    // window.location.reload();
                },
            })
            //
        }
        const handleQR = ( event ) => {
            let id = event.target.name
            // console.log("iddd: ", id)
            window.location=`someQueries/formQR.php?form=${id}`
        }
        //Updates the form data
        const handleSaveFormInfo = (event) => {
            const formId = event.target.name
            const formName = document.getElementById("formName").value
            const formDescription = document.getElementById("formDescription").value
            //
            $.ajax({
                type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url:"/quequee/someQueries/updateForm.php", //url guarda la ruta hacia donde se hace la peticion
                data: "data=" + formId + '&fName=' + formName + '&fDescription=' + formDescription, 
                success:function(response){
                    console.log("Server responded: ",response)
                    window.location.reload();
                },
            })
        }
    </script>
</body>
</html>