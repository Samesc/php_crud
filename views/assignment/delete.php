<?php
include_once '../../components/header.php';
?>
<body>

<?php
include_once '../../components/navbar.php';
?>

<?php
include_once '../../backend/database.php';
$result = mysqli_query($conn,"SELECT * FROM assignment WHERE idassignment='" . $_GET['idassignment'] . "'");
$row= mysqli_fetch_array($result);
?>

<div class="container jumbotron">
    <h2>Eliminación de estudiantes</h2>
    <form method="post" action="process.php">
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" id = "id" value="<?php echo $row['idassignment']; ?>">
        </div>
        <div>
            <p class="lead">Primer nombre: </p>
            <input readonly type="text" class="lead" name="idstudent" id="idstudent" value="<?php echo $row['idstudent']; ?>">
        </div>
        
        <div>
            
        <p class="lead">Segundo nombre: </p>
            <input readonly type="text" class="lead" name="idcourse" id="idcourse" value="<?php echo $row['idcourse']; ?>">
        </div>

        <div class="lead">
            <input type="hidden" value="3" name="type" id="type">
            <input type="button" class="btn btn-danger" name="submit" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="UpDelsendDataAssignment()" value="Borrar">
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>