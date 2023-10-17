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
$sql = "select course.nombre, course.idcourse, student.idstudent, student.firstName, student.lastName FROM assignment INNER JOIN student on student.idstudent = assignment.idstudent INNER JOIN course ON course.idcourse = assignment.idcourse AND assignment.idstudent='" . $_GET['idstudent'] . "' AND assignment.idcourse='" . $_GET['idcourse'] . "' ";
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_array($result);

$resultcourse = mysqli_query($conn,"SELECT * FROM course");
$resultstudent = mysqli_query($conn,"SELECT * FROM student");
?>

<div class="container jumbotron">
    <h2>Actualización de estudiantes</h2>
    <form method="post" action="process.php">
        
        <input type="hidden" value="<?php echo $row['idstudent']; ?>" name="tempidstudent" id="tempidstudent">
        <input type="hidden" value="<?php echo $row['idcourse']; ?>" name="tempidcourse" id="tempidcourse">
        <div class="div">
                
                <p class="lead">Carnet estudiante: </p>
                <?php
                if (mysqli_num_rows($resultstudent) > 0) {
                ?>
                    <select id = "idstudent" name = "idstudent" >

                    <option selected value = "<?php echo $row["idstudent"]; ?>" class="lead" ><?php echo $row["idstudent"]; ?> <?php echo $row["firstName"]; ?> <?php echo $row["lastName"]; ?></option>
                    
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($resultstudent)) {
                            ?>
            
                            <option value = "<?php echo $row["idstudent"]; ?>" class="lead" ><?php echo $row["idstudent"]; ?> <?php echo $row["firstName"]; ?> <?php echo $row["lastName"]; ?></option>
                            <?php
                            $i++;
                        }
                        ?>
                    </select >
                    <?php
                } else { ?>
                    
                    <option value="apple">NO EXINTEN Estudiantes</option>
                    <?php }
                ?>
                
            </div>
            <div class="div">
                
                <p class="lead">Código de curso: </p>
                <?php
                if (mysqli_num_rows($resultcourse) > 0) {
                ?>
                    <select id = "idcourse" name = "idcourse" >
   
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($resultcourse)) {
                            ?>
            
                            <option value = "<?php echo $row["idcourse"]; ?>" class="lead" ><?php echo $row["idcourse"]; ?> <?php echo $row["nombre"]; ?> </option>
                            <?php
                            $i++;
                        }
                        ?>
                    </select >
                    <?php
                } else { ?>
                    
                    <option value="apple">NO EXINTEN CURSOS</option>
                    <?php }
                ?>
                
            </div>
        <!--div>
            <p class="lead">Id estudiantes: </p>
            <input type="text" class="lead" name="idstudent" id="idstudent"  onkeypress="return validateAssigmentForm();" value="<?php echo $row['idstudent']; ?>" required>
        </div>
        
        <div>
            <p class="lead">Id curso: </p>
            <input type="text" class="lead" name="idcourse" id="idcourse"  onkeypress="return validateAssigmentForm();" value="<?php echo $row['idcourse']; ?>">
        </div-->
    
        <div class="lead">
            <input type="hidden" value="2" name="type" id="type">
            <input type="button" class="btn btn-primary" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="updateDataAssignment()" value="Guardar">
        </div>
    </form>
</div>

<?php
include_once '../../components/footer.php';
?>