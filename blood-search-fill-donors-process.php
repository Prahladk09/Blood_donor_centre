<?php

include_once("connection-doner.php");

$blood=$_GET["bloodgrp"];
$city=$_GET["city"];


$query="select * from blooddoner where bloodgrp='$blood' AND city='$city'";

$table=mysqli_query($dbcon,$query);

$ary=array( );

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);



?>