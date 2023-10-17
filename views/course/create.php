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
if ($_SESSION["role"] != 1) {
    header("Location:../../views/home/home.php");
}
?>

<?php
include_once '../../backend/database.php';

$result = mysqli_query($conn,"SELECT * FROM teacher");
?>
    <div class="container jumbotron">
        <h2>Creación de cursos</h2>
        <form id="sendDatafrom">
            <div>
                <p class="lead">Códgo:</p>
                <input type="text" class="lead" id = "id" name="id" required onkeypress="return valideKey(event);">
                <span class="lead" id="idMessage"></span>
            </div>
            <div>
                <p class="lead">Nombre: </p>
                <input type="text" class="lead" id="name" name="name" onkeyup ="return validateCreateForm();" required>
            </div>
            <div>
                <p class="lead">Descripción:</p>
                <input type="text" class="lead" id="description" name="description" onkeypress ="return validateCreateForm();">
            </div>
            <div>
                <!--p class="lead">Carnet de maestro: </p>
                <input type="text" class="lead" id="idteacher" name="idteacher" onkeypress ="return validateCreateForm();" required-->
            </div>
            
            <div class="div">
                
                <p class="lead">Carnet de maestro: </p>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <select id = "idteacher" name = "idteacher" >

                    
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
            
                            <option value = "<?php echo $row["idteacher"]; ?>" class="lead" ><?php echo $row["idteacher"]; ?> <?php echo $row["firstName"]; ?> <?php echo $row["lastName"]; ?></option>
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
                <input type="hidden" value="1" name="type" id="type">
                <input type="button" class="btn btn-primary" id="sendStudentData"  data-toggle="modal" data-target="#messageModal" onclick="sendDataCourse()" value="Guardar">
                <!--input type="submit" class="btn btn-primary" id="sendStudentData"  onclick="sendDataCourse(event)" value="Guardar"-->
              
            </div>
        </form>
    </div>

<?php
include_once '../../components/footer.php';
?>