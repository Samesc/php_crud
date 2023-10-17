<?php
include_once '../../backend/database.php';

session_start();

// Read POST data
$data = json_decode(file_get_contents("php://input"));

if (isset($data)) {

    $auth = $data->auth;

    if ($auth == 1) {
        try{
            $username = $data->name;
            $password = $data->password;
            $role = $data->role;

            if($username == "" || $password == "" || $role == ""){
                throw new Exception();
            }
            $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

            mysqli_query($conn, $sql);
            echo json_encode(array("success" => true, "message" => "Usuario creado con éxito."));
 
        }catch(mysqli_sql_exception $e){

            echo json_encode(array("success" => false, "message" => "Error: " . $sql . " " . mysqli_error($conn)));
        }catch(Exception $e){
            echo json_encode(array("success" => false, "message" => "Error: Llene todos los campos"));
        }

        mysqli_close($conn);
    } else if ($auth == 2) {
        try{
            $user = $data->user;
            $password = $data->password;


            if($user == ""){
                throw new Exception();
            }
            $sql = "SELECT * FROM users WHERE username='" . $user . "' AND password = '" . $password . "'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION["user"] = $row['iduser'];
                $_SESSION["username"] = $row['username'];
                $_SESSION["role"] = $row['role'];
                echo json_encode(array("success" => true, "message" => "Usuario encontrado"));
            } else {
                echo json_encode(array("success" => false, "message" => "Usuario no encontrado"));
            }
        }catch(mysqli_sql_exception $e){
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_errno($conn)));       
        }catch(Exception $e){
            echo json_encode(array("success"=>false, "message"=>"Error: Rellene todos los datos"));       
        }
        
        mysqli_close($conn);
    } else if ($auth == 3) {

        unset($_SESSION["user"]);
        unset($_SESSION["name"]);
        unset($_SESSION["role"]);

        session_destroy();

        echo json_encode(array("success" => true, "message" => "Sesión borrada"));

    }
}