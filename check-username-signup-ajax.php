<?php
include_once("connection-doner.php");
  $uid=$_GET["uid"];

$query="select * from users where uid='$uid'";
$table=mysqli_query($dbcon,$query);
if(mysqli_num_rows($table)==0)
{
    echo " Available";
}
else
    echo "Not Available..";
?>