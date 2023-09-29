<?php
include_once 'components/header.php';
?>

<?php
include_once 'components/navbar.php';
?>

    <div class="container jumbotron">
        <h2>Creación de estudiantes</h2>
        <form method="post" action="process.php">
            <div>
                <p class="lead">Carnet:</p>
                <input type="text" class="lead" name="id">
            </div>
            <div>
                <p class="lead">Primer nombre: </p>
                <input type="text" class="lead" name="firstName">
            </div>
            <div>
                <p class="lead">Primer apellido:</p>
                <input type="text" class="lead" name="lastName">
            </div>
            <div class="lead">
                <input type="hidden" value="1" name="type">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
            </div>
        </form>
    </div>

<?php
include_once 'components/footer.php';
?>