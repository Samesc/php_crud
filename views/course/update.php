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
$result = mysqli_query($conn,"SELECT * FROM course INNER JOIN teacher ON teacher.idteacher = course.idteacher AND course.idcourse='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<?php
include_once '../../backend/database.php';
$resultMaestro = mysqli_query($conn,"SELECT * FROM teacher");

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
        
              
        <div class="div">
                
                <p class="lead">Carnet de maestro: </p>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <select id = "idteacher" name = "idteacher" >

                    
                        <option selected value = "<?php echo $row["idteacher"]; ?>" class="lead" ><?php echo $row["idteacher"]; ?> <?php echo $row["firstName"]; ?> <?php echo $row["lastName"]; ?></option>
                        <?php
                        $i = 0;
                        while ($rowMaestro = mysqli_fetch_array($resultMaestro)) {
                            ?>
            
                            <option value = "<?php echo $rowMaestro["idteacher"]; ?>" class="lead" ><?php echo $rowMaestro["idteacher"]; ?> <?php echo $rowMaestro["firstName"]; ?> <?php echo $rowMaestro["lastName"]; ?></option>
                            <?php
                            $i++;
                        }
                        ?>
                    </select >
                    <?php
                } else { ?>
                    
                    <option value="apple">NO EXINTEN MAESTROS</option>
                    <?php }
                ?>
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