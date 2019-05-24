<?php

include_once("connection-doner.php");


$query="select * from blooddoner";

$table=mysqli_query($dbcon,$query);

$ary=array( );

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);



?>