<?php
if(isset($_POST["send"])):
    include "../../config/connection.php";
    
    $name = $_POST["catName"];
       
            $query = "insert into categories values('','$name')";
            $prepared = $conn->prepare($query);
            $prepared->execute();
                
            $message = "successfully added new category";
            header("location:../../index.php?page=admin&message=".$message);
            
endif;
?>