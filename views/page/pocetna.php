<?php
session_start();

include "models/functions.php";
$brend = zaPocetak2();
$rez = zaPocetak();


?>





<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            <?php foreach ($rez as $r): ?>
                <div class="item">

                    <img src="<?php echo $r->mala_slika; ?>"   height="700" alt="">
                    <div class="item-content">
                        <div class="main-content">
                            <div class="meta-category">
                                <span><?php echo $r->naziv_m ; ?></span> <br>

                            </div>
                            <a href="post-details.html"><h4><?php echo $r->naziv; ?></h4></a>
                            <ul class="boja">
                                <li><a href="#"><?php echo $r->naziv_os  ?></a></li>
                                <li><a href="#">Već od <?php echo $r->cena  ?>  $ </a></li>

                            </ul>

                        </div>

                    </div>


                </div>

            <?php endforeach  ?>

        </div>

    </div>

</div>

<?php if(!isset($_SESSION['korisnik'])) : ?>

    <?php
    include ("views/regBan.php");





    ?>

<?php
endif;
?>



<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">






                        <div class="col-lg-12">
                            <?php foreach ($brend as $r): ?>
                                <div class="blog-post">


                                    <div class="blog-thumb">
                                        <img src="<?php echo $r->slika_m;?>" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span><?php echo $r->naziv_m; ?></span>

                                        <ul class="post-info">
                                            <li><a href="<?php echo $r->link; ?>">Osnovan: <?php echo $r->osnovan; ?></a></li>

                                        </ul>
                                        <p>
                                            <?php echo $r->opis_m; ?></p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">

                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">

                                                        <li><a href="<?php echo $r->link; ?>"><?php echo $r->naziv_m; ?></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endforeach  ?>


                        </div>
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="index.php?page=Galerija">Pogledaj proizvode</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">






                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>
                                        Nasa preporuka:
                                    </h2>
                                </div>
                                <?php foreach ($rez as $r): ?>
                                    <div class="content">
                                        <ul>
                                            <li><a href="post-details.html">
                                                    <span><h6> <?php echo $r->naziv_m ?> </h6></span>
                                                    <span><h6> <?php echo $r->naziv ?> </h6></span>
                                                    <h5><?php echo $r->opis; ?></h5>
                                                    ----------------------------------------------------------
                                                </a></li>






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



