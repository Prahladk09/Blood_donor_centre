<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viweport" content="width=device-width,inital-scale=1,shrink-to-fit=no">
    <title>Document</title>
    
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/angular.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript">
        
        var myapp = angular.module("module", []);


        myapp.controller("myController", function($scope, $http) {
            $scope.jsonArray = [];

            $scope.fetchAll = function() {
                $http.get("angular-json-needy-fetchall-process.php").then(ok, notok);

                function ok($jsonArray) {
                    $scope.jsonArray = $jsonArray.data;
                    //alert(JSON.stringify($scope.jsonArray));
                }

                function notok(error) {

                    alert(error.data);
                }
                
            }

            $scope.doSms=function(mobile)
            {
                $http.get("sms-send.php?mobile="+mobile).then(ok, notok);
                function ok(res)
                {
                    alert(res.data);
                }
                function notok(res)
                {
                    alert(res.data);
                }

            }
        });

    </script>
</head>

<body ng-app="module" ng-controller="myController" ng-init="fetchAll();">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info">
                <a class="navbar-brand text-danger" href="#" style="margin-top: 30px;margin-left:400px;font-size:50px;font-family:cursive">
    
                    <b><b> NEEDY RESULT </b></b>
  </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
    </div>
   
        <input type="button" ng-click="fetchAll();" value="fetch all">
        <hr>
        <center>
            search:<input type="text" ng-model="srch" placeholder="hint..">
        </center><br><br>
        <div class="row" style="height:600px; overflow:scroll;">
            <div class="col-md-4 mt-3 "  ng-repeat="record in jsonArray|filter:srch" >
                <div class="card" >
                    <center><img class="card-img-top" style="width:100px; height:100px; margin:20px;border-radius:50%" src="uploads/{{record.profile}}" alt="Card image cap"></center>
                    <div class="card-body">
                        <h5 class="card-title text-danger">{{record.name}}</h5>
                        <p class="card-text">
                            
                     <table width=100%>
                     <tr><td>ID PROOF:</td><td>{{record.selected}}</td></tr>
                     <tr><td>Address :</td> <td>{{record.address}}</td></tr>
                     <tr><td>City :</td> <td>{{record.city}}</td></tr>
                     <tr><td>Mobile:</td> <td>{{record.mobile}}</td></tr>
                     <tr><td>City :</td> <td>{{record.city}}</td></tr>
                     
                        
                         
                            </table>
                        </p>
                    <button ng-click="doSms(record.mobile);" class="btn btn-primary">Send SMS</button>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
