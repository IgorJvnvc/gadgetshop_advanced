<?php
session_start();

include 'models/functions.php';
global $con;
$rez = zaPocetak();
$kor = admin2();
include("views/logreg.php");


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $update=$con->prepare(' SELECT * FROM telefon t INNER JOIN marka m ON t.id_marka = m.id_marka INNER JOIN sistem s on s.id_os = t.id_os where id = :id');
    $update->execute(array(
        ':id'=>$id
    ));
    $rezul = $update->fetch();
}





if (isset($_POST['insPro'])) {
    $kolicina = $_POST['kolicina'];
    $idT= $_POST['idTelefon'];
    $idKor= $_POST['idKor'];

}


if (!empty($kolicina)) {
    $unesi = $con->prepare('INSERT INTO korpa (id_korpa,kolicina,id_telefon,id_korisnik) 
values(null , :kolicina ,:telefon,:korisnik)');
    $unesi->execute(array(
        ':kolicina'=>$kolicina,
        ':telefon'=>$idT,
        ':korisnik'=>$idKor
    ));
    header('location: korpa.php');

}




?>









<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">






                        <div class="col-lg-12">

                                <div class="blog-post">


                                    <div class="blog-thumb">
                                        <img src="<?php echo $rezul->slika; ?>" alt="<?php echo $rezul->naziv; ?>">
                                    </div>
                                    <div class="down-content">
                                        <span><?php echo $rezul->naziv; ?></span>

                                        <ul class="post-info">


                                        </ul>
                                        <p>
                                            <?php echo $rezul->opis ?>
                                            </p>
                                        <div class="post-options">




    <?php if(isset($_SESSION['korisnik'])){
    //    var_dump(($_SESSION['korisnik']));
        $korisnik= ($_SESSION['korisnik']);
       $korisnik->id;
    } ?>

                                            <?php   if(isset($_SESSION['korisnik'])):
                                                ?>




                                            <form method="POST" action="">

                                                    <input type="hidden" name="idKor" value="<?php echo $korisnik->id ?>" />
                                                    <input type="hidden" name="idTelefon" value="<?php echo $rezul->id ?>" />
                                                    <table  class="table table-light" width="100%" >
                                                        <tr class="container-fluid"> <td> Kolicina </td> <td> cena </td> <td></td></tr>
                                                        <tr class="col-lg-1" >
                                                            <td >
                                                                <input type="number" value="1"min="1" name="kolicina">
                                                            </td>
                                                            <td>
                                                                <?php echo $rezul->cena  ?>
                                                            </td>
                                                            <td>
                                                                <input class="btn-success"  type="submit" name="insPro" value="dodaj proizvod u korpu"/>
                                                            </td>
                                                        </tr>

                                                    </table>






                                                </form>
                                            <?php endif; ?>
                                            <?php if(!isset($_SESSION['korisnik'])) : ?>
                                                <h4> Da bi obavili kupovinu morate se registrovati! <br><a
                                                            href="login.php" class="btn btn-danger">Uloguj se!</a></h4> <?php endif; ?>
                                        </div>
                                    </div>

                                </div>



                        </div>
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="galerija.php">Pogledaj ostale proizvode</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


