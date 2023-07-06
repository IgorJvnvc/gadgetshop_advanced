<?php

global $con;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $update=$con->prepare('select * from korisnici k inner  join uloga u on k.id_uloga = u.id_uloga where id=:id');
    $update->execute(array(
        ':id'=>$id
    ));
    $rezul = $update->fetch();
}



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
            <td>Izmeni ime:</td>
            <td>  <input type="text" name="name" value="<?php echo $rezul->name?>"></td>
        </tr>
        
        <tr>
            <td>Izmeni prezime:</td>
            <td>    <input type="text" name="lName" value="<?php echo $rezul->lName?>"> </td>
        </tr>
        <tr>
            <td>Izmeni korisnicko ime:</td>
            <td> <input type="text" name="userName" value="<?php echo $rezul->username?>"> </td>
        </tr>
        <tr>
            <td>
                Izmeni mejl:
            </td>
            <td>   <input type="text" name="email" value="<?php echo $rezul->email?>"> </td>
        </tr>
        <tr>
            <td>Izmeni sifru</td>
            <td>    <input type="text" name="password" value="<?php echo $rezul->password?>"> </td>
        </tr>
        <tr>
            <td>Izmeni ulogu</td>
            <td>
                
                  <select name="uloga">
        <option value="0"> Izaberite ulogu </option>
        <?php

        $rez_uloga = executeQuery("SELECT * FROM uloga");

        foreach($rez_uloga as $uloga) :
            ?>
            <option value="<?= $uloga->id_uloga ?>"<?php if ($rezul->uloga ==$uloga->uloga){ echo "selected";} ?> > <?= $uloga->uloga ?> </option>

        <?php endforeach; ?>

    </select>
            </td>
        </tr>
        <tr>
            <td><a href="admin.php">Admin strana</a></td>
            <td>
    <input type="submit" name="unesi"> </td>
        </tr>
    </table>

  
 
   
 



  

</form>


<?php
if (isset($_POST['unesi'])) {

    $name=$_POST['name'];

    $lName=$_POST['lName'];
    $userName=$_POST['userName'];
    $email =$_POST['email'];

    $password= $_POST['password'];
    $uloga= $_POST['uloga'];

    $unesi = $con->prepare('Update korisnici set
name =:namees,
lName= :lastname,
username =:user_name,
email=:email,
password = :password,
id_uloga= :id_uloga
where id=:id
');
    $unesi->execute(array(
        ':namees'=>$name,
        ':lastname'=>$lName,
        ':user_name'=>$userName,
        ':email'=>$email,
        ':password'=>$password,
        ':id_uloga'=>$uloga,
        ':id'=> $id
    ));
    header('location: admin.php');
echo "Uspesno ste izmenili podatke<a class=\"btn btn-info\" href=\"index.php?page=admin\">Vrati se na stranicu admina</a>";


}






?>



                                        </div>
                                        </div> </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>

<?php

include '../views/footer.php';?>