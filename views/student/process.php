<?php
include_once '../../backend/database.php';


$data = json_decode(file_get_contents("php://input"));



if (isset($data)) {

  
    $id = $data->id;
    $first_name = $data->firstName;
    $second_name = $data->secondName;
    $last_name = $data->lastName;
    $second_last_name = $data->secondLastName;
    $date = $data->birthdate;
    $birthdate = strtotime($date);  
    $type = $data->type;


    if ($type == 1) {
        try{
            if(!$id || !$first_name || !$last_name || !$birthdate){
                throw new Exception();
            }
            $sql = "INSERT INTO student (idstudent, firstName, secondName, lastName, secondLastName, birthdate)	 VALUES ($id, '$first_name', '$second_name', '$last_name', '$second_last_name', '$birthdate' )";
            mysqli_query($conn, $sql);
            echo json_encode(array("success"=>true, "message"=>"Estudiante creado correctamente."));
            
        }catch(mysqli_sql_exception $e){
            if(mysqli_errno($conn) == 1062){
                echo json_encode(array("success"=>false, "message"=>"Error: Carnet en uso"));       
            }else{
                echo json_encode(array("success"=>false, "message"=>"Ha ocurrido un error al momento de crear el estudiante. Error " .  mysqli_errno($conn)));

            }
        }catch(Exception $e){
            echo json_encode(array("success"=>false, "message"=>"Error: Llene todos los espacios"));       
        }
        mysqli_close($conn);

    } else if ($type == 2) {
        try{  
            if(!$id || !$first_name || !$last_name || !$birthdate){
                throw new Exception();
            }
          $sql = "UPDATE student SET 
                firstName = '$first_name', secondName = '$second_name',
                lastName = '$last_name', secondLastName = '$second_last_name',
                birthdate = '$birthdate'
                WHERE idstudent = $id";
            mysqli_query($conn, $sql);
            echo json_encode(array("success"=>true, "message"=>"Estudiante actualizado con éxito."));
        } catch(mysqli_sql_exception $e) {  
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_error($conn)));
     
        }catch(Exception $e){
            echo json_encode(array("success"=>false, "message"=>"Error: Llene todos los espacios"));       
        }
        mysqli_close($conn);

    } else if ($type == 3) {
        try{
            $sql = "DELETE FROM student WHERE idstudent = $id";
            mysqli_query($conn, $sql);

            echo json_encode(array("success"=>true, "message"=>"Estudiante borrado con éxito."));

        } catch(mysqli_sql_exception $e) {  
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_error($conn)));
        }
        mysqli_close($conn);
    }
}
?>
