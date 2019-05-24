<?php

include_once("connection-doner.php");




$query="select profile,name,city,nooftime from blooddoner order by nooftime desc limit 4";

$table=mysqli_query($dbcon,$query);

$ary=array();

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);



?>