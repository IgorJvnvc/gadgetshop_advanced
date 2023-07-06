<body>


<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="about.php"><h2>MobICT<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=pocetna">Početna

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=Galerija">Galerija</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=kontakt">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=about">O meni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=korpa">Korpa</a>
                    </li>

                    <?php
                    if(isset($_SESSION['korisnik'])){

                        $korisnik = $_SESSION['korisnik'];
                        if($korisnik->uloga == "admin"){
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href='index.php?page=admin'>Stranica za admina</a> </li>";
                        }

                    }
                    ?>





                    <?php
                    if(isset($_SESSION['korisnik'])):
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="models/odjava.php">Odjavite se</a>
                        </li>
                    <?php
                    endif;
                    ?>
                    <li><div id="odgovor"></div></li>
                </ul>
            </div>
        </div>
    </nav>
</header>