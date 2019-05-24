<?php
session_start();
session_unset();

?>



<html>

<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<title>Home_Blood_Donation</title>
    
    
     <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <style type="text/css">

    <style>
    
        a
        {
            color: white;
        }
        a:hover
        {
            color: white;
        }
        
         #waitt
        {
            display: none;
        }
        
        li
        {
            margin-left: 10px;
        }
        
        li:hover
        {
           transform: scale(1.1);     
          
        }
         
         .imgset
            {
                width:100px;
                height:100px; 
                margin:20px;
                border-radius:50%;
                border: 2px solid #801a00;
                transition: ease all 1s;
                
            }
        .imgset:hover{
            
             transform: scale(1.1);
            box-shadow: 3px 3px 3px black;
        }
        
        .imgsetcard
            {
                width:200px;
                height:200px; 
                margin:20px;
                border-radius:50%;
                border: 2px solid #801a00;
                
                
            }
        
        .para
        {
            color: #801a00;
            font-weight: bold;
        }
       
        .cardset
        {
        border-radius: 10px;
            background-color: gainsboro;
            transition: ease all 1s;
        }
        
        .cardset:hover
        {  color:gray;
            background-color: white;
            box-shadow: 3px 3px 3px gray;
            transform: scale(1.1);
        }
        
        .donorcard
        {
            background-color: darkgray;
            border-radius: 15%;
            color: white;
            border: none;
             
            transform-style: preserve-3d;
            transition: transform 1s;
            
           
        }
        
      .donorcard:hover
         {  color:gray;
            background-color: white;
            box-shadow: 3px 3px 3px gray;
            transform: scale(1.1);
            border: 1px dashed gray;
        }    
        
        .ngocard
        {
            background-color: gray;
            color: white;
            border-radius: 15%;
            transition: ease all 1s;
        }
        
        
     .ngocard:hover
        {
            background-color: white;
             box-shadow: 3px 3px 3px gray;
            transform: scale(1.1);
            border-radius: 20%;
            color: #801a00;
            border: 1px dashed gray;
            
        }
        
        
    </style>
    
     <script type="text/javascript">
        $(document).ready(function(){
            
        $('.carousel').carousel({
            interval: 2000
        });    
            
            
            
            $(document).ajaxStart(function(){
                $("#waitt").show();
                $("#signup2").show();
                
            });
            
            $(document).ajaxStop(function(){
                $("#waitt").hide();
                $("#signup2").hide();
               
            });
//===============================
        
            
            //======================
              
                $("#uid").keyup(function()
                {
                     
                    
                    $uid=$("#uid").val();
                    
                   $.get("check-username-signup-ajax.php?uid=" + $uid, function(response) {
                    
                    $("#res").html(response);
                        
                        
                    });         
                    
                });
                
                $("#uid").blur(function(){
                    
                    
                    $("#res").html("");
                   
                    
                    
                    
                });
            
            //===========
            $("#signup").click(function(){
                
                if($("#uid").val()=="")
                    {
                        $("#uid").css("background-color","gray");
                        return;
                    }
                else
                    {
                        $("#uid").css("background-color","white");
                    }
                $queryString=$("#frm").serialize();
                $url="signup-ajax-process.php?"+$queryString;
                
               
                $.get($url, function(response) {
                   
                    $('#signupcomp .modal-body p').html(response);
                    $('#signupcomp').modal('show');
                    $('#signupModal').modal('hide');

                });
                
               
            });
            //================
            
             $("#login").click(function() {

                $uid = $("#loguid").val();
                $pwd = $("#logpwd").val();
                $.get("login-ajax-process.php?uid=" + $uid+"&pwd="+$pwd, function(response)
                {
                    if(response=="Invalid id")
                        alert("invalid id");
                    else
                        if(response=="donor")
                        location.href="doner-profile-page.php";
                    else
                        if(response=="needy")
                        location.href="needy-dashboard.php";
    
                
                });
            
        });
           
            });
         
         
         
         var myapp=angular.module("app",[]);
            
            myapp.controller("mycontroller",function($scope,$http){
                
                     $scope.topdonors=function()
                {  
                      
                  
                    
                    $http.get("top-donors-process.php").then(ok,notok)
                    
                    function ok($jasonArray)
                    {
                       // alert(JSON.stringify($jasonArray.data));
                        $scope.jasonArray=$jasonArray.data;
                    
                    }
                    
                    function notok(error)
                    {
                        alert(error.data);
                    }
                    
                }
                
                
                         
                     $scope.ngolinked=function()
                {  
                      
                  
                    
                    $http.get("ngo-linked-process.php").then(ok,notok)
                    
                    function ok($jasonArray2)
                    {
                        $scope.jasonArray2=$jasonArray2.data;
                    
                    }
                    
                    function notok(error)
                    {
                        alert(error.data);
                    }
                    
                }
                
                
                
            });
   
    
    
        
    </script>
    </head>
    
    <body ng-app="app" ng-controller="mycontroller" ng-init="topdonors();ngolinked();">
       
       <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        
            
                <container>
            <div class="row">
       <div class="col-md-12">
           
           <nav class="navbar fixed-top navbar-expand-lg navbar-dark " style="background-color:#801a00;">
 <a class="navbar-brand" href="index.php">
    <img src="pics/logo%20blood%20donation.jpg" width="50" height="50" class="d-inline-block align-items-center" alt="">
    Blood Donation
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      
      
       <li class="nav-item active">
        <a class="nav-link text-white " href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item active">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">Signup <span class="sr-only">(current)</span></a>
                        </li>
      
       <li class="nav-item active">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login <span class="sr-only">(current)</span></a>
                        </li>
      
      
      <li class="nav-item active">
        <a class="nav-link text-white " href="NGO-registration.php">N.G.O Registeration <span class="sr-only">(current)</span></a>
      </li>
      
        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Others</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#about">About-us</a>
                                <a class="dropdown-item" href="#contact">Contact-us</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#reach">How to reach-us</a>
                            </div>
                        </li>
      
       </ul>
    

    
  </div>
