
<?php

include_once("connection-doner.php");
 $uid=$_GET["uid"];
    $pwd=$_GET["pwd"];
    $mobile=$_GET["mobile"];
    $type=$_GET["type"];

    $query="insert into users values('$uid','$pwd','$mobile','$type')";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
        echo "signup completed <br> Please Login For Acess";
        else
        echo mysqli_error($dbcon);
?>