<?php
session_start();

include 'models/functions.php';
global $con;

$prik= prikPor();


$unesi=ispisPoruka();


?>



<?php
include("views/logreg.php");

?>
<?php if(!isset($_SESSION['korisnik'])) : ?>

    <?php
    include("views/regBan.php");





    ?>

<?php
endif;
?>



<section class="contact-us">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="down-contact">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sidebar-item contact-form">
                                <div class="sidebar-heading">
                                    <h2>Imate pitanje za nas?</h2>
                                </div>
                                <div class="content">
                                    <form id="contact" action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="name" type="text" id="name" placeholder="Ime" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">

                                                    <input name="email" type="text" id="email" placeholder="Mejl" required="">

                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <fieldset>
                                                    <input name="subject" type="text" id="subject" placeholder="Naslov">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <textarea name="message" rows="6" id="message" placeholder="Pitanje" required=""></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button type="submit"   name="send">Posalji pitanje</button>
                                                </fieldset>
                                            </div><br>
                                            <div class="alert-primary">
                                            <?php
                                            if(isset($_POST['send'])){
                                                $email=$_POST['email'];
                                                $reEmail="/^[\w]+(\w.\_\-)*\@[\w]+(\.[\w]+)?(\.[a-z]{2,3})$/";




                                                if(preg_match($reEmail,$email)) {
                                                    echo "Hvala.Vasa poruka je poslata";

                                                } else {
                                                    echo "Mejl mora biti u odgovarajucem formatu: pera@gmail.com" ;

                                                }


                                            }
                                            ?>
                                            </div></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar-item contact-information">
                                <div class="sidebar-heading">
                                    <h2>Poslednja pitanja:</h2>
                                </div>
                                <?php foreach ($prik as $r): ?>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                    <span><h6> <?php echo $r->poruka_ime ?> </h6></span>

                                                    <h5><?php echo $r->poruka_p; ?></h5>
                                                    ----------------------------------------------------------
                                              </li>






                                        </ul>
                                    </div>
                                <?php endforeach  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>