</nav>
                 
       </div>
        
    </div>  
               
               
       <center>

          
            <div id="carouselExampleControls " class="carousel slide" data-ride="carousel" style="margin-top:110px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="pics/caro1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="pics/blooddonat.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="pics/donate_blood.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
        </div>
           
           
           
        
            <div class="row mt-3 ">
            <div style="padding: 5px 0px 5px 0px; background-color: gray;" class="col-md-10 offset-md-1  text-center text-white h5 ">Our Services</div>
        </div>
            
            
            <!--          Services     cards-->
            
         <div class="row "  style="margin-top:20px;">

          <div class="col-md-3 offset-md-1  mt-3 ">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">
               <div class="card  btn-outline-danger cardset" style="width: 18rem;">
  <img class="card-img-top imgsetcard" src="pics/doner.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title font-weight-bold">Donor</h5>
    <p class="card-text para"> Sign-up on our website and create your profile as Donor.
     Donate Blood save lives.
      </p>
    
  </div>
</div></a>
   
   </div>
   
   <div class="col-md-3  mt-3  ">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">
             <div class="card  btn-outline-danger cardset" style="width: 18rem;">
  <img class="card-img-top imgsetcard" src="pics/needy.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title font-weight-bold">Needy</h5>
    <p class="card-text para">Sigup as needy. Locate the donor nearby you, whenever need blood in emergency. 
    
  </div>
</div></a>
   
   </div>
   
   <div class="col-md-3  mt-3 ">
          <a href="NGO-registration.php"> <div class="card  btn-outline-danger cardset" style="width: 18em;">
  <img class="card-img-top imgsetcard" src="pics/ngo.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title font-weight-bold">N.G.O</h5>
    <p class="card-text para">Register as N.G.O on our website. Reach more people and provide your Services . </p>
    
  </div>
</div></a>
   
   </div>
   
   </div>
<!--   ==================-->
   <br><br>
            <div class="row mt-3 ">
            <div style="padding: 5px 0px 5px 0px; background-color: gray;" class="col-md-10 offset-md-1  text-center text-white h5 ">Our Registered Donors</div>
        </div>
           
         
          
                  <!--          donor   cards-->
                
                  <center>
         <div class="row "  style="margin-top:20px;">
         
               

          <div class="col-md-3 mt-3 " ng-repeat="record in jasonArray"  >
           <div class="card  btn-outline-danger donorcard" style="width: 15rem;">
  <img class="card-img-top imgset" ng-src="uploads/{{record.profile}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title font-weight-bold">{{record.name}}</h5>
   
 <table class="table table-sm " >
        <tbody>
           <tr>
            <th scope="row">City</th>
      <td>{{record.city}}</td> 
            </tr>
            
            <tr>
            <th scope="row">Blood Donated</th>
      <td>{{record.nooftime}}</td> 
            </tr> 
        </tbody>
        
    </table>
    
  </div>
</div>
   
   </div>
   
  
   </div>  
           </center>
            
     <!--   ==================-->
   <br><br>
            <div class="row mt-3 ">
            <div style="padding: 5px 0px 5px 0px; background-color: gray;" class="col-md-10 offset-md-1  text-center text-white h5 ">N.G.O's Linked With us</div>
        </div>      
            
           
                        <!--          ngo  cards-->
         <div class="row "  style="margin-top:20px;">
        
          <div class="col-md-3 mt-3 " ng-repeat="record in jasonArray2" >
           <div class="card  btn-outline-danger ngocard" style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title font-weight-bold">{{record.ngoname}}</h5>
   
 <table class="table " >
        <tbody>
           <tr>
            <th scope="row">Address</th>
      <td>{{record.address}}</td> 
            </tr>
           <tr>
            <th scope="row">City</th>
      <td>{{record.city}}</td> 
            </tr>
               
        </tbody>
        
    </table>
    
  </div>
