<?php
include_once '../konekcija/konekcija.php';
global $con;

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $delete = $con->prepare('delete from korisnici where id = :id');
    $delete->execute(array(
        ':id'=>$id
    ));
    header('location: ../index.php?page=admin');
}




?>