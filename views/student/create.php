<?php
include_once '../../components/header.php';
?>

<?php
include_once '../../components/navbar.php';
?>

    <div class="container jumbotron">
        <h2>Creación de estudiantes</h2>
        <form id="sendDatafrom">
            <div>
                <p class="lead">Carnet:</p>
                <input type="text" class="lead" id = "id" name="id"  onkeypress="return valideKey(event);" required>
                <span class="lead" id="idMessage"></span>
            </div>
            <div>
                <p class="lead">Primer nombre: </p>
                <input type="text" class="lead" id="firstName" name="firstName" onkeypress ="return validateCreateForm();" required>
            </div>
            <div>
                <p class="lead">Segundo nombre:</p>
                <input type="text" class="lead" id="secondName" name="secondName">
            </div>
            <div>
                <p class="lead">Primer apellido: </p>
                <input type="text" class="lead" id="lastName" name="lastName" onkeypress ="return validateCreateForm();" required>
            </div>
            <div>
                <p class="lead">Segundo apellido:</p>
                <input type="text" class="lead" id="secondLastName" name="secondLastName">
            </div>            
            <div>
                <p class="lead">Fecha de nacimiento: </p>
                <input type="date" class="lead" id="date" name="date" onkeypress ="return validateCreateForm();" required>
            </div>
            <div class="lead">
                <input type="hidden" value="1" name="type" id="type">
                <!--input type="submit" class="btn btn-primary" id="sendStudentData"  onclick="sendData()" value="Guardar"-->
                <input type="button" class="btn btn-primary" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendData()" value="Guardar">
           
            </div>
        </form>
    </div>

<?php
include_once '../../components/footer.php';
?>