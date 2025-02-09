<?php
    include('includes/connection.php');
    if(isset($_POST['UserRegistration'])){
        $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]', $_POST[mobile])";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
            alert('user registered Succesfully..!');
            window.location.href = 'index.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('ERROR PLEASE TRY AGAIN..!');
            window.location.href = 'register.php';
            </script>
            ";

        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Page</title>
    <!-- jQuery -->
    <script src="includes/jquery_latest.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10" id="register_home_page">
                <center><h3>New User Registration</h3></center>
                <form action="" method="post" class="d-flex flex-wrap align-items-center justify-content-center">
                    <div class="form-group mx-2">
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group mx-2">
                        <input type="email" name="email" class="form-control" placeholder="Enter The Email" required>
                    </div>
                    <div class="form-group mx-2">
                        <input type="password" name="password" class="form-control" placeholder="Enter The Password" required>
                    </div>
                    <div class="form-group mx-2">
                        <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
                    </div>
                    <div class="form-group mx-2">
                        <input type="submit" name="UserRegistration" value="Register" class="btn btn-warning">
                    </div>
                </form>
                <center class="mt-3"><a href="index.php" class="btn btn-danger">Go To Home</a></center>
            </div>
        </div>
    </div>
</body>
</html>
