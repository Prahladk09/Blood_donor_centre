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
                $http.get("angular-json-needy-fetchall-process.php").then(ok,notok);
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
    <input type="button" ng-click="fetchAll();" value="fetch all">
    <hr>
    <center>
    <input type="text" ng-model="srch" placeholder="Enter name">
    </center>
    <table class="table">
       <thead class="thead-dark">
        <tr><th>Needy ID</th><th>Name</th><th>ID Proof</th><th>Mobile</th><th>Address</th><th>CITY</th></tr>
        </thead>
        <tr ng-repeat="record in jsonArray | filter:srch">
               <td>{{record.nid}}</td>
             <td>{{record.name}}</td>
             <td>{{record.selected}}</td>
             <td>{{record.mobile}}</td>
             <td>{{record.address}}</td>
             <td>{{record.city}}</td>
             
        </tr>
    </table>
</body>
</html>