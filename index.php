<?php
session_start();
require_once "konekcija/konekcija.php";
include "views/head.php";
include "views/header.php";
if(!isset($_GET['page'])){
    include "views/page/pocetna.php";
}
else {
    switch($_GET['page']){
        
         case 'pocetna':
            include "views/page/pocetna.php";
            break;
        
        
        case 'Galerija':
            include "views/page/Galerija.php";
            break;


        case 'registration':
            include "views/page/registration.php";
            break;

        case 'login':
            include "views/page/login.php";
            break;

        case 'admin':
            include "views/page/admin.php";
            break;

        case 'korpa':
            include "views/page/korpa.php";
            break;



        case 'kontakt':
            include "views/page/kontakt.php";
            break;
        case 'about':
            include "views/page/about.php";
            break;
        default:
            include "views/page/pocetna.php";
            break;
    }
}



include 'views/footer.php';?>





