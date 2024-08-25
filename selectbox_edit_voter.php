<?php
include("db.php");

if($_POST['type']=="state"){
    $q= "SELECT * FROM state_db";
    $querry=mysqli_query($con,$q) or die("Querry unsuccessful");

    $str="";
    
    while($row= mysqli_fetch_assoc(($querry))){
            $str .="<option value='{$row['sid']}'>{$row['stname']}</option>";
    
    }
    echo $str;
}

else if($_POST['type']=="const"){
    $q= "SELECT * FROM const_db WHERE state = {$_POST['id']}";
    $querry=mysqli_query($con,$q) or die("Querry unsuccessful");

    $str="";
    if($querry->num_rows>0){
        while($row= mysqli_fetch_assoc(($querry))){
            $str .="<option value='{$row['cid']}'>{$row['cname']}</option>";    
        }
        echo $str;
    }
}


?>