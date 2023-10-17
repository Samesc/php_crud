<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/php_crud/">School</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <?php 
        if (isset($_SESSION["user"])) {
        ?>
       
        <?php 
            if ($_SESSION["role"] == 1 || $_SESSION["role"] == 2) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="/php_crud/views/student/create.php">Registrar estudiante<span class="sr-only"></span></a>
                </li>
            
                <?php 
                    if ($_SESSION["role"] == 1) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/php_crud/views/teacher/create.php">Registrar maestro<span class="sr-only"></span></a>
                    </li>
            
                    <li class="nav-item">
                        <a class="nav-link" href="/php_crud/views/course/create.php">Registrar curso<span class="sr-only"></span></a>
                    </li>
        
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="/php_crud/views/assignment/create.php">Asignar cursos<span class="sr-only"></span></a>
                </li>
                <?php 
                    if ($_SESSION["role"] == 1) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/php_crud/views/student/read.php">Listado de estudiantes<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/php_crud/views/teacher/read.php">Listado de maestros <span class="sr-only"></span></a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="/php_crud/views/course/read.php">Listado de cursos<span class="sr-only"></span></a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link" href="/php_crud/views/assignment/read.php">Asignación de cursos<span class="sr-only"></span></a>
                </li>
                
                <li class="nav-item">
                    <input type="hidden" value="3" name="authType" id="authType">                    
                    <input type="button" class="btn btn-primary" id="createUser" onclick="logout()" value="Cerrar sesión">
                </li>
            <?php } ?>
        <?php } else {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="/php_crud/views/auth/register.php">Registrar<span class="sr-only"></span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/php_crud/views/auth/login.php">Iniciar sesión<span class="sr-only"></span></a>
            </li>
            <?php }
                    ?>
        </ul>
    </div>
</nav>








