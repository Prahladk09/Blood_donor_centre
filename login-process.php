<?php
    session_start();





include_once("connection-doner.php");
/*$bloodgrp=$_GET['bloodgroup'];*/

$uid=$_GET['uid'];
$pwd=$_GET['pwd'];
$query="select type from users where uid='$uid' and pwd='$pwd'";



$table=mysqli_query($dbcon,$query);

if(mysqli_num_rows($table)==0)
    echo "Invalid id";
else
{
    while($row=mysqli_fetch_array($table))
    {
       $type=$row["type"];
    }
    $_SESSION["uid"]=$_GET["uid"];
    echo $type;
}
?>