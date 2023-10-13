<?php
include_once '../../components/header.php';
?>
<body>

<?php
include_once '../../components/navbar.php';
?>

<?php
include_once '../../backend/database.php';
$result = mysqli_query($conn,"SELECT * FROM course WHERE idcourse='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>

<div class="container jumbotron">
    <h2>Actualización de cursos</h2>
    <form id="sendDatafrom">
        <div>
            <p class="lead">Código:</p>
            <input readonly type="text" class="lead" name="id" id="id" value="<?php echo $row['idcourse']; ?>">
        </div>
        <div>
            <p class="lead">Nombre: </p>
            <input type="text" class="lead" name="name" id="name" value="<?php echo $row['nombre']; ?>" onkeypress ="return validateCreateForm();" required>
        </div>
        
        <div>
            <p class="lead">Descripcion: </p>
            <input type="text" class="lead" name="description"id="description"  value="<?php echo $row['description']; ?>" onkeypress ="return validateCreateForm();" >
        </div>
        
        <div>
            <p class="lead">Id maestro: </p>
            <input type="text" class="lead" name="lastName" id="idteacher" value="<?php echo $row['idteacher']; ?>" onkeypress ="return validateCreateForm();" required>
        </div>
        <div class="lead">
            <input type="hidden" value="2" name="type" id="type">
            <input type="button" class="btn btn-success" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendDataCourse()"  value="Actualizar">
        
            <!--input type="submit" class="btn btn-success" id="sendStudentData"  onclick="sendDataCourse()"  value="Actualizar"-->
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>