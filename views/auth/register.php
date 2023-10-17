<?php
include_once '../../components/header.php';
?>

<?php
include_once '../../components/navbar.php';
?>
    <div class="container jumbotron">
        <div class="container-center">
            <h2>Creación de usuarios</h2>
            <!--<form method="post" action="process.php">-->
            <form>
                <div>
                    <p class="lead">Nombre: </p>
                    <input type="text" class="lead" name="name" id="name">
                </div>
                <div>
                    <input type="hidden" value = "2" class="lead" name="role" id="role">
                </div>
                <div>
                    <p class="lead">Contraseña:</p>
                    <input type="password" class="lead" name="password" id="password">
                </div>
                <div class="lead">
                    <input type="hidden" value="1" name="authType" id="authType">
                    <input type="button" class="btn btn-primary" id="createUser" data-toggle="modal"
                           data-target="#messageModal" onclick="registerUser()" value="Registrar usuario">
                </div>
            </form>
        </div>
    </div>

<?php
include_once '../../components/footer.php';
?>