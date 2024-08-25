<?php
$con=mysqli_connect("localhost","root","");
if(!$con)
    die ("cannot connect to the database");
mysqli_select_db($con,"voting");

?>