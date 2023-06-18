<?php
function pageAttendencePercent(){
    $array = ["home"=>"","about"=>"","products"=>"","admin"=>"","user"=>"","profilePicture"=>""];
    $sum = 0;
    $home = 0;
    $about = 0;
    $products = 0;
    $admin = 0;
    $profilePicture = 0;
    $user = 0;



    // Osnovna podesavanja
    define("ABS_PATH", $_SERVER["DOCUMENT_ROOT"]."/pphp sajt");

    $oneDayAgo = strtotime("1 day ago");
    $file = file(ABS_PATH."\\data\\logs\\visitLog.txt");
    $brojElemenataNiza = count($file);
    if(count($file)):
        for($i=0; $i<$brojElemenataNiza; $i++):
            $pieces = explode("\t",$file[$i]);
            $url = explode(".php",$pieces[0]);
            $page=explode("&",$url[0]);
            
            
            if($pieces[1] >= $oneDayAgo):
                switch($page[1]):
                    case "":$home++;$sum++;break;
                    case "?page=":$home++;$sum++;break;
                    case "?page=about":$about++;$sum++;break;
                    case "?page=products":$products++;$sum++;break;
                    case "?page=admin":$admin++;$sum++;break;
                    case "?page=user":$user++;$sum++;break;
                    case "?page=profilePicture":$profilePicture++;$sum++;break;
                    default:$home++;$sum++;break;
                endswitch;
            endif;
        endfor;
        if($sum>0):
            $array ["home"] = round($home*100/$sum,2);
            $array ["about"] = round($about*100/$sum,2);
            $array ["products"] = round($products*100/$sum,2);
            $array ["admin"] = round($admin*100/$sum,2);
            $array ["user"] = round($user*100/$sum,2);
            $array ["profilePicture"] = round($profilePicture*100/$sum,2);
        endif;
    endif;

    return $array;


}


?>