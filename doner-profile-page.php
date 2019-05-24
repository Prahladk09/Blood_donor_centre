<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doner Profile page</title>
     <script src="js/angular.min.js" type="text/livescript"></script>
    <script src="js/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    
     <script type="text/javascript">
        function showpreview(file) 
        {
           
            
            alert($("#hdn").val());

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#prev').attr('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }
        
        $(document).ready(function(){
           
             
             $("#fetch").click(function(){
                 
                $did=$("#did").val();
                $.getJSON("doner-fetch-one.php?did="+$did,function(jsonArray){
                    
                    //alert(JSON.stringify(jsonArray));
                    $("#name").val(jsonArray[0].name);
                    $("#age").val(jsonArray[0].age);
                    $("#bloodgrp").val(jsonArray[0].bloodgrp);
                    $("#prev").prop("src","uploads/"+jsonArray[0].profile);
                    $("#hdn").val(jsonArray[0].profile);
                    $("#gender").val(jsonArray[0].gender);
                    $("#address").val(jsonArray[0].address);
                    $("#mobile").val(jsonArray[0].mobile);
                    $("#city").val(jsonArray[0].city);
                    $("#number").val(jsonArray[0].nooftime);
                    $("#medical").val(jsonArray[0].medicalhistory);
                    
                });
            });
       

        $("#update").click(function() {

            $queryString = $("#frm").serialize();
            $url = "donerupdate.php?" + $queryString;


            $.get($url, function(response) {
                //alert(response);
                $("#resp").html(donerresponse);

            });
        });

        $("#save").click(function() {

            $queryString = $("#frm").serialize();
            $url = "donersave.php?" + $queryString;

           // alert($url);
            $.get($url, function(donerresponse) {
               // alert(response);
                $("#resp").html(donerresponse);

            });
        });
         });
    </script>
    <style>
        body
        {
            background-color: white;
        }
    </style>
    
</head>
<body ng-int=fetchAll();>
   
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark"  style="background-color:#801a00;">
 <a class="navbar-brand">
    <img src="pics/logo%20blood%20donation.jpg" width="50" height="50" class="d-inline-block align-items-center" alt="">
   <a class="navbar-brand text-white">Blood Donation</a>
  </a>
                <a class="navbar-brand text-white" href="#" style="margin-top: 10px;margin-left:200px;font-size:50px;font-family:cursive">
                    <b><b> DONOR PROFILE </b></b>
  </a>
  <a  href="index.php"><button class="btn btn-dark my-2 my-sm-2 " style="margin-left:350px" type="button" name="logout" id="logout" value="logout" >logout</button>
      </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>

            <a  href="index.php"><button class="btn btn-dark my-2 my-sm-2 " style="margin-left:600px" type="button" name="logout" id="logout" value="logout" >logout</button>
      </a>
           
            </nav>
        </div>
    </div>
    
    <br> <br> <br> <br> <br><br>
   
    <div class="container">
    <form name="frm" action="donersave.php" method="post" enctype="multipart/form-data">
    
     <input type="hidden" id="hdn" name="hdn">
    
  <div class="form-group">
       <div class="id">
       <label for="exampleInputdoner1"> Doner Id</label>
    <input type="text" name="did" class="form-control" id="did" aria-describedby="emailHelp" placeholder="Enter doner id" style="float:left;">
      </div><spam>* If you have Donor ID then enter and search or if you haven't then create new Doner ID. </spam>
      <br><br><br>
      <div class="search1">
     <input type="button" value="Search" id="fetch" style="margin-left:500px">
    <hr> 
      <div id=box>
                        <img src="" id="prev" width="150" height="150" border-radius="50%">
                        <br><br>
                        <input type="file" name="profile" id="profile" onchange="showpreview(this);">
                    </div>
    
    <br>
    

    </div>
  <label for="exampleInputName1">Your Name</label>
 <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
   <br>
    <label for="exampleInputEmail1">Age</label>
    <input type="text" name="age" class="form-control" id="age" aria-describedby="emailHelp" placeholder="Enter Age">
    <br>
     <label for="exampleInputEmail1">Blood Group</label>
     <select name="bloodgrp" id="bloodgrp" >
         <option value="none">Select</option>
         <option value="Apos">A+</option>
          <option value="Aneg">A-</option>
          <option value="Bpos">B+</option>
          <option value="Bneg">B-</option>
          <option value="Opos">O+</option>
          <option value="Oneg">O-</option>
          <option value="ABpos">AB+</option>
          <option value="ABneg">AB-</option>
          </select>
     <br><br>
      <label for="exampleInputEmail1">Gender</label>
           <br>
            <select id="gender" name="gender" >
            <option value="none">Select</option>
          <option value="male">MALE</option>
          <option value="female">FEMALE</option>
          </select>
          <br><br>
      <label for="exampleInputEmail1">Address</label><br>
    <textarea rows="2" cols="50" id="address" name="address"></textarea>
    <br>
    <label for="exampleInputEmail1">City</label>
     <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp" placeholder="Enter City">
     <br>
      <label for="exampleInputEmail1">Mobile</label>
     <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" placeholder="Enter mobile">
     <br>
      <label for="exampleInputEmail1">No. of time Blood donated</label>
     <input type="text" class="form-control" id="number" name="number" aria-describedby="emailHelp" placeholder="Enter no. of time">
     <br>
      <label for="exampleInputEmail1">Medical History</label>
      <br>
      <textarea rows="2" cols="50" id="medical"  name="medicalhistory"></textarea>
     
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="btn" id="save" value="save" >Submit</button>
  <button type="submit" class="btn btn-primary" name="btn" id="update" value="update" >Update</button>
</form>
        
   </div>

    <br> <br> <br> <br> <br> <br>
    
    
    
</body>
</html>