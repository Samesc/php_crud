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
$result = mysqli_query($conn,"SELECT * FROM assignment WHERE idstudent='" . $_GET['idstudent'] . "' AND idcourse='" . $_GET['idcourse'] . "' ");
$row= mysqli_fetch_array($result);
?>

<div class="container jumbotron">
    <h2>Eliminación de estudiantes</h2>
    <form method="post" action="process.php">
        
        <input type="hidden" value="<?php echo $row['idstudent']; ?>" name="tempidstudent" id="tempidstudent">
        <input type="hidden" value="<?php echo $row['idcourse']; ?>" name="tempidcourse" id="tempidcourse">
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
            <input type="button" class="btn btn-danger" name="submit" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="deletesendDataAssignment()" value="Borrar">
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>