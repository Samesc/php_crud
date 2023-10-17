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
$result = mysqli_query($conn,"SELECT * FROM teacher WHERE idteacher='" . $_GET['idteacher'] . "'");
$row= mysqli_fetch_array($result);
$birthdate = date('Y-m-d', $row["birthdate"]);
?>

<div class="container jumbotron">
    <h2>Eliminación de maestros</h2>
    <form method="post" action="process.php">
        <div>
            <p class="lead">Carnet:</p>
            <input readonly type="text" class="lead" name="id" id ="id" value="<?php echo $row['idteacher']; ?>">
        </div>
        <div>
            <p class="lead">Primer nombre: </p>
            <input readonly type="text" class="lead" name="firstName" id ="firstName" value="<?php echo $row['firstName']; ?>">
            <p type="hidden" value="3" name="type" id="secondName"></p>
        </div>
        <div>
            <p class="lead">Segudno nombre:</p>
            <input readonly type="text" class="lead" name="secondName" id ="secondName" value="<?php echo $row['secondName']; ?>">
            
        </div>
        <div>
            <p class="lead">Primer apellido:</p>
            <input readonly type="text" class="lead" name="lastName" id ="lastName"value="<?php echo $row['lastName']; ?>">
            
        </div>
        <div>
            <p class="lead">Segundo apellido:</p>
            <input readonly type="text" class="lead" name="lastName" id ="secondLastName" value="<?php echo $row['secondLastName']; ?>">
            
        </div>
        <div>
            <p class="lead">Fecha de nacimiento: </p>
            <input readonly type="text" class="lead" name="date" id ="date"value="<?php echo $birthdate; ?>">
        </div>
        <div class="lead">
            <input type="hidden" value="3" name="type" id="type">
            <input type="button" class="btn btn-danger" name="submit" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendData()" value="Borrar">
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>