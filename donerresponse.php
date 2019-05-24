<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body >
    
    <div class="container" style="background-color:white; color:red;margin-top:100px;">

            <div class="row">

            <div class="col-md-10">
                <h1><?php echo $_GET["msg"];?> </h1>
            
            </div>
        </div>
        <div class="row mt-4" >

            <div class="col-md-10">
                <h3><a href="doner-profile-page.php"> < Go Back to main Page</></a></h3>
            
            </div>
        </div>
    </div>

</body>

</html>
