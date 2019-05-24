<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript">
        
        var myapp=angular.module("app",[]);
        myapp.controller("myController",function($scope,$http)
        {
            $scope.jsonArray=[];
            
            $scope.fetchAll=function()
            {
                $http.get("angular-json-doner-fetchall-process.php").then(ok,notok);
                function ok($jsonArray)
                {
                    $scope.jsonArray=$jsonArray.data;
                    //alert(JSON.stringify($scope.jsonArray));
                    /*for(i=0;i<$scope.jsonArray.length;i++)
                        alert($scope.jsonArray[i].did);*/
                }
                function notok(error)
                {
                    
                    alert(error.data);
                }
            }
            
        });
    
    
    
    </script>
</head>
<body ng-app="app" ng-controller="myController">
    
<!--    <input type="button" ng-click="fetchAll();" value="fetch all">-->
    
    <hr>
    <center>
    <lebel>Search :</lebel>
    <input type="text" ng-model="srch" placeholder="Enter name">
    </center>
    <br><br>
    <table class="table">
       <thead class="thead-dark">
        <tr>
        <th>Doner ID</th>
        <th>Name</th><th>AGE</th><th>Blood Group</th><th>Address</th><th>CITY</th><th>Mobile</th><th>Medical History</th><th>Blood donated</th><th>Profile Pic</th></tr>
        </thead>
        <tr ng-repeat="record in jsonArray | filter:srch">
               <td>{{record.donerid}}</td>
             <td>{{record.name}}</td>
             <td>{{record.age}}</td>
             <td>{{record.bloodgrp}}</td>
             <td>{{record.address}}</td>
             <td>{{record.city}}</td>
             <td>{{record.mobile}}</td>
             <td>{{record.medicalhistory}}</td>
             <td>{{record.nooftime}}</td>
             <td><img src="uploads/{{record.profile}}" width="100" height="100"> </td>
            
        </tr>
    </table>
</body>
</html>