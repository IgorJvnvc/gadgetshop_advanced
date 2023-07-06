<?php
session_start();

include 'models/functions.php';

$about= oMeni();
include("views/logreg.php");
?>






    <section class="blog-posts grid-system">





    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="blog-post">
                                <?php foreach ($about as $r):?>
                                    <div class="blog-thumb">
                                        <img src="<?php echo $r->slika; ?>" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span><?php echo $r->ime_prezime; ?></span>

                                        <ul class="post-info">

                                            <li>Index:<?php echo $r->index; ?></a></li>
                                            <li>Mesto rodjenja: <?php echo $r->mesto; ?> </li>
                                            <li>Datum rodjenja: <?php echo $r->datum; ?> </li>
                                        </ul>
                                        <p><?php echo $r->opis; ?></p>

                                <?php endforeach  ?>
                                        <div class="post-options">
        
                                        </div>
                                    </div>
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
                                        <h2>Mala anketa za vas:</h2>
                                        <br>
                                    </div>
                                    <div class="content">

                                        <ul>




                                            <?php
                                            include('views/page/poll.php');
                                            $poll = new Poll();
                                            $pollData = $poll->getPoll();
                                            if(isset($_POST['vote'])){
                                                $pollVoteData = array(
                                                    'pollid' => $_POST['pollid'],

                                                    'pollOptions' => $_POST['options']
                                                );

                                                $isVoted = $poll->updateVote($pollVoteData);
                                                if(!$isVoted){  
                                                    $voteMessage = 'Vec ste glasali.';     
                                                } else {
                                                    $voteMessage = 'Vas glas je zabelezen!';
                                                    setcookie($_POST['pollid'], 1, time()+60*60*24*365);                                                
                                                }
                                                
                                            }
                                            ?>
                                            <div class="poll-container">
                                                <?php echo !empty($voteMessage)?'<div class="alert alert-danger"><strong>Warning!</strong> '.$voteMessage.'</div>':''; ?>
                                                <form action="" method="post" name="pollFrm">
                                                    <?php
                                                    foreach($pollData as $poll){

                                                        echo "<h3>".$poll['question']."</h3>";
                                                        $pollOptions = explode("||||", $poll['options']);
                                                        echo "<ul>";
                                                        for( $i = 0; $i < count($pollOptions); $i++ ) {
                                                            echo '<li><input type="radio" name="options" value="'.$i.'" > '.$pollOptions[$i].'</li>';
                                                        }
                                                        echo "</ul>";
                                                        echo '<input type="hidden" name="pollid" value="'.$poll['pollid'].'">';
                                                        echo '<br><input type="submit" name="vote" class="btn btn-primary" value="Glasaj">';

                                                    }
                                                    ?>
                                                </form>
                                                <br>


                                        </ul>





                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <?php   if(isset($_SESSION['korisnik'])):
                                    ?>
                                    <h2>Rezultati glasanja:</h2>
                                    <?php

                                    $poll = new Poll();
                                    $pollData = $poll->getPoll();
                                    foreach($pollData as $poll) {
                                        echo "<h3>".$poll['question']."</h3>";
                                        $pollOptions = explode("||||", $poll['options']);
                                        $votes = explode("||||", $poll['votes']);
                                        for( $i = 0; $i<count($pollOptions); $i++ ) {
                                            $votePercent = '0%';
                                            if($votes[$i] && $poll['voters']) {
                                                $votePercent = round(($votes[$i]/$poll['voters'])*100);
                                                $votePercent = !empty($votePercent)?$votePercent.'%':'0%';
                                            }
                                            echo '<h5>'.$pollOptions[$i].'</h5>';
                                            echo '<div class="progress">';
                                            echo '<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:'.$votePercent.'">'.$votePercent.'</div></div>';
                                        }
                                    }
                                    ?>
                                <?php endif; ?>







                                <?php if(!isset($_SESSION['korisnik'])) : ?>
                                    <h4>Da bi videli rezultate glasanja morate se ulogovati!<br><a
                                                href="index.php?page=login" class="btn btn-danger">Uloguj se!</a></h4> <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



