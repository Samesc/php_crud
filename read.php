<?php
include_once 'components/header.php';
?>
    <body>

<?php
include_once 'components/navbar.php';
?>

<?php
include_once 'backend/database.php';
$result = mysqli_query($conn, "SELECT * FROM student");
?>

    <div class="container jumbotron">
        <h2>Listado de estudiantes</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>Carnet</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["identifier"]; ?></td>
                        <td><?php echo $row["first_name"]; ?></td>
                        <td><?php echo $row["last_name"]; ?></td>
                        <td>
                            <a class="btn btn-success" href="update.php?identifier=<?php echo $row["identifier"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"  href="delete.php?identifier=<?php echo $row["identifier"]; ?>">Borrar</a>
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
include_once 'components/footer.php';
?>