<?php
define("FON_OFFSET", 4);
function sviTelefoni($limit = 0){
    global $con;

    $upit = "SELECT *  FROM telefon t INNER JOIN marka m ON t.id_marka = m.id_marka INNER JOIN sistem s on s.id_os = t.id_os LIMIT :limit, :offset";

    $select = $con->prepare($upit);

    $limit = ((int) $limit) * FON_OFFSET;
    $select->bindParam(":limit", $limit, PDO::PARAM_INT);

    $offset = FON_OFFSET;
    $select->bindParam(":offset", $offset, PDO::PARAM_INT);

    $select->execute();

    $telefoni = $select->fetchAll();


    return $telefoni;



}



function brojTelefona(){
    global $con;
    $upit = "SELECT COUNT(*) AS broj FROM telefon";
    $podaci = $con->query($upit)->fetch();

    return $podaci;
}
function ispisPoruka(){
    global  $con;
    if(isset($_POST['send'])){

        $ime=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $text=$_POST['message'];
        $reEmail="/^[\w]+(\w.\_\-)*\@[\w]+(\.[\w]+)?(\.[a-z]{2,3})$/";




        if(preg_match($reEmail,$email)) {

            $unesi = $con->prepare('INSERT INTO poruke (id,poruka_ime, poruka_email,poruka_sub, poruka_p) 
values(null ,:poruka_ime,:poruka_email, :poruka_sub, :poruka_p      )');


            try {
                // izvrsavanje upita

                $unesi->execute(array(
                    ':poruka_ime' => $ime,
                    ':poruka_email' => $email,
                    ':poruka_sub' => $subject,
                    ':poruka_p' => $text
                ));


            } catch (PDOException $e) {
                echo $e->getMessage();
            }


        }


    }
    return $unesi;
}

function zaPocetak()
{
    global $con;
    $show = $con->prepare('SELECT * FROM telefon t INNER JOIN marka m ON t.id_marka = m.id_marka INNER JOIN sistem s on s.id_os = t.id_os order by cena LIMIT 10 ;');
    $show->execute();
    $rez = $show->fetchAll();
    return $rez;
}
function admin1(){
    global $con;
    $show= $con->prepare('SELECT * FROM telefon t INNER JOIN marka m ON t.id_marka = m.id_marka INNER JOIN sistem s on s.id_os = t.id_os order by id ; ');
    $show -> execute();
    $rez = $show->fetchAll();
    return $rez;
}
function admin2(){
    global $con;
    $korinsici = $con->prepare('select * from korisnici k inner  join uloga u on k.id_uloga = u.id_uloga');
    $korinsici->execute();
    $kor = $korinsici->fetchAll();
    return $kor;
}

function zaPocetak2(){

    global $con;
    $shows=$con->prepare('select * from marka');
    $shows->execute();
    $brend= $shows->fetchAll();
    return $brend;
}

function vratiBrojStranica(){
    $brojTelefona = brojTelefona();
    $brojStranica = ceil($brojTelefona->broj / FON_OFFSET);

    return $brojStranica;
}

function oMeni(){
    global $con;
    $upit = "select * from autor order by id limit 1 ";
    $select=$con->prepare($upit);
    $select->execute();
    $about=$select->fetchAll();
    return $about;
}
function prikPor(){
    global $con;
    $doh=$con->prepare('select * from poruke order by id desc limit 10');
    $doh->execute();
    $prik = $doh->fetchAll();
return $prik;
}

function unosKorisnika($name,$lName,$username, $email, $sifPassword){
    global $con;
$id_uloga=1;
    $upit = "Insert into korisnici (name,lName,username,email,password,id_uloga) values(:name,:lName,:username,:email,:password,:id_uloga)";
    $priprema = $con->prepare($upit);
    $priprema->bindParam(':name',$name);
    $priprema->bindParam(':lName', $lName);
    $priprema->bindParam(':username',$username);
    $priprema->bindParam(':email',$email);
    $priprema->bindParam(':password', $sifPassword);
    $priprema->bindParam('id_uloga',$id_uloga);
    $rezultat=$priprema->execute();

    return $rezultat;

}

function rezLogovanja($username,$sifPassword){
global $con;
$upit = "select * from korisnici k inner join uloga u on k.id_uloga = u.id_uloga where k.username =:username and k.password = :password";
    $priprema = $con->prepare($upit);
    $priprema->bindParam(':username',$username);
    $priprema->bindParam(':password', $sifPassword);
    $priprema->execute();
    $rezultat = $priprema->fetch();

    return $rezultat;

}


?>