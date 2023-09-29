<?php
include_once 'components/header.php';
?>
<body>

<?php
include_once 'components/navbar.php';
?>

<?php
include_once 'backend/database.php';
$result = mysqli_query($conn,"SELECT * FROM student WHERE ID='" . $_GET['ID'] . "'");
$row= mysqli_fetch_array($result);
?>

<div class="container jumbotron">
    <h2>Eliminación de estudiantes</h2>
    <form method="post" action="process.php">
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" value="<?php echo $row['ID']; ?>">
        </div>
        <div>
            <p class="lead">Nombres: </p>
            <input readonly type="text" class="lead" name="firstName" value="<?php echo $row['First_Name']; ?>">
        </div>
        <div>
            <p class="lead">Apellidos:</p>
            <input readonly type="text" class="lead" name="lastName" value="<?php echo $row['Last_Name']; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="3" name="type">
            <input type="submit" class="btn btn-danger" name="submit" value="Borrar">
        </div>
    </form>
</div>

<?php
include_once 'components/footer.php';
?>