<?php
include_once '../../components/header.php';
?>

<?php
include_once '../../components/navbar.php';
?>

<?php
if (isset($_SESSION["user"])) {
    header("Location:../../views/home/home.php");
}
?>

    <div class="container jumbotron">
        <div class="container-center">
            <h2>Ingreso de usuarios</h2>
            <!--<form method="post" action="process.php">-->
            <form>
                <div>
                    <p class="lead">Usuario:</p>
                    <input type="text" class="lead" name="user" id="user">
                    <span class="lead" id="idMessage"></span>
                </div>
                <div>
                    <p class="lead">Contraseña:</p>
                    <input type="password" class="lead" name="password" id="password">
                </div>
                <div class="lead">
                    <input type="hidden" value="2" name="authType" id="authType">
                    <input type="button" class="btn btn-primary" id="createUser" onclick="login()"
                           value="Ingresar">
                </div>
                <div class="lead">
                    <span class="lead" id="resultMessage"> </span>
                </div>
            </form>
        </div>
    </div>
<?php
include_once '../../components/footer.php';
?>