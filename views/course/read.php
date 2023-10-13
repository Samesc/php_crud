<?php
include_once '../../components/header.php';
?>
    <body>

<?php
include_once '../../components/navbar.php';
?>

<?php
include_once '../../backend/database.php';
$result = mysqli_query($conn, "SELECT * FROM course INNER JOIN teacher ON teacher.idteacher = course.idteacher");
?>

    <div class="container jumbotron">
        <h2>Listado de cursos</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>

                <tr>
                    <td>Código</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Carnet maestro</td>
                    <td>Maestro asignado</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["idcourse"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["idteacher"]; ?></td>
                        <td><?php echo $row["firstName"]; ?> <?php echo $row["lastName"]; ?> </td>
                         <td>
                            <a class="btn btn-success" href="update.php?id=<?php echo $row["idcourse"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"  href="delete.php?idcourse=<?php echo $row["idcourse"]; ?>">Borrar</a>
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