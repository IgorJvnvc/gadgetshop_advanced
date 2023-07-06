<head>

    <style>

        #div1 {width:800px;float:left;margin-left: 20px;}
        #div2 {width:700px;float:right;margin-left: 5px;}
        table, th, td {
            border:1px solid black;
            text-align: center;
            min-width: 50px;
        }
    </style>

</head>
<?php
global $con;
if(isset($_POST['brnTrazi'])) {
    $trazi = $_POST['trazi'];
    $sadTrazi = $con->prepare('SELECT * FROM telefon t INNER JOIN marka m ON t.id_marka = m.id_marka INNER JOIN sistem s on s.id_os = t.id_os where opis like :ovo or naziv_m like :ovo or 
                                                                                                                     naziv like :ovo;');


    $sadTrazi->execute(array(
        ':ovo' => "%" . $trazi . "%"
    ));

    $rez = $sadTrazi->fetchAll() ;


}


if(isset($_POST['brnTra'])) {
    $tra = $_POST['tra'];
    $sadTra = $con->prepare('select * from korisnici k inner  join uloga u on k.id_uloga = u.id_uloga where name like :ovo or lName like :ovo or username like :ovo ;');


    $sadTra->execute(array(
        ':ovo' => "%" . $tra . "%"
    ));

    $kor = $sadTra->fetchAll() ;


}



?>
<div class="row" id="prikazF">




    <div id="div1" class="blog-posts">
   


        <form action="" method="post">
            Pretraga telefona:
            <input type="text" name="trazi" value="<?php if(isset($trazi)) echo $trazi; ?>" >
            <input type="submit" name="brnTrazi" value="Trazi" class="btn btn-info" >

        </form>
            <table>   <?php
                if(count($rez) == 0){
                    echo "<p class='alert alert-danger my-3'>Trenutno nema telefona u bazi podataka.</p>";
                }
                else{
                ?>
                <tr>
                    <td colspan="9"><a class="btn btn-outline-success" href="insert.php">Dodaj nov proizvod</a></td>

                </tr>
                <tr>

                    <td> id </td>
                    <td> Naziv uredjaja</td>
                    <td> Brend </td>
                    <td>Slika</td>
                    <td> Opis </td>
                    <td> Operativni sistem </td>
                    <td> Cena </td>
                    <td colspan="2">x</td>

                </tr>
                <?php foreach ($rez as $r): ?>
                    <tr>

                        <td> <?php echo $r->id; ?> </td>
                        <td> <?php echo $r->naziv; ?> </td>
                        <td> <?php echo $r->naziv_m; ?> </td>
                        <td> <img src="<?php echo $r->mala_slika; ?>"width="50" height="60" alt="<?php echo $r->naziv; ?>" /> </td>
                        <td> <?php echo $r->opis; ?> </td>
                        <td>   <?php echo $r->naziv_os; ?> </td>
                        <td> <?php echo $r->cena; ?> </td>



                        <td><a class="btn btn-info" href="update.php?id=<?php echo $r->id?>"> Izmeni </a></td>
                        <td><a class="btn btn-danger" href="del/delete.php?id=<?php echo $r->id ?>">Izbrisi proizvod</a></td>

                    </tr>
                <?php endforeach  ?>

            </table>
            <?php
        }
        ?>

    </div>

    <div id="div2" class="blog-posts">

        <form action="" method="post">
        Pretraga korisnika
            <input type="text" name="tra" value="<?php if(isset($tra)) echo $tra; ?>" >
            <input class="btn btn-info" type="submit" name="brnTra" value="Trazi">

        </form>

        <?php
        if(count($kor) == 0){
            echo "<p class='alert alert-danger my-3'>Trenutno nema korisnika u bazi podataka.</p>";
        }
        else{
            ?>

            <table style="width:100%">
                <tr>
                    <td colspan="9">      <a class="btn btn-outline-success"  href="insertKorisnik.php">Dodaj novog korisnika</a></td>

                </tr>
                <tr>
                    <td>  id </td>
                    <td> Ime </td>
                    <td> Prezime </td>
                    <td>Korisnicko ime</td>
                    <td> email </td>
                    <td> password </td>
                    <td> uloga </td>
                    <td colspan="2">x</td>

                </tr>
                <?php foreach ($kor as $k): ?>
                    <tr>

                        <td> <?php echo $k->id; ?> </td>
                        <td> <?php echo $k->name; ?> </td>
                        <td> <?php echo $k->lName; ?> </td>
                        <td> <?php echo $k->username; ?> </td>
                        <td> <?php echo $k->email; ?> </td>
                        <td>   <?php echo $k->password; ?> </td>
                        <td> <?php echo $k->uloga; ?> </td>



                        <td><a class="btn btn-info" href="updateKorisnik.php?id=<?php echo $k->id?>">Izmeni</a></td>
                        <td><a class="btn btn-danger" href="del/deleteKorisnik.php?id=<?php echo $k->id ?> ">Izbrisi</a></td>

                    </tr>
                <?php endforeach  ?>

            </table>
            <?php
        }
        ?>
<textarea rows="10" cols="100"><?php   $myfile = fopen("data/log.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("data/log.txt"));
fclose($myfile); 
?> </textarea>



<?php
function dohvatiP(){
@ $podaciUNizu = file("data/log.txt");
$brojElemenataNiza = count($podaciUNizu);

 
echo("<table border='0px'>");
echo("<tr><td>Pocetna</td><td>Galerija</td><td>Kontakt</td><td>O meni</td> <td>Korpa</td> <td>Admin</td></tr>");
	$poc=0;
	$gal=0;
	$aba=0;
	$ko=0;

$kori=0;
$adm=0;


for($i=0; $i<$brojElemenataNiza; $i++){


	$pocepaniElementNiza = explode("\t", $podaciUNizu[$i]);
	echo("<tr>");
	$sub = substr("$pocepaniElementNiza[0]",16);

 

	 	 if($sub==="pocetna"){
	     $poc++;
	 } if($sub==="admin"){
	     $adm++;
	 } if($sub==="Galerija"){
	     $gal++;
	 } if($sub==="about"){
	     $aba++;
	 } 
	 if($sub==="korpa"){
	     $kori++;
	 }
	  if($sub==="kontakt"){
	     $ko++;
	 }
	 
	

}
$all=$poc+$gal+$ko+$aba+$kori+$adm;
$pocetna =  round($poc/$all*100,2);
$Galeri =  round($gal/$all*100,2);
$Omeni =  round($aba/$all*100,2);
$kont= round($ko/$all*100,2);
$korpa=  round($kori/$all*100,2);
$admini =  round($adm/$all*100,2);
echo("<tr><td>$poc</td><td>$gal</td><td>$ko</td><td>$aba</td><td>$kori</td> <td>$adm</td></tr>");
echo("<tr><td>$pocetna</td><td>$Galeri</td><td>$kont</td><td>$Omeni</td><td>$korpa</td> <td>$admini</td></tr>");


echo("</table>");
 
 
}

	//dohvatiP();
	
	
 

?>

    </div>
 
</div>




