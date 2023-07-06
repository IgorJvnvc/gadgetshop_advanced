<?php

session_start();

include 'models/functions.php';
global $con;
$telefoni = sviTelefoni();
include("views/logreg.php");




//pretraga




?>

<?php if(!isset($_SESSION['korisnik'])) : ?>

<?php
include("views/regBan.php");





?>

    <?php
endif;
    ?>






<section class="blog-posts grid-system">






    <div class="container">

        <div class="row">

            <div class="col-lg-12"  ">
                <div class="all-blog-posts">
                    <div class="row" id="prikazF">





                        <?php foreach ($telefoni as $r): ?>
                        <a href="prod.php?id=<?php echo $r->id?>"> <div class="col-lg-3">

                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="<?php echo $r->mala_slika; ?>" width="150" height="250" alt="">
                                    </div>
                                    <div class="down-content ">
                                        <span><?php echo $r->naziv; ?></span>
                                        <h4><?php echo $r->naziv_m; ?></h4>
                                        <ul class="post-info">
                                            <li>   Vec od  <?php echo $r->cena; ?>$   </li>
                                            <li> <?php echo $r->naziv_os; ?> </li>

                                        </ul>
                                        <p><?php echo $r->opis; ?></p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
<a href="prod.php?id=<?php echo $r->id?>" class="btn btn-success" > Pogledaj  </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </a>
                            </div>
                        <?php endforeach  ?>











                    </div>
                    <div class="col-lg-12" >
                        <?php
                        $brojStranica = vratiBrojStranica();
                        ?>

                        <ul class="pagination" id="paginacija" >
                            <?php
                            for($i = 0; $i < $brojStranica; $i++):
                                ?>
                                <li class="page-item" >
                                    <a class="page-link m-pagination" href="#" data-limit="<?=$i?>"><?=($i+1)?></a>
                                </li>
                            <?php
                            endfor;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>








