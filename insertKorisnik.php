<?php
session_start();
include "views/head.php";
include "views/header.php";
include "models/functions.php";
include "konekcija/konekcija.php";
global $con;


?>
 <div class="container">
               <div class="row" id="prikazF">




    <div id="div1" class="blog-posts">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="blog-post">



<form method="POST" action="">
<table>
    <tr>
        <td>Unesite ime:</td>
        <td><input type="text" name="name" placeholder="name"></td>
    </tr>
    
    <tr>
        <td>Unesite prezime</td>
        <td><input type="text" name="lName" placeholder="LastName"></td>
    </tr>
    <tr>
        <td>Unesite korisnicko ime</td>
        <td><input type="text" name="userName" placeholder="UserName"> </td>
    </tr>
    <tr>
        <td>Unesite email: </td>
        <td>   <input type="text" name="email" placeholder="email"></td>
    </tr>
    
    <tr>
        <td>Uloga korisnika</td>
        <td> 
        
        
    <select name="uloga">
        <option value="0"> Izaberite ulogu </option>
        <?php

        $rez_uloga = executeQuery("SELECT * FROM uloga");

        foreach($rez_uloga as $uloga) :
            ?>
            <option value="<?= $uloga->id_uloga ?>"> <?= $uloga->uloga ?> </option>

        <?php endforeach; ?>

    </select>
        
        </td>
    </tr>
    
    
    
    <tr>
        <td> Unesite sifru</td>
        <td> <input type="text" name="password" placeholder="sifra"></td>
    </tr>
    
       <tr>
        <td><a class"btn btn-success" href="index.php?page=admin">Admin stranica</a></td>
        <td> <input type="submit" name="ubaci"></td>
    </tr>
    
    
</table>
    
    
    
 
   



    
</form>
<?php
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
VALUES(null , :namees ,:lastname,:user_name,:email,:password,:id_uloga)');
    $unesi->execute(array(
        ':namees'=>$name,
        ':lastname'=>$lName,
        ':user_name'=>$user,
        'email'=>$email,
        ':password'=>$password,
        ':id_uloga'=>$uloga
    ));
    header('location: index.php?page=admin');
echo " <script> alert('Uspesno ste uneli korisnika')
window.location.assign('index.php?page=admin');</script>" ;

} else {
    echo "Popunite sve";
}



?>

   </div>
                                        </div> </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>

<?php

include 'views/footer.php';?>
