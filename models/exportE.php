<?php

{
    header("Content-Disposition: attachment; filename=Telefoni.xls");
    header("Content-Type: application/x-msexcel");
    header('Content-Type: application/vnd.ms-excel');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header("Pragma: no-cache");
// include "functions.php";
    include "../konekcija/konekcija.php";
    global $con;
    $telefonExcel = 'SELECT * FROM telefon';
    $rez = $con->query($telefonExcel)->fetchAll();
    $export_string_excel = "Id telefona \t Naziv telefona \t Cena \n ";
    foreach($rez as $k) {
        $export_string_excel .= $k->id . "\t" . $k->naziv ."\t". $k->cena."\n";
    }
    echo $export_string_excel;
}