<?php

include_once("needy-connection.php");
   $nid=$_POST["nid"];
    $name=$_POST["name"];
    $select=$_POST["select"];
    $mobile=$_POST["mobile"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    
    $orgname=$_FILES["profile"]["name"];
    $tmpName=    $_FILES["profile"]["tmp_name"];

    
    if($orgname!="")
    {
        move_uploaded_file($tmpName,"uploads/".$orgname);
    }
    else
        $orgname=$_POST["hdn"];

    $query="update needytable set name='$name',select='$select',mobile='$mobile',address='$address',city='$city',profile='$orgname' where nid='$nid'";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="")
        header("location:needyresponse.php?msg=Record updated successfully..");
        else
        echo mysqli_error($dbcon)
?>


