<?php
include "../konekcija/konekcija.php";
global $con;


if (isset($_POST['ubaci'])) {
    $name = $_POST['name'];
    $lName= $_POST['lName'];
    $user= $_POST['userName'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    $uloga = $_POST['uloga'];
}


if (!empty($name)) {
    $unesi = $con->prepare('INSERT INTO korisnici (id,name,lName,username,email,password,id_uloga) 
values(null , :namees ,:lastname,:user_name,:email,:password,:id_uloga)');
    $unesi->execute(array(
        ':namees'=>$name,
        ':lastname'=>$lName,
        ':user_name'=>$user,
        'email'=>$email,
        ':password'=>$password,
        ':id_uloga'=>$uloga
    ));
    header('location: ../index.php?page=admin');

} else {
    echo "nije ok";
}



?>


<form method="POST" action="">

    <input type="text" name="name" placeholder="name">
    <input type="text" name="lName" placeholder="LastName">
    <input type="text" name="userName" placeholder="UserName">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="password" placeholder="value">


    <select name="uloga">
        <option value="0"> Izaberite ulogu </option>
        <?php

        $rez_uloga = executeQuery("SELECT * FROM uloga");

        foreach($rez_uloga as $uloga) :
            ?>
            <option value="<?= $uloga->id_uloga ?>"> <?= $uloga->uloga ?> </option>

        <?php endforeach; ?>

    </select>

    <input type="submit" name="ubaci">
</form>