
<?php
session_start();


include "models/functions.php";
$rez= admin1();
$kor=admin2();



if (isset($_SESSION['korisnik'])):
    $korisnik = $_SESSION['korisnik'];
    if($korisnik->uloga == "admin"){

include "views/aphp.php";

        }  endif;







