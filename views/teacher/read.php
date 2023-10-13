<?php
include_once '../../components/header.php';
?>
    <body>

<?php
include_once '../../components/navbar.php';
?>

<?php
include_once '../../backend/database.php';
$result = mysqli_query($conn, "SELECT * FROM teacher");
?>

    <div class="container jumbotron">
        <h2>Listado de maestros</h2>
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
                        <td><?php echo $row["idteacher"]; ?></td>
                        <td><?php echo $row["firstName"]; ?> <?php echo $row["secondName"]; ?></td>
                        <td><?php echo $row["lastName"]; ?> <?php echo $row["secondLastName"]; ?></td>
                        <td><?php echo date('d-m-Y', $row["birthdate"]); ?></td>
                        <td><?php echo (date('Y') - date('Y', $row["birthdate"]) ); ?></td>
                        <td>
                            <a class="btn btn-success" href="update.php?id=<?php echo $row["idteacher"]; ?>">Actualizar</a>
                            <a class="btn btn-danger"  href="delete.php?idteacher=<?php echo $row["idteacher"]; ?>">Borrar</a>
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