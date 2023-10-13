<?php
include_once '../../components/header.php';
?>
    <body>

<?php
include_once '../../components/navbar.php';
?>

<?php
include_once '../../backend/database.php';
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
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Fecha de nacimiento</td>
                    <td>Edad</td>
                    <td>Acciones</td>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["idstudent"]; ?></td>
                        <td><?php echo $row["firstName"]; ?> <?php echo $row["secondName"]; ?></td>
                        <td><?php echo $row["lastName"]; ?> <?php echo $row["secondLastName"]; ?></td>
                        <td><?php echo date('d-m-Y', $row["birthdate"]); ?></td>
                        <td><?php echo (date('Y') - date('Y', $row["birthdate"]) ); ?></td>
                        <td>
                            <a class="btn btn-success" href="update.php?id=<?php echo $row["idstudent"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"  href="delete.php?idstudent=<?php echo $row["idstudent"]; ?>">Borrar</a>
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