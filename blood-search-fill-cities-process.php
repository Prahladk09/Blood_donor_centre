<?php

include_once("connection-doner.php");

$blood=$_GET["bloodgrp"];

$query="select distinct city from blooddoner where bloodgrp='$blood'";

$table=mysqli_query($dbcon,$query);

$ary=array( );

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);



?>