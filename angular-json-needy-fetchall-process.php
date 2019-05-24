<?php

include_once("needy-connection.php");


$query="select * from needytable";

$table=mysqli_query($dbcon,$query);

$ary=array( );

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);



?>