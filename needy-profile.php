<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Needy profile page</title>
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
         
          $("#save").click(function() {

            $queryString = $("#frm").serialize();
            $url = "needy-save.php?" + $queryString;

            alert($url);
            $.get($url, function(donerresponse) {
               // alert(response);
                $("#resp").html(needy-response);

            });
        
       
        $("#update").click(function() {

            $queryString = $("#frm").serialize();
            $url = "needy-update.php?" + $queryString;


            $.get($url, function(response) {
                //alert(response);
                $("#resp").html(needy-response);

            });
        });
    </script>    
    <style>
        
        body
        {
            background-color:white;
        }
        
        
    </style>
    
    </head>
<body>
    
     <div class="row">
        <div class="col-md-12">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark"  style="background-color:#801a00;">
 <a class="navbar-brand">
    <img src="pics/logo%20blood%20donation.jpg" width="50" height="50" class="d-inline-block align-items-center" alt="">
   <a class="navbar-brand text-white">Blood Donation</a>
  </a>>
                <a class="navbar-brand text-white" href="#" style="margin-top: 10px;margin-left:150px;font-size:50px;font-family:cursive">
    
                    <b><b> Needy profile page </b></b>
  </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>

           <a  href="index.php"><button class="btn btn-dark my-2 my-sm-2 " style="margin-left:600px" type="button" name="logout" id="logout" value="logout" >logout</button>
      </a>
           
            </nav>
        </div>
    </div>
    
    
    <br> <br> <br> <br> <br><br><br><br><br><br>
    
    
    <div class="container">
    
    <div col-md-4>
    
   <form name="frm" action="needy-save.php" method="post" enctype="multipart/form-data">
     
      <input type="hidden" id="hdn">
      
  <div class="form-group row">
    <label for="inputid" class="col-sm-2 col-form-label">Needy ID :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter ID">
    </div>
  </div><br>
  <div class="form-group row">
    <label for="inputname" class="col-sm-2 col-form-label">Name :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
    </div>
  </div><br>
  <div class="form-group row">
   <label for="inputname" class="col-sm-2 col-form-label">ID Proof :</label>
   <select style="margin-left:20px" class="select mr-sm-3" id="select" name="select">
        <option selected>Choose...</option>
        <option value="Adhar card">Adhar card</option>
        <option value="Driving licence">Driving licence</option>
        <option value="Pan card">Pan card</option>
        <option value="Voter id">Voter id</option>
      </select>
       </div>
                   <div id=box style="margin-left:500px;margin-top:-50px">
                        <img src="" id="prev" width="150" height="150" border-radius="50%">
                        <br><br>
                        <input type="file" name="profile" id="profile" onchange="showpreview(this);">
                    </div>
 
   <br>
    <div class="form-group 
    row">
    <label for="inputmobile" class="col-sm-2 col-form-label">Mobile NO :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile No.">
    </div>
  </div><br>
  
   <div class="form-group row">
    <label for="inputaddress" class="col-sm-2 col-form-label">Address :</label>
    <textarea style="margin-left:15px" rows="3" cols="114" id="address" name="address"></textarea>
  </div><br>
  
   <div class="form-group row">
    <label for="inputcity" class="col-sm-2 col-form-label">City :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
    </div>
  </div><br>
  
   
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="btn" id="save" value="save" style="margin-left:400px">Save</button>
      <button type="submit" class="btn btn-primary" name="btn" id="update" value="update" style="margin-left:50px">Update</button>
    </div>
  </div>
</form>
   <br><br><br><br><br><br><br><br>
    
    
    </div> 
    </div>
    
</body>
</html>