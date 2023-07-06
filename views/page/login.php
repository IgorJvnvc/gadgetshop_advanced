<?php
session_start();

global $con;




?>


<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Nesto vas muci</h4>
                        <h2>Tu smo da pomognemo</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>





<div class="container signup">
    <div class="row">
        <div class="col-md-4 offset-md-4">
        </div>
        <div class="col-md-4 offset-md-4 form-div">
            <form action="" >
                <h3 class="text-center">Login</h3>




                <div class="form-group">
                    <label for="username">Korisnicko ime:</label>
                    <input type="text" name="username" id="username"
                           class="form-control form-control-lg"/>

                </div>
                <div class="form-group">
                    <label for="password">Lozinka:</label>
                    <input type="password" name="password" id="password"
                           class="form-control form-control-lg"/>

                </div>

                <div class="form-group">
                    <button type="submit" name="btnLogovanje" id="btnLogovanje" class="btn
btn-primary btn-block btn-lg"> Prijavi se</button>
                </div>
                <p class="text-center">Nemate nalog? <a class="prebaci"
                                                            href="index.php?page=registration">Napravi nalog!</a></p>
            </form>
            <div id="ispisi"></div>
        </div>
    </div>
</div>

