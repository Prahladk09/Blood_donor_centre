<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blood_Search</title>
    
    
     <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/angular.min.js"></script>
        
        
        <style>
            
                #head
        {
            margin-top: 100px;
            text-shadow: 3px 3px 3px gray;
            font-size: 40px;
           font-family: Calibri;
            font-weight: bold;
            text-decoration: underline;
        }
    #fetch
            {
                  margin-top: 30px;
            }
    .mrg
        {
            font-family: calibri;
            font-weight: bold;
        }
            
            .cardset
            {
             background-color: darkgray;
                border-radius: 10%;
                color: white;
                cursor: pointer;
               transition: ease all 1s;
               margin-left:20px;
            }
            
            .cardset:hover
            {
            color:gray;
            background-color: white;
            box-shadow: 3px 3px 3px gray;
            transform: scale(1.1);
            
               
            }
            
            .info
            {
                
            font-style: normal;
            color: black;
              
            }
            
            .info:hover
            {
                font-style: normal;
                color:#801a00;
            }
            
            .dname:hover
            {
                text-decoration: underline;
                color: #801a00;
                 transform: scale(1.1);
            }
            
            .imgset
            {
                width:100px;
                height:100px; 
                margin:20px;
                border-radius:50%;
                border: 2px solid #801a00;
                
                
            }
            
            .imgset:hover
            {
                transform: scale(1.1);
              box-shadow: 3px 3px 3px black;  
                  
            }

            
    </style>
        
        <script type="text/javascript">
    var myapp=angular.module("app",[]);
            
            myapp.controller("mycontroller",function($scope,$http){
                
               
                
                 $scope.fetchblood=function()
                {
                     $scope.jasonArray=[];
                    $http.get("blood-search-fill-blood-groups-process.php").then(ok,notok)
                    
                    function ok($jasonArray)
                    {
                        $scope.jasonArray=$jasonArray.data;
                    }
                    
                    function notok(error)
                    {
                        alert(error.data);
                    }
                    
                }
                 
                //fetch cites
                   $scope.fetchcity=function()
                {  
                       //alert($scope.blood);
                    $http.get("blood-search-fill-cities-process.php?bloodgrp="+$scope.blood).then(ok,notok)
                    
                    function ok($jasonArray2)
                    {
                        //alert(JSON.stringify($jasonArray2.data));
                        $scope.jasonArray2=$jasonArray2.data;
                       
                    }
                    
                    function notok(error)
                    {
                        alert(error.data);
                    }
                    
                }
                
                   
                     $scope.fetchdonor=function()
                {  
                      
                    
                   
                         
                    
                    $http.get("blood-search-fill-donors-process.php?bloodgrp="+$scope.blood+"&&city="+$scope.city ).then(ok,notok)
                    
                    function ok($jasonArray3)
                    {
                        $scope.jasonArray3=$jasonArray3.data;
                        
                    }
                    
                    function notok(error)
                    {
                        alert(error.data);
                    }
                    
                }   
                
            });
            
    </script>

    </head>
    
    
    
    <body  ng-app="app" ng-controller="mycontroller" ng-init="fetchblood();">
        <container>
            
            <form>
                
                 <div class="row" >
       <div class="col-md-12">
           
           <nav class="navbar fixed-top navbar-expand-lg navbar-dark " style="background-color:#801a00;">
 <a class="navbar-brand " href="#">
      <img src="pics/logo%20blood%20donation.jpg" width="50" height="50" class="d-inline-block align-items-center" alt="">

    Blood Donation
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link text-white " href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      
      
      <li class="nav-item active">
        <a class="nav-link text-white " href="blood-search-front.php">Blood-Search <span class="sr-only">(current)</span></a>
      </li>
      
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Registeration
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="doner-profile-page.php">Donor</a>
          <a class="dropdown-item" href="NGO-registration.php">N.G.O</a>
          <a class="dropdown-item" href="needy-profile.php">Needy</a>
           </div>  
      </li>
      
       </ul>
    
    
  </div>
</nav>
                
    </div>
               
    </div>
                
                <center>
                   <!--      heading   -->
        
         <div id="head">Blood Search</div>
                   
                   
                    <div class="row mrg" id="fetch" >
                    <div class="col-md-12">
                  <div class="col-auto my-1">
                  
        <!--        fetch blood groups-->
                  
      <label class="mr-sm-2 col-md-2" >Available Blood Groups :  </label>
      <select class="custom-select mr-sm-2 col-md-2" ng-model="blood" ng-change="fetchcity();" >
                  <!--  <option ng-repeat="record in jasonArray" value="{{record.bloodgrp}}" >{{record.bloodgrp}} </option>-->
                     <option value="ANeg">A-</option>
                     <option value="APos">A+</option>
                     <option value="BPos">B+</option>
                     <option value="BNeg">B-</option>
                     <option value="ONeg">O-</option>
                     <option value="Opos">O+</option>
                     <option value="ABNeg">AB-</option>
                     <option value="ABpos">AB+</option>
                      </select>
                    </div>
                    
        <!--               fetch cities-->
                    <div class="col-auto my-1">
      <label class=" col-md-1 mr-sm-2  col-md-2" >Cities :  </label>
      <select class="custom-select mr-sm-2 col-md-2" ng-model="city" ng-change="fetchdonor();" >
                   <option ng-repeat="record in jasonArray2" value="{{record.city}}" >{{record.city}} </option>
                    </select>
                    </div>
                    </div>
                    
                    </div>
                    
                     <br><hr class="col-md-6" style="height:1px; background-color:#801a00;">
                     
        <!--          donar profile card-->
   
    <div class="row">
    <div class="col-md-3 mt-3" ng-repeat="record in jasonArray3">
    
    <div class="card cardset" >
  <img class="card-img-top imgset" ng-src="uploads/{{record.profile}}" alt="Card image cap"  >
  <div class="card-body">
   
    <h5 class="card-title dname ">{{record.name}}</h5>
    
    <table class="table table-hover info" >
        <tbody>
           <tr><td>Medical History:</td><td>{{record.medicalhistory}}</td></tr>
                     <tr><td>Blood Group :</td> <td>{{record.bloodgrp}}</td></tr>
                     <tr><td>AGE :</td> <td>{{record.age}}</td></tr>
                     <tr><td>Gender:</td> <td>{{record.gender}}</td></tr>
                     <tr><td>City :</td> <td>{{record.city}}</td></tr>
                     <tr><td>Blood Donated :</td> <td>{{record.nooftime}}</td></tr>
                        
        </tbody>
        
    </table>
    
   
    <a href="#" class="btn btn-outline-info">Send Text</a>
  </div>
</div>
     
     </div>    
                    </div>  
                </center>
                    
            </form>
        </container>
      
    </body>
</html>