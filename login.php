<?php
$conn=mysqli_connect("localhost","root","","web");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
            if(isset($_POST['login']))
                {
                    
                    extract($_POST);
            
                    $query="select * from reg where Email='$email' AND Password='$password'";
                    $run_query=mysqli_query($conn,$query);
            
                    if($run_query)
                    {
                        if(mysqli_num_rows($run_query)>0)
                        {
                            $_SESSION['Email']=$email;
                            $_SESSION['Password']=$password;
                            header("location:homepage.php");
                        }
                        else
                        {
                            echo"<div class='alert alert-warning'><strong>warning!</strong>  login not successful...</div>";
                        }
                    }
                }
        
        ?>
        
        
        
        
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" name="email" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required = "true">
                                    </div>
                                    <button type="submit" name="login" value="login" class="btn btn-primary">Login</button><br><br>
                                   
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
