<?php
include_once '../../backend/database.php';


$data = json_decode(file_get_contents("php://input"));


if (isset($data)) {

    $id = $data->id;
    $nameCourse = $data->nameCourse;
    $description = $data->description;
    $idteacher = $data->idteacher;
    $type = $data->type;

    if ($type == 1) {
        try{
            if(!$nameCourse){
                throw new Exception();
            }
         $sql = "INSERT INTO course (idcourse, nombre, description, idteacher) VALUES ($id, '$nameCourse', '$description', '$idteacher')";
         mysqli_query($conn, $sql);
         echo json_encode(array("success"=>true, "message"=>"Curso creado con éxito."));
        }catch(mysqli_sql_exception $e){
            if(mysqli_errno($conn) == 1064){

                echo json_encode(array("success"=>false, "message"=>"Error: Faltan valores por rellenar"));
            }elseif(mysqli_errno($conn) == 1366){
                
                echo json_encode(array("success"=>false, "message"=>"Error: Asigne un maestro"));
            }elseif(mysqli_errno($conn) == 1062){
                
                echo json_encode(array("success"=>false, "message"=>"Error: Código en uso"));
            }
            elseif(mysqli_errno($conn) == 1452){
                
                echo json_encode(array("success"=>false, "message"=>"Error: Carnet de maestro invalido"));
            }
            else{
                echo json_encode(array("success"=>false, "message"=>"Ha ocurrido un error al momento de crear el curso. Error" .  mysqli_errno($conn)));
            }
            
           }catch(Exception $e){
            
            echo json_encode(array("success"=>false, "message"=>"Error: Faltan valores por rellenar"));
    
           }
       
        mysqli_close($conn);

    } else if ($type == 2) {

        try{
            if(!$nameCourse){
                throw new Exception();
            }
        
            $sql = "UPDATE course SET 
                nombre = '$nameCourse', description = '$description',
                idteacher = '$idteacher'
                WHERE idcourse = $id";
         mysqli_query($conn, $sql);
         echo json_encode(array("success"=>true, "message"=>"Curso creado con éxito."));
        }catch(mysqli_sql_exception $e){
            if(mysqli_errno($conn) == 1064){

                echo json_encode(array("success"=>false, "message"=>"Error: Faltan valores por rellenar"));
            }elseif(mysqli_errno($conn) == 1366){
                
                echo json_encode(array("success"=>false, "message"=>"Error: Asigne un maestro"));
            }elseif(mysqli_errno($conn) == 1062){
                
                echo json_encode(array("success"=>false, "message"=>"Error: Código en uso"));
            }
            elseif(mysqli_errno($conn) == 1452){
                
                echo json_encode(array("success"=>false, "message"=>"Error: Carnet de maestro invalido"));
            }
            else{
                echo json_encode(array("success"=>false, "message"=>"Ha ocurrido un error al momento de crear el curso. Error" .  mysqli_errno($conn)));
            }
            
           }catch(Exception $e){
            
            echo json_encode(array("success"=>false, "message"=>"Error: Faltan valores por rellenar"));
    
           }
       
        mysqli_close($conn);

    } else if ($type == 3) {
        try{
          $sql = "DELETE FROM course WHERE idcourse = $id";
            mysqli_query($conn, $sql);

            echo json_encode(array("success"=>true, "message"=>"Curso borrado con éxito."));
        } catch(mysqli_sql_exception $e) {  
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_error($conn)));
        }
        mysqli_close($conn);
    }
}
?>
