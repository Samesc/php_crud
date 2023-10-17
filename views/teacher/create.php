<?php
include_once '../../components/header.php';
?>

<?php
include_once '../../components/navbar.php';
?>
<?php
if (!isset($_SESSION["user"])) {
    header("Location:../../views/auth/login.php");
}
?>
<?php
if ($_SESSION["role"] != 1) {
    header("Location:../../views/home/home.php");
}
?>
    <div class="container jumbotron">
        <h2>Creación de maestros</h2>
        <form id="sendDatafrom">
            <div>
                <p class="lead">Carnet:</p>
                <input type="text" class="lead" id = "id" name="id" required onkeypress="return valideKey(event);">
                <span class="lead" id="idMessage"></span>
            </div>
            <div>
                <p class="lead">Primer nombre: </p>
                <input type="text" class="lead" id="firstName" name="firstName" onkeypress ="validateCreateForm();" required>
            </div>
            <div>
                <p class="lead">Segundo nombre:</p>
                <input type="text" class="lead" id="secondName" name="secondName">
            </div>
            <div>
                <p class="lead">Primer apellido: </p>
                <input type="text" class="lead" id="lastName" name="lastName"   onkeypress ="validateCreateForm();" required>
            </div>
            <div>
                <p class="lead">Segundo apellido:</p>
                <input type="text" class="lead" id="secondLastName" name="secondLastName">
            </div>
            
            <div>
                <p class="lead">Fecha de nacimiento: </p>
                <input type="date" class="lead" id="date" name="date"  onkeypress ="validateCreateForm();" required>
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