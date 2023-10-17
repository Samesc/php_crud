<?php
include_once '../../components/header.php';
?>

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

$resultcourse = mysqli_query($conn,"SELECT * FROM course");
$resultstudent = mysqli_query($conn,"SELECT * FROM student");
?>

    <div class="container jumbotron">
        <h2>Asignación de cursos</h2>
        <form id="sendDatafrom">
        <div class="div">
                
                <p class="lead">Carnet estudiante: </p>
                <?php
                if (mysqli_num_rows($resultstudent) > 0) {
                ?>
                    <select id = "idstudent" name = "idstudent" >

                    
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
                    
                    <option value="apple">NO EXINTEN MAESTROS</option>
                    <?php }
                ?>
                
            </div>
            <div class="div">
                
                <p class="lead">Código de carnet: </p>
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
                    
                    <option value="apple">NO EXINTEN MAESTROS</option>
                    <?php }
                ?>
                
            </div>
  
                  
            <!--div>
                <p class="lead">Id estudiante: </p>
                <input type="text" class="lead" id="idstudent" name="idstudent"  onkeypress="return valideKey(event);" required>
            </div>
            <div>
                <p class="lead" >Id curso:</p>
                <input type="text" class="lead" id="idcourse" name="idcourse" onkeypress="return valideKey(event);">
            </div-->
            
            <div class="lead">
                <input type="hidden" value="1" name="type" id="type">
                <input type="button" class="btn btn-primary" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendDataAssignment()" value="Guardar">
                
                <!--input type="button" class="btn btn-primary" id="sendStudentData"  onclick="sendDataAssignment()" value="Asignar"-->
            </div>
        </form>
    </div>

<?php
include_once '../../components/footer.php';
?>