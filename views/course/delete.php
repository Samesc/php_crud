<?php
include_once '../../components/header.php';
?>
<body>

<?php
include_once '../../components/navbar.php';
?>

<?php
include_once '../../backend/database.php';
$result = mysqli_query($conn,"SELECT * FROM course WHERE idcourse='" . $_GET['idcourse'] . "'");
$row= mysqli_fetch_array($result);
?>

<div class="container jumbotron">
    <h2>Eliminación de curso</h2>
    <form method="post" action="process.php">
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" id="id" value="<?php echo $row['idcourse']; ?>">
        </div>
        <div>
            <p class="lead">Nombre: </p>
            <input readonly type="text" class="lead" name="firstName" id="name" value="<?php echo $row['nombre']; ?>">
        </div>
        <div>
            <p class="lead">Descripcion:</p>
            <input readonly type="text" class="lead" name="lastName" id="description" value="<?php echo $row['description']; ?>">
        </div>
        <div>
            <p class="lead">Maestro asignado: </p>
            <input readonly type="text" class="lead" name="date" id="idteacher" value="<?php echo $row['idteacher']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="3" name="type" id="type">
            <input type="button" class="btn btn-danger" name="submit" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendDataCourse()" value="Borrar">
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>