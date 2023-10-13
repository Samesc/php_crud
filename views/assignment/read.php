<?php
include_once '../../components/header.php';
?>
    <body>

<?php
include_once '../../components/navbar.php';
?>

<?php
include_once '../../backend/database.php';
$result = mysqli_query($conn, "SELECT * FROM assignment");
?>

    <div class="container jumbotron">
        <h2>Asignación</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>ID</td>
                    <td>Carnet estudiante</td>
                    <td>Código curso</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["idassignment"]; ?></td>
                        <td><?php echo $row["idstudent"]; ?></td>
                        <td><?php echo $row["idcourse"]; ?></td>
                         <td>
                            <a class="btn btn-success" href="update.php?idassignment=<?php echo $row["idassignment"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"  href="delete.php?idassignment=<?php echo $row["idassignment"]; ?>">Borrar</a>
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