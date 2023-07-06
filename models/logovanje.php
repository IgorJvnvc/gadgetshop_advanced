<?php
session_start();
header("Content-type: application/json");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../konekcija/konekcija.php";
    include "functions.php";

    try{
        $username= $_POST['username'];
        $lozinka= $_POST['password'];
        $sifPassword= md5($lozinka);

        $rezLogovanja= rezLogovanja($username,$sifPassword);
if($rezLogovanja){
    $_SESSION['korisnik']= $rezLogovanja;
    $odgovor = ["nazivUloge"=>$rezLogovanja->uloga];

    echo json_encode($odgovor);
    http_response_code(200);

}
    }
    catch(PDOException $exception){

        http_response_code(500);
    }
}
else{
    http_response_code(404);
}

?>


