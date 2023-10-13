<?php
include_once '../../components/header.php';
?>

<?php
include_once '../../components/navbar.php';
?>

    <div class="container jumbotron">
        <h2>Asignación de cursos</h2>
        <form id="sendDatafrom">
            <div>
                <p class="lead">Id estudiante: </p>
                <input type="text" class="lead" id="idstudent" name="idstudent"  onkeypress="return valideKey(event);" required>
            </div>
            <div>
                <p class="lead" >Id curso:</p>
                <input type="text" class="lead" id="idcourse" name="idcourse" onkeypress="return valideKey(event);">
            </div>
            
            <div class="lead">
                <input type="hidden" value="1" name="type" id="type">
                <input type="button" class="btn btn-primary" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendDataAssignment()" value="Guardar">
                
                <!--input type="button" class="btn btn-primary" id="sendStudentData"  onclick="sendDataAssignment()" value="Asignar"-->
            </div>
        </form>
    </div>

<?php
include_once '../../components/footer.php';
?>