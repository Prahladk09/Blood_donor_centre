<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doner Profile page</title>
     <script src="js/angular.min.js" type="text/livescript"></script>
    <script src="js/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <style>
        #main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 1200px;
            width: 900px;
            margin: auto;
        }

        a {
            color: black;
        }

    </style>
        <script type="text/javascript">
        $(document).ready(function() {


            $("#search").click(function() {

                $did = $("#did").val();
                $.getJSON("doner-fetch-one.php?donerid=" + $did, function(jsonArray) {

                    /* alert(JSON.stringify(jsonArray));*/
                    $("#dname").val(jsonArray[0].dname);
                    $("#age").val(jsonArray[0].age);
                    $("#bloodgroup").val(jsonArray[0].bloodgroup);
                    $("#gender").val(jsonArray[0].gender);
                    $("#address").val(jsonArray[0].address);
                    $("#city").val(jsonArray[0].city);
                    $("#mobile").val(jsonArray[0].mobile);
                    $("#donated").val(jsonArray[0].donated);
                    $("#medical").val(jsonArray[0].medical);
                });
            });
        });

    </script>   
    </head>
    
    <body>
         <nav class="navbar navbar-danger bg-danger">
        <a class="navbar-brand" href="login.php">
            <h1>Donor Dashboared</h1>
        </a>
    </nav>
    
    <div class="row h3 bg-success text-white">
        <div class="col-md-3 " style="padding:10px;">
            welcome:<?php echo $_SESSION["uid"]; ?>
        </div>
        <div class="col-md-1 offset-8 h3 bg-success text-white" style="padding:10px;">
            <a href="logout.php">Logout</a>
        </div>
    </div>
        
        
        
        
        
        
    </body>
    
</html>