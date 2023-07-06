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
        </div><br>
        <div class="col-md-4 offset-md-4 form-div">
            <form action="" >
                <h3 class="text-center">Registracija</h3>

                <div class="form-group">
                    <label for="name">Ime</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg"/>
                    <p><i>Prvo slovo mora biti veliko!</i></p>
                </div>
                <div class="form-group">
                    <label for="lName">Prezime</label>
                    <input type="text" name="lName" id="lName" class="form-control form-control-lg"/>
                    <p><i>Prvo slovo mora biti veliko</i></p>
                </div>
                <div class="form-group">
                    <label for="email">Mejl:</label>
                    <input type="text" name="email" id="email" class="form-control
form-control-lg"/>
                    <p><i>email@example.com</i></p>
                </div>
                <div class="form-group">
                    <label for="username">Korisnicko ime:</label>
                    <input type="text" name="username" id="username"
                           class="form-control form-control-lg"/>

                </div>
                <div class="form-group">
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" id="password"
                           class="form-control form-control-lg"/>
                    <p><i>Min 8 karaktera 1 malo slovo, 1veliko slovo i 1 znak</i></p>
                </div>

                <div class="form-group">
                    <button type="submit" name="taster" id="taster" class="btn
btn-primary btn-block btn-lg">Registracija</button>
                </div>
                <p class="text-center">Vec imas nalog? <a class="prebaci"
                                                            href="index.php?page=login">Prijavi se</a></p>
            </form>
            <div id="napisi"></div>
        </div>
    </div>
</div>

