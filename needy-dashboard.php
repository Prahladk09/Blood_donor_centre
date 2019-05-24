<?php
session_start();
if(isset($_SESSION["uid"])==false)
    header("location:index.php");
?>


<html>




<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<title>Needy_Dashboard</title>
    
    
     <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <style>
    
        .card
        { 
          background-color: gainsboro;
        }
        
          .card:hover {
            box-shadow: 5px 5px 10px gray;
            transition: ease all 1s;
              background-color: #801a00;
        }
        
          #head
        {
            margin-top: 100px;
            text-shadow: 3px 3px 3px gray;
            font-size: 40px;
           font-family: Calibri;
            font-weight: bold;
            text-decoration: underline;
        }
    
        
        
        
        
        
    </style>
    </head>
    
    
    <body>
    <container>   
         <div class="row" >
       <div class="col-md-12">
           
           <nav class="navbar fixed-top navbar-expand-lg navbar-dark " style="background-color:#801a00;">
 <a class="navbar-brand " href="index.php">
    <img src="../pics/logo%20blood%20donation.jpg" width="50" height="50" class="d-inline-block align-items-center" alt="">
    Blood Donation
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
       <h4 class="text-white font-weight-bold font-italic ">WELCOME :  <?php echo $_SESSION["uid"]; ?>  </h4>
      </li>
     
      
       </ul>
    
    
    <a  href="index.php"><button class="btn btn-dark my-2 my-sm-2 " type="button" name="logout" id="logout" value="logout" >logout</button>
      </a>
  </div>
</nav>
            </div>        
        
    </div>
    
    <center>
         

       
       <!--      heading   -->
        
         <div id="head">NEEDY DASHBOARD</div>
        
        
         
       <!--               cards-->
         <div class="row "  style="margin-top:50px;">
         
          <div class="col-md-3 offset-md-3 mt-3">
          
           <div class="card  btn-outline-danger" style="width: 18rem;">
  <img class="card-img-top" src="../pics/needy.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title font-weight-bold">Profile</h5>
    <p class="card-text">Fill the information requied.
    Update your Profile</p>
    <a href="needy-profile.php" class="btn btn-dark">Profile>></a>
  </div>
</div>
            
            
             </div>
     
          <div class="col-md-3 mt-3">
           <div class="card  btn-outline-danger" style="width: 18rem;">
  <img class="card-img-top" src="../pics/bloodsearch.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title font-weight-bold">Blood Search</h5>
    <p class="card-text">Search for the Blood needed.
    Locate the Donor nearby you</p>
    <a href="blood-search-front.php" class="btn btn-dark">Search>></a>
  </div>
</div>
   
   </div>
   </div>
   
      
   
   </center>
   
   </container> 
   <br><br><br>
    </body>
</html>