<?php
header("Content-Type: application/vnd.msword");
header("Expires: 0");//no-cache
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
header("content-disposition: attachment;filename=Milos_Crnogorac.doc");
$word = "<table>
<thead>
<tr>
<th><b>Milos Crnogorac</b> 48/16</th>
</tr>
</thead>
<tbody>
<tr>
<td> Moje ime je Milos Crnogorac rodjen sam u Niksicu a trenutno zivim u padinskoj skeli.Student sam Visoke skole za informacione i komunikacione tehnologije 
Smer: Informacione tehnologije 
Modul: Web programiranj.
Ovaj sajt napravljen za potrebe predmeta praktikum iz PHP-a.
</td>
</tr>
</tbody>
</table>";
echo $word;