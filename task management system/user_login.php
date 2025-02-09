<?php
    session_start();
    include('includes/connection.php');
    if(isset($_POST['UserLogin'])){
        $query = "select email,password,name,uid from users where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['uid'] = $row['uid'];
            }
            echo "<script type='text/javascript'>
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('PLEASE ENTER CORRECT DETAILS..!');
            window.location.href = 'user_login.php';
            </script>
            ";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management System</title>
    <!-- jquery file -->
    <script src="includes/jquery_latest.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>
<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="login_home_page">
            <center><h3>User Login</h3></center>
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter The Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter The Password" required>
                </div><br>
                <center><div class="form-group">
                    <input type="submit" name="UserLogin" value="Login" class="btn btn-warning">
                </div></center>
            </form>
            <center><a href="index.php" class="btn btn-danger">Go To Home</a></center>
        </div>
    </div>
</body>
</html>