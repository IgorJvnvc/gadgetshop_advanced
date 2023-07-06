 <?php
 session_start();
 header("Content-type: application/json");
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     include "../konekcija/konekcija.php";
     include "functions.php";

     try{
     $name = $_POST['name'];
     $lName = $_POST['lName'];
     $username = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $id_uloga="1";
     $sifPassword = md5($password);
     $unosKorisnika = unosKorisnika ($name,$lName,$username,$email,$sifPassword,$id_uloga);
    if($unosKorisnika){
        $odgovor= ["poruka"=>"Uspesna registracija"];

        echo json_encode($odgovor);
        http_response_code(201);
    }

     }
     catch(PDOException $exception){
         var_dump($exception);
         http_response_code(500);
     }
 }
 else{
     http_response_code(404);
 }
 ?>


