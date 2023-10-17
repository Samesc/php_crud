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
if ($_SESSION["role"] != 1) {
    header("Location:../../views/home/home.php");
}
?>

<?php
include_once '../../backend/database.php';
$result = mysqli_query($conn,"SELECT * FROM course INNER JOIN teacher ON idcourse='" . $_GET['idcourse'] . "' AND course.idteacher = teacher.idteacher");
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
            <input readonly type="text" class="lead" name="date" id="idteacher" value="<?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="3" name="type" id="type">
            <input type="button" class="btn btn-danger" name="submit" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="DELsendDataCourse()" value="Borrar">
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>