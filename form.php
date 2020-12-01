<?php
    include("./someQueries/getForms.php");
    // echo "size list:".sizeof($formList);
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
    <?php 
        // import("./navbar/navbar.php")
        include("./components/navbar/navbar.php");
    ?>
    <div class="formPage">
        <img class="form_svg" src="./images/form_svg.svg" alt="Form svg">
        <div class="formPageTitle">
            <h1>Tus formularios</h1>
            <button id="newForm" class="newForm" onclick="handleNewForm()">
                <img src="./images/mas.svg" alt="Añadir nuevo formulario">
                <label for="newForm">NUEVO FORMULARIO</label>
            </button>
        </div>
        <div class="separation"></div>
        <div class="forms">
            <!-- Forms taken from database -->
            <?php
            if( sizeof($formList) > 0 ){
                echo '
                <div class="headers">
                    <p class="title"> Título </p>
                    <p class="description"> Descripción </p>
                    <p class="ops"> Operaciones </p>
                </div>
                ';
                for ($i=0; $i < sizeof($formList); $i++) { 
                    ?>
                    <div class="formContainer">
                        <div class="title"> <?php echo $formList[$i]["nombre"] ?> </div>
                        <div class="description">
                            <p>
                                <?php echo $formList[$i]["descripcion"] ?>
                            </p>    
                        </div>
                        <div class="operations">
                            <button 
                             name="<?php echo $formList[$i]["id_formulario"] ?>"
                             class="queBtn" 
                             onclick="handleEditForm(event)">
                              Editar </button>
                            <button 
                             name="<?php echo $formList[$i]["id_formulario"] ?>"
                             onclick="handleDeleteForm(event)"
                             class="queBtn danger"> Eliminar </button>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <script src="/quequee/jquery.js"></script>
    <script>
        const handleNewForm = () => {
            // window.location= ' /newForm.php ';
            $.ajax({
                type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url:"/quequee/someQueries/insertForm.php", //url guarda la ruta hacia donde se hace la peticion
                // data:{nombre:"pepe",edad:10}, // data recive un objeto con la informacion que se enviara al servidor
                success:function(response){
                    console.log("Server responded: ",response)
                    window.location.reload();
                },
                
            })
        }
        const handleEditForm = (event) => {
            console.log("name:", event.target.name)
            const formId = event.target.name
            window.location = `/quequee/edit.php?form=${formId}`
        }
        //
        const handleDeleteForm = (event) => {
            console.log("name:", event.target.name)
            const formId = event.target.name
            $.ajax({
                type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url:"/quequee/someQueries/deleteForm.php", //url guarda la ruta hacia donde se hace la peticion
                data: "data="+formId ,
                success:function(response){
                    console.log("Server responded: ",response)
                    window.location.reload();
                },
                
            })
        }
        
    </script>
</body>
</html>