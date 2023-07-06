<?php
include "konekcija/konekcija.php";
  global $con;
    $show= $con->prepare('SELECT * FROM telefon t INNER JOIN marka m ON t.id_marka = m.id_marka INNER JOIN sistem s on s.id_os = t.id_os GROUP BY m.id_marka ; ');
    $show -> execute();
    $rez = $show->fetchAll();
?>
 

<?php foreach($rez as $k): ?>
<ul>
    <li><?= $k->naziv_m ; ?>
        <ul> <?= $k->naziv; ?></ul>
    </li>
</ul>
 <?php endforeach  ?>