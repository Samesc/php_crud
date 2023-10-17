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

$result = mysqli_query($conn, "SELECT * FROM assignment INNER JOIN student ON student.idstudent = assignment.idstudent INNER JOIN school_db.course ON course.idcourse = assignment.idcourse");
?>

    <div class="container jumbotron">
        <h2>Asignación</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>Carnet estudiante</td>
                    
                    <td>Nombres estudiante</td>
                    <td>Apellidos estudiante</td>
                    <td>Código curso</td>
                    <td>Nombre curso</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["idstudent"]; ?></td>
                        <td><?php echo $row["firstName"]; ?></td>
                        <td><?php echo $row["lastName"]; ?></td>
                        <td><?php echo $row["idcourse"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                         <td>
                            <a class="btn btn-success" href="update.php?idstudent= <?php echo$row["idstudent"];?>&idcourse=<?php echo$row["idcourse"];?>">Actualizar</a>
                            <a class="btn btn-danger"  href="delete.php?idstudent=<?php echo$row["idstudent"];?>&idcourse=<?php echo$row["idcourse"];?>">Borrar</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </table>
            <?php
        } else {
            echo "No hay resultados";
        }
        ?>
    </div>

<?php
include_once '../../components/footer.php';
?>