</div>
   
   </div>
   
  
   
   </div>   
   
   <br><br><br><br>
   
    <div class="row mt-3 ">
            <div id="reach" style="padding: 5px 0px 5px 0px; background-color: #801a00;" class="col-md-12   text-center text-white h5 ">how to reach us</div>
            
        </div>
    <div class="row " style="margin-top:50px" >
            <div style="padding: 5px 0px 5px 0px; background-color: gray;" class="col-md-5 offset-md-1 text-center text-white h5 ">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.8833500664264!2d74.95000951439738!3d30.211876617600048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f014b8f7%3A0x7fa736d540603db!2sSun-Soft+Technologies+(+Android+Java+PHP+Angular+)!5e0!3m2!1sen!2sin!4v1531464409023" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div style="padding: 5px 0px 5px 0px; background-color: gray;" class="col-md-5  text-center text-white h5 ">
                <div class="fb-page" data-href="https://www.facebook.com/Blood-Donation-269134587181029/?modal=admin_todo_tour" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Blood-Donation-269134587181029/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Blood-Donation-269134587181029/?modal=admin_todo_tour">Blood Donation</a></blockquote></div>
            </div>
            
        </div>
   
   
   <br><br>
   
   
   <div class="row mt-3 " style="background-color:black;color:white">
            <div class="col-md-6" >
            
            <div style="padding: 5px 0px 5px 0px; background-color: gray;" class="col-md-12   text-center text-white h5 ">
            contact-us
             </div>
             
             <div id="contact">
               
              <p>Contact number : +919592845238</p>
               <p>Mail us at : prahladk09@gmail.com</p>
               <p>For feedbacks and suggestions. </p>
                </div>
                
             </div>
             
              
              <div class="col-md-6" >
            
            <div style="padding: 5px 0px 5px 0px; background-color: gray;" class="col-md-12   text-center text-white h5 ">
            About-us
             </div>
             
             <div id="about">
               <p> Powered by : Sun Soft Technologies and BCE, Bathinda </p>
                 <p>Founder and Director :  Mr. Prahlad Kumar</p>
                 <p>Developed and Managed by : Mr. Prahlad Kumar  </p>
              
                </div>
                
             </div>
             
                 
        </div>
   
   
   </center>
    
<!--    signup modal-->
           
            <div class="modal fade" tabindex="-1" role="dialog" id="signupModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#801a00;">
                    <h5 class="modal-title text-white">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <form  id="frm">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="uid">User Name</label> 
                            <span id="res" class="text-danger"></span>
                            <img id="waitt" src="../pics/wait3.gif" >
                            
                            <input type="text" required class="form-control" id="uid" name="uid" aria-describedby="emailHelp" placeholder="user name">
                            
                            

                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" required class="form-control" id="pwd" name="pwd" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" required class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" placeholder="mobile number">

                        </div>
                         <div class="form-group">
                            <label for="type">Type</label>
                            <select class="custom-select mr-sm-2 col-md-4" required id="type" name="type" >
                                 <option selected>select</option>
                                 <option value="donor">donor</option>
                                 <option value="needy">needy</option>
                                
                                </select>

                        </div>



                    </div>
                    <div class="modal-footer" style="background-color: #801a00;">
                       
                       <button type="button" class="btn btn-outline-light" name="btn" id="signup" value="signup">Signup</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<!-- login modal-->
              <div class="modal fade" tabindex="-1" role="dialog" id="loginModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#801a00;">
                    <h5 class="modal-title text-white">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <form  id="frmlogin">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="loguid">User Name</label> 
                            <span id="logres" class="text-danger"></span>
                            <img id="waitt" src="pics/wait3.gif" >
                            
                            <input type="text" class="form-control" id="loguid" name="loguid" aria-describedby="emailHelp" placeholder="user name">
                            
                            

                        </div>
                        <div class="form-group">
                            <label for="logpwd">Password</label>
                            <input type="password" class="form-control" id="logpwd" name="logpwd" placeholder="password">
                        </div>
                        
                        



                    </div>
                    <div class="modal-footer" style="background-color: #801a00;">
                       
                       <button type="button" class="btn btn-outline-light" name="btn" id="login" value="login">Login</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        
                       
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Small modal -->
<div class="modal" tabindex="-1" id="signupcomp" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color: #801a00;">
        <h5 class="modal-title">Signup-process</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-success h4"></p>
      </div>
      <div class="modal-footer "  style="background-color: #801a00;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>   
    
    
      <!-- Small modal2 -->
<div class="modal" tabindex="-1" id="signup2" role="dialog">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header"  style="background-color: gray;">
        <h5 class="modal-title">Signup-process</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-success h4"> loading please wait..</p>
      </div>
    
    </div>
  </div>
</div>   
     </container>  
        
    </body>
    
</html>