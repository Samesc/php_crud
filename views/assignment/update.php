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
    <h2>Actualización de estudiantes</h2>
    <form method="post" action="process.php">
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" id="id" value="<?php echo $row['idassignment']; ?>">
        </div>
        <div>
            <p class="lead">Id esetudiante: </p>
            <input type="text" class="lead" name="idstudent" id="idstudent"  onkeypress="return validateAssigmentForm();" value="<?php echo $row['idstudent']; ?>" required>
        </div>
        
        <div>
            <p class="lead">Id curso: </p>
            <input type="text" class="lead" name="idcourse" id="idcourse"  onkeypress="return validateAssigmentForm();" value="<?php echo $row['idcourse']; ?>">
        </div>
    
        <div class="lead">
            <input type="hidden" value="2" name="type" id="type">
            <input type="button" class="btn btn-primary" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="UpDelsendDataAssignment()" value="Guardar">
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>