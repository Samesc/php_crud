<?php
include_once 'components/header.php';
?>
<body>

<?php
include_once 'components/navbar.php';
?>

<div class="container jumbotron">
<?php
include_once 'backend/database.php';
if (isset($_POST['submit'])) {
    if ($_POST['type'] == 1) {
        $id = $_POST['id'];
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];

        $sql = "INSERT INTO student (ID, Last_Name, First_Name)
	 VALUES ($id, '$last_name', '$first_name')";

        echo "<h2>";
        if (mysqli_query($conn, $sql)) {
            echo "Nuevo estudiante creado con éxito.";
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
        echo "</h2>";
    } else if ($_POST['type'] == 2) {
        $id = $_POST['id'];
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $sql = "UPDATE student SET 
                Last_Name = '$last_name', First_Name = '$first_name'
                WHERE ID = $id";

        echo "<h2>";
        if (mysqli_query($conn, $sql)) {
            echo "Estudiante actualizado con éxito.";
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
        echo "</h2>";
    } else if ($_POST['type'] == 3) {
        $id = $_POST['id'];
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $sql = "DELETE FROM student 
                WHERE ID = $id";

        echo "<h2>";
        if (mysqli_query($conn, $sql)) {
            echo "Estudiante borrado con éxito.";
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
        echo "</h2>";
    }
}
?>
</div>
<?php
include_once 'components/footer.php';
?>
