<?php
session_start();

include 'models/functions.php';
global $con;

$rez = zaPocetak();
include("views/logreg.php");

if(isset($_SESSION['korisnik'])):

if(isset($_SESSION['korisnik'])){
    //    var_dump(($_SESSION['korisnik']));
    $korisnik= ($_SESSION['korisnik']);
    $korisnik->id;

}

$show= $con->prepare('SELECT * FROM telefon t INNER JOIN marka m ON t.id_marka = m.id_marka INNER JOIN sistem s on s.id_os = t.id_os order by id ; ');

$id = $korisnik->id;
    $korinsici = $con->prepare("select * from korpa k inner join telefon t on k.id_telefon = t.id  inner join korisnici ko on k.id_korisnik = ko.id where id_korisnik = $id");
    $korinsici->execute();
    $kor = $korinsici->fetchAll();


?>




<section class="blog-posts">
    <div class="container">
        <?php
        if(count($kor) == 0){
            echo "<p class='alert alert-danger my-3'>Vasa korpa je prazna.</p>";
        }
        else{
            ?>
            <table class="table table-active" >
                <thead>
                <tr>
                    <td>Slika</td>
                    <td>Naziv</td>
                    <td>Kolicina</td>
                    <td>Cena</td>
                    <td>Ukupna cena</td>
                    <td>Izbrisi iz korpe</td>

                </tr></thead>

                <?php foreach ($kor as $k): ?>
                    <tr>
                        <td> <img src="<?php echo $k->slika; ?>" width="100px" height="100px"/></td>
                        <td><?php echo $k->naziv; ?></td>
                        <td><?php echo $k->kolicina; ?></td>
                        <td><?php echo $k->cena; ?> $</td>
                        <td> <?php  $uc = $k->kolicina*$k->cena ?> <?=$uc?> $</td>
                        <td><a class="btn btn-danger" href="del/deleteKorpa.php?id=<?php echo $k->id_korpa ?> ">Izbrisi</a></td>
                    </tr>

                <?php endforeach  ?>

            </table>
            <?php
        }
        ?>




        <?php endif; ?>







        <?php if(!isset($_SESSION['korisnik'])) : ?>
        <section class="blog-posts">
            <div class="container">
            <h4>Morate se ulogovati da bi videli vasu korpu<br><a
                        href="index.php?page=login" class="btn btn-danger">Uloguj se!</a></h4> <?php endif; ?>
            </div>

        </section>















    </div>
</section>


