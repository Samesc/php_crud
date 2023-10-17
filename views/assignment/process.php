<?php
include_once '../../backend/database.php';


$data = json_decode(file_get_contents("php://input"));


if (isset($data)) {

    $type = $data->type;

    if ($type == 1) {
        try{
            $idstudent = $data->idstudent;
            $idcourse =  $data->idcourse;
            if($idstudent == "" || $idcourse == ""){
                throw new Exception("ESTOS DATOS NO PUEDEN QUEDAR VACIOS");
            }
            $sql = "CALL assignacion($idstudent, $idcourse)";
            mysqli_query($conn, $sql);
            echo json_encode(array("success"=>true, "message"=>"Assignacion creada correctamente."));
        
        }catch(mysqli_sql_exception $e) {  
            if(mysqli_errno($conn) == 1370){
                echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_errno($conn)));

            }elseif(mysqli_errno($conn) == 1064 || mysqli_errno($conn) == 1054 ||  mysqli_errno($conn) ==1452){
                echo json_encode(array("success"=>false, "message"=>"Error: DATOS incorrectos"));
            }elseif(mysqli_errno($conn) == 1062){
                echo json_encode(array("success"=>false, "message"=>"Error: Asignacion ya creada"));
            }
            
            else{
                echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_errno($conn)));
            }
        }catch(Exception $e){
            echo json_encode(array("success"=>false, "message"=>"Error: Llene todos los campos"));
        }
        mysqli_close($conn);

    } else if ($type == 2) {  
        try{
            $tempidstudent = $data->tempidstudent;
            $tempidcourse = $data->tempidcourse;
            $idstudent = $data->idstudent;
            $idcourse = $data->idcourse;
            if($idstudent == "" || $idcourse == ""){
                throw new Exception();
            }
            $sql = "UPDATE assignment SET idstudent = $idstudent, idcourse = $idcourse WHERE (idstudent = $tempidstudent) AND (idcourse = $tempidcourse)";

            mysqli_query($conn, $sql);
            echo json_encode(array("success"=>true, "message"=>"Assignacion actualizado con éxito."));
           
        }catch(mysqli_sql_exception $e){
            if(mysqli_errno($conn) == 1062){
                
                echo json_encode(array("success"=>false, "message"=>"Error: Asignación ya creada"));
            }else{
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_errno($conn)));
            }
        }catch(Exception $e){
            echo json_encode(array("success"=>false, "message"=>"Error: Llene todos los campos"));
      
        }

        mysqli_close($conn);

    } else if ($type == 3) {
        
        $idstudent = $data->idstudent;
        $idcourse = $data->idcourse;
        $sql = "DELETE FROM assignment WHERE idstudent = $idstudent AND idcourse = $idcourse";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("success"=>true, "message"=>"Asignacion borrado con éxito."));

        } else {
            echo json_encode(array("success"=>false, "message"=>"Error: " . $sql . " " . mysqli_error($conn)));
        }
        mysqli_close($conn);
    }
}
?>
