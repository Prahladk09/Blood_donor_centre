<?php

include_once("needy-connection.php");

if($_POST["btn"]=="save")
    doSave($dbcon);
else
    doUpdate($dbcon);
function doSave($dbcon)
{
    $nid=$_POST["nid"];
    $name=$_POST["name"];
    $select=$_POST["select"];
    $mobile=$_POST["mobile"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    
    $orgname=$_FILES["profile"]["name"];
    $tmpName=    $_FILES["profile"]["tmp_name"];

    
move_uploaded_file($tmpName,"uploads/".$orgname);


    $query="insert into needytable values('$nid','$name','$select','$orgname','$mobile','$address','$city')";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="" && mysqli_affected_rows($dbcon)==1)
        header("location:needy-response.php?msg=Saved Successfully");
        else
        echo mysqli_error($dbcon);
}

function doUpdate($dbcon)
{
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

    $query="update needytable set name='$name',selected='$select',mobile='$mobile',address='$address',city='$city',profile='$orgname' where nid='$nid'";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)==""  && mysqli_affected_rows($dbcon)==1)
        header("location:needy-response.php?msg=Record updated successfully..");
        else
        echo mysqli_error($dbcon);
}
?>
