<?php
session_start();
include "views/head.php";
include "views/header.php";
include "models/functions.php";



include_once 'konekcija/konekcija.php';
global $con;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $update=$con->prepare(' SELECT * FROM telefon t INNER JOIN marka m ON t.id_marka = m.id_marka INNER JOIN sistem s on s.id_os = t.id_os where id = :id');
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
                                        
                                        
                                        
                                       


    <form   action="" method="post"    enctype="multipart/form-data" name="uploadform" >
    <table>
        <tr>
            <td> izmeni naziv</td>
            <td> <input type="text" name="naziv"  value="<?php echo $rezul->naziv ?> "></td>
        </tr>

        <tr>
            <td> Izmeni sliku(opciono):   </td>
            <td><input type="image" src="../<?php echo $rezul->mala_slika; ?>"  width="50" height="60" alt="<?php echo $rezul->naziv; ?>" name="slika" />
                <input id="slika" type="file" name="slika"> </td>
        </tr>
        <tr>
            <td> izmeni opis </td>
            <td>  <input type="text" name="opis"  value="<?php echo $rezul->opis ?>"></td>
        </tr>
        <tr>
            <td> Izmeni cenu  </td>
            <td>   <input type="text" name="cena"  value="<?php echo $rezul->cena ?>"> </td>
        </tr>

       <tr>
           <td>Izmeni model </td>





           <td>   <select id="marka" name="marka">


                   <?php

                   # 6 - Prikaz svih uloga iz baze

                   $rez_marka = executeQuery("SELECT * FROM marka");

                   foreach($rez_marka as $marka) :
                       ?>
                       <option value="<?= $marka->id_marka ?>" <?php if ($rezul->naziv_m ==$marka->naziv_m){ echo "selected";} ?>> <?= $marka->naziv_m ?> </option>

                   <?php endforeach; ?>

               </select></td>
       </tr>
        <tr>
            <td> Izmeni operativni sistem </td>


            <td>
                <select id="os" name="os">



                <?php



                    $rez_sistem = executeQuery("SELECT * FROM sistem");

                    foreach($rez_sistem as $sistem) :
                ?>
                        <option value="<?= $sistem->id_os ?>" <?php if ($rezul->naziv_os == $sistem->naziv_os) { echo "selected";} ?>> <?= $sistem->naziv_os ?> </option>

                    <?php endforeach; ?>

                </select>





</td>
        </tr>
        <tr>
            <td> <a href="index.php?page=admin">Vrati se</a> </td>
            <td> <input type="submit" name="unesi"> </td>
        </tr>





    </table>

    </form>


<?php
$upload="slike/mala/";
if(isset($_POST['unesi']))
{

    
	$fileName = $_FILES['slika']['name'];
	$tmpName  = $_FILES['slika']['tmp_name'];
	$fileSize = $_FILES['slika']['size'];
	$fileType = $_FILES['slika']['type'];

    if($fileType!=".jpg")
    {
        echo "slika mora biti jpg";
    }

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
if(isset($_POST['unesi'])) {
    $fileName = $_FILES['slika']['name'];
    $tmpName  = $_FILES['slika']['tmp_name'];
    $fileSize = $_FILES['slika']['size'];
    $fileType = $_FILES['slika']['type'];
    $filePath = $uploadDir . $fileName;

    $result  = move_uploaded_file($tmpName, $filePath);

}




if (isset($_POST['unesi'])) {
 
    $naziv=$_POST['naziv'];

    $file=$_FILES['slika']['name'];
    if($file==""){
        $file = $rezul->slika;
        $mala = $rezul->slika;
    }else{
        $file ='slike/'.$_FILES['slika']['name'];
        $mala ='slike/mala/'.$_FILES['slika']['name'];

    }







$opis=$_POST['opis'];
$cena =$_POST['cena'];

$marka = $_POST['marka'];
$os = $_POST['os'];

$unesi = $con->prepare('UPDATE telefon  SET
naziv =:naziv,
slika = :slika,
opis =:opis,
cena =:cena,
mala_slika = :mala_slika,
id_marka = :id_marka,
id_os = :id_os
where id=:id
');

    try {
        $unesi->execute(array(
            ':naziv'=>$naziv,
            ':slika'=>$file,
            ':opis'=>$opis,
            ':cena'=>$cena,
            ':mala_slika'=>$mala,
            ':id_marka'=>$marka,
            ':id_os'=>$os,
            ':id'=> $id
        ));
        header('location: index.php?page=admin');
        echo " <script> alert('Uspesno ste izmenili podatke')
window.location.assign('index.php?page=admin');</script>" ;
echo "Uspesno ste izmenili podatke<a class=\"btn btn-info\" href=\"index.php?page=admin\">Vrati se na stranicu admina</a>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }




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

