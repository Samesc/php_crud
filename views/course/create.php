<?php
include_once '../../components/header.php';
?>

<?php
include_once '../../components/navbar.php';
?>

    <div class="container jumbotron">
        <h2>Creación de cursos</h2>
        <form id="sendDatafrom">
            <div>
                <p class="lead">Códgo:</p>
                <input type="text" class="lead" id = "id" name="id" required onkeypress="return valideKey(event);">
                <span class="lead" id="idMessage"></span>
            </div>
            <div>
                <p class="lead">Nombre: </p>
                <input type="text" class="lead" id="name" name="name" onkeypress ="return validateCreateForm();" required>
            </div>
            <div>
                <p class="lead">Descripción:</p>
                <input type="text" class="lead" id="description" name="description" onkeypress ="return validateCreateForm();">
            </div>
            <div>
                <p class="lead">Carnet de maestro: </p>
                <input type="text" class="lead" id="idteacher" name="idteacher" onkeypress ="return validateCreateForm();" required>
            </div>
            
            <div class="lead">
                <input type="hidden" value="1" name="type" id="type">
                <input type="button" class="btn btn-primary" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendDataCourse()" value="Guardar">
                <!--input type="submit" class="btn btn-primary" id="sendStudentData"  onclick="sendDataCourse(event)" value="Guardar"-->
              
            </div>
        </form>
    </div>

<?php
include_once '../../components/footer.php';
?>