<?php
include_once '../../components/header.php';
?>
<body>

<?php
include_once '../../components/navbar.php';
?>
<?php
if (!isset($_SESSION["user"])) {
    header("Location:../../views/auth/login.php");
}
?>
<?php
include_once '../../backend/database.php';
$result = mysqli_query($conn,"SELECT * FROM student WHERE idstudent='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
$birthdate = date('Y-m-d', $row["birthdate"]);
?>

<div class="container jumbotron">
    <h2>Actualización de estudiantes</h2>
    <form id="sendDatafrom">
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" id="id" value="<?php echo $row['idstudent']; ?>">
        </div>
        <div>
            <p class="lead">Primer nombre: </p>
            <input type="text" class="lead" name="firstName" id="firstName" value="<?php echo $row['firstName']; ?>" onkeypress ="return validateCreateForm();" required>
        </div>
        
        <div>
            <p class="lead">Segundo nombre: </p>
            <input type="text" class="lead" name="secondName" id="secondName" value="<?php echo $row['secondName']; ?>">
        </div>
        
        <div>
            <p class="lead">Primer apellido: </p>
            <input type="text" class="lead" name="lastName" id="lastName" value="<?php echo $row['lastName']; ?>" onkeypress ="return validateCreateForm();" required>
        </div>
        <div>
            <p class="lead">Segundo apellido:</p>
            <input type="text" class="lead" name="secondLastName" id="secondLastName" value="<?php echo $row['secondLastName']; ?>">
        </div>
        
        <div>
            <p class="lead">Fecha de nacimiento:</p>
            <input type="date" class="lead" name="date" id="date" value="<?php echo $birthdate ?>" onkeypress ="return validateCreateForm();" required>
        </div>
        <div class="lead">
            <input type="hidden" value="2" name="type" id="type">
            <input type="button" class="btn btn-success" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendData()"  value="Actualizar">

            <!--input type="submit" class="btn btn-success" id="sendStudentData" onclick="sendData()"  value="Actualizar"-->
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>