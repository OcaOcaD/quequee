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
            <h1>Formulario</h1>
            <button id="newForm" class="newForm">
                <img src="./images/mas.svg" alt="Añadir nuevo formulario">
                <label for="newForm">NUEVO FORMULARIO</label>
            </button>
        </div>
        <div class="separation"></div>
        <div class="forms">
            <!-- Forms taken from database -->
            <div class="headers">
                <p class="title"> Título </p>
                <p class="description"> Descripción </p>
                <p class="ops"> Operaciones </p>
            </div>
            <div class="formContainer">
                <div class="title"> Foo 1 </div>
                <div class="description">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita facere eaque quis illo adipisci porro, voluptatibus.
                    </p>    
                </div>
                <div class="operations">
                    <button class="queBtn"> Preguntas </button>
                    <button class="queBtn"> Estadísticas </button>
                </div>
            </div>
            <div class="formContainer">
                <div class="title"> Foo 2 </div>
                <div class="description">
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita facere eaque quis illo adipisci porro, voluptatibus.
                    </p>    
                </div>
                <div class="operations">
                    <button class="queBtn"> Preguntas </button>
                    <button class="queBtn"> Estadísticas </button>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>