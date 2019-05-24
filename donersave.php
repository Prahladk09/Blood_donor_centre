<?php

include_once("connection-doner.php");

if($_POST["btn"]=="save")
    doSave($dbcon);
else
    doUpdate($dbcon);
function doSave($dbcon)
{
$did=$_POST["did"];
    $name=$_POST["name"];
    $age=$_POST["age"];
    $bloodgrp=$_POST["bloodgrp"];
    $gender=$_POST["gender"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $mobile=$_POST["mobile"];
    $nooftime=$_POST["number"];
    $medical=$_POST["medicalhistory"];

    $orgname=$_FILES["profile"]["name"];
    $tmpName=    $_FILES["profile"]["tmp_name"];

    
    move_uploaded_file($tmpName,"uploads/".$orgname);


    $query="insert into blooddoner values('$did','$name','$age','$bloodgrp','$gender','$address','$city','$mobile','$medical','$nooftime','$orgname')";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="" && mysqli_affected_rows($dbcon)==1)
        header("location:donerresponse.php?msg=Saved Successfully");
        else
        echo mysqli_error($dbcon);
}
function doUpdate($dbcon)
{
     $did=$_POST["did"];
    $name=$_POST["name"];
    $age=$_POST["age"];
    $bloodgrp=$_POST["bloodgrp"];
    $gender=$_POST["gender"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $mobile=$_POST["mobile"];
    $nooftime=$_POST["number"];
    $medical=$_POST["medicalhistory"];

    
    $orgname=$_FILES["profile"]["name"];
    $tmpName= $_FILES["profile"]["tmp_name"];
    
    
    if($orgname!="")
    {
        move_uploaded_file($tmpName,"uploads/".$orgname);
    }
    else
        $orgname=$_POST["hdn"];

    $query="update blooddoner set name='$name',age='$age',bloodgrp='$bloodgrp',gender='$gender',address='$address',city='$city',mobile='$mobile',medicalhistory='$medical',nooftime='$nooftime',profile='$orgname' where donerid='$did'";

    mysqli_query($dbcon,$query);
    if(mysqli_error($dbcon)=="" && mysqli_affected_rows($dbcon)==1)
        header("location:donerresponse.php?msg=Record updated successfully..");
        else
        echo mysqli_error($dbcon);
}
?>
