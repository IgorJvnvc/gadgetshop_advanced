<?php
header("Content-type: application/json");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../konekcija/konekcija.php";
    include "functions.php";

    try{

        $limit = $_POST['limit'];

        $telefoni = sviTelefoni($limit);
        $brojStranica = vratiBrojStranica();

        echo json_encode([
            "telefoni" => $telefoni,
            "brojStranica" => $brojStranica
        ]);
        http_response_code(200);


    }
    catch(PDOException $exception){
        http_response_code(500);
    }
}
else{
    http_response_code(404);
}
?>