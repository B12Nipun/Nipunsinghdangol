<?php
include ("functions.php");
$secretKey  = '6Le_wzQgAAAAAHXsEVpgtvTgnrQByGcvZxaMs1cx';
$strongRegex = "/^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#\$%\^&\*])(?=.{8,})/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username    = escape($_POST['username']);
    $password = escape($_POST['password']);


    $error = [
        'password'=> '',
        'username'=>'',

    ];

    if($username == ''){
        $error['username'] = 'Username cannot be empty.';
    }
    // if(username_exists($username)){
    //  $error['username'] = $username . ' already exists. Try another one.';
    // }

    // if(email_exists($email)){
    //  $error['email'] = $email . " already exists. If it's you, <a href='signin.php'>Login</a>";
    // }
    if($password == ''){
        $error['password'] = 'Password cannot be empty.';
    }

    foreach ($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }

    if(empty($error)){
        if(!empty($remember)){
            setcookie('username', $_POST['username'], time()+86400);
            setcookie('password', $_POST['password'], time()+86400);
        }
        else if(empty($remember)){
            setcookie('username', '', time()-86400);
            setcookie('password', '', time()-86400);
        }
        if(!login_user($username, $password)){
            $inactive = "Incorrect Username Or Password";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <script src="https://kit.fontawesome.com/860bdcab67.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/register.css">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background:url(images/oli.jpg);background-repeat:no-repeat;background-size:cover">
    <div class="container">
     
        <div class="row">
            <a href="index.php" style="border:1px solid grey; margin:60px"></a>
        </div>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4 jumbotron">
                <div class="signup-form" id="signup-form">
                    <h1></h1>
                    <form action="" method="post">
                        <h2>Login Page</h2>
                        <h6 class='text-danger'><?php echo isset($inactive)?$inactive : '' ?></h5>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-user"></span>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" autocomplete="off"
                                    value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>">
                            </div>
                            <p class="text-danger" style="font-size:12px">
                                <?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" autocomplete="off"
                                    value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>">
                            </div>
                            <p class="text-danger" style="font-size:12px">
                                <?php echo isset($error['password']) ? $error['password'] : '' ?></p>

                        </div>
                        <div class="form-group">

                            <input type="checkbox" name="remember" id="" <?php if(isset($_COOKIE['username'])){echo "checked";} ?>>
                            <label for="">remember me</label>
                        </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="signin" class="btn btn-primary btn-block" id="btn-submit"
                        value="Sign In">
                    <div class="text-center" style="background:#e9ecef">Don't have an account?
                    <a href="register.php">Register</a>
                    <div class="text-center" style="background:#e9ecef">Forgot password?
                    <a href="changepsw.php">Click Here!</a>
                    <a href="admin/admin_login.php" class="btn btn-primary">Admin Login</a>

                </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>
