<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Qué?¿qué?</title>
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
            <h1>Nuevo formulario</h1>
            <button id="newForm" class="newForm" onclick=handleNewForm()>
                <img src="./images/mas.svg" alt="Añadir nuevo formulario">
                <label for="newForm">NUEVA PREGUNTA</label>
            </button>
        </div>
        <div class="separation"></div>
        <div class="forms">
            <!-- Forms taken from database -->
            <label className="question">Pregunta </label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
        
    </div>
    <script src="/quequee/jquery.js"></script>
    <script>
        const handleNewForm = () => {
            // // window.location= ' /newForm.php ';
            // $.ajax({
            //     type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
            //     url:"/quequee/someQueries/insertForm.php", //url guarda la ruta hacia donde se hace la peticion
            //     // data:{nombre:"pepe",edad:10}, // data recive un objeto con la informacion que se enviara al servidor
            //     success:function(response){
            //         console.log("Server responded: ",response)
            //     },

            // })
        }
    </script>
</body>
</html>