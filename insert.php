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



<form method="POST" action="" enctype="multipart/form-data" name="uploadform">
    <table>
        <tr>
            <td>Unesite naziv proizvoda:</td>
            <td>
                <input type="text" name="naziv" placeholder="naziv">
            </td>
        </tr>
        <tr>
            <td>Unesite opis proizvoda</td>
            <td><input type="text" name="opis" placeholder="opis"></td>
        </tr>
        <tr>
            <td>Unesite cenu proizvoda</td>
            <td>   <input type="number" name="cena" placeholder="cena"></td>
        </tr>
        <tr>
            <td>Unesite sliku proizvoda</td>
            <td>
                <input type="file" name="slika">
            </td>
        </tr>
        
        <tr>
            <td>Unesite marku proizvoda:</td>
            <td>
                 <select name="marka">
        <option value="0"> Marka </option>
        <!-- Uloge iz baze -->

        <?php

        # 6 - Prikaz svih uloga iz baze

        $rez_marka = executeQuery("SELECT * FROM marka");

        foreach($rez_marka as $marka) :
        ?>
            <option value="<?= $marka->id_marka ?>"> <?= $marka->naziv_m ?> </option>

        <?php endforeach; ?>

    </select>
                
                
            </td>
        </tr>
        <tr>
            <td>Unesite OS proizvoda</td>
            <td>
                
                 
    <select name="sistem">
        <option value="0"> OS </option>
        <!-- Uloge iz baze -->

        <?php

        # 6 - Prikaz svih uloga iz baze

        $rez_sistem = executeQuery("SELECT * FROM sistem");

        foreach($rez_sistem as $sistem) :
            ?>
            <option value="<?= $sistem->id_os ?>"> <?= $sistem->naziv_os ?> </option>

        <?php endforeach; ?>

    </select>
                
            </td>
        </tr>
        
        <tr>
            <td><a href="index.php?page=admin">Admin strana</a></td>
            <td>  <input type="submit" name="ubaci" /></td>
        </tr>
    </table>

    
   
 
    


  


</form>





<?php
$upload="slike/mala/";
if(isset($_POST['ubaci']))
{
	$fileName = $_FILES['slika']['name'];
	$tmpName  = $_FILES['slika']['tmp_name'];
	$fileSize = $_FILES['slika']['size'];
	$fileType = $_FILES['slika']['type'];

	$filePath = $upload."".$fileName;

	$nazivFajla = $tmpName;

	$novaSirina = 300; //fiksno
	
	list($sirina, $visina,$x,$y) = getimagesize($nazivFajla);
	$procenat_promene = $novaSirina/$sirina ;
	$novaVisina = $visina * $procenat_promene;
	$thumb = imagecreatetruecolor($novaSirina, $novaVisina);

	$izvor = imagecreatefromjpeg($nazivFajla);

	imagecopyresized($thumb, $izvor, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);

	imagejpeg($thumb, $filePath);
	imagedestroy($thumb);
    header('Content-type: image/jpeg');

}
?>











<?php
               
               $uploadDir = 'slike/';
if(isset($_POST['ubaci'])) {
    $fileName = $_FILES['slika']['name'];
    $tmpName  = $_FILES['slika']['tmp_name'];
    $fileSize = $_FILES['slika']['size'];
    $fileType = $_FILES['slika']['type'];
    $filePath = $uploadDir . $fileName;

    $result  = move_uploaded_file($tmpName, $filePath);

}





if (isset($_POST['ubaci'])) {
$naziv = $_POST['naziv'];
$op = $_POST['opis'];
$cen = $_POST['cena'];
$slike ='slike/' . $_FILES['slika']['name'];
$marka = $_POST['marka'];
$sistem = $_POST['sistem'];
$mala = 'slike/mala/' . $_FILES['slika']['name'];


}

               
               
               
               
               
               
               
if (!empty($naziv)) {
$unesi = $con->prepare('INSERT INTO telefon (id,opis,cena,id_marka,id_os,slika,naziv,mala_slika) 
values(null ,:opis,:cena,:id_marka,:id_os,:slika,:naziv,:mala_slika)');
$unesi->execute(array(
':opis'=>$op,
':cena'=>$cen,
':id_marka'=>$marka,
'id_os'=>$sistem,
':slika'=>$slike,
':naziv'=>$naziv,
':mala_slika'=>$mala
));
header('location: index.php?page=admin');
echo " <script> alert('Uspesno ste uneli telefon')
window.location.assign('index.php?page=admin');</script>" ;

} else {
echo "Popunite sve!";
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

