<!DOCTYPE html>
<html>
    <head>
            <title>Index Page</title>
            <!-- css links -->
            <link rel="stylesheet" href="bootstrap-4.4.1-dist/bootstrap-4.4.1-dist/css/bootstrap.css">
            <link rel="stylesheet" href= "tools/index.css">
    </head>
    <body>
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue to CodeCup</h1>
            <div class="account-wall">
                <img class="profile-img" src=""
                    alt="">
                <form class="form-signin" method="post" action = "challenger/ch_login.php">
                <input type="text" class="form-control" placeholder="Email" name = "email" required autofocus>
                <input type="password" class="form-control" placeholder="Password" name = "password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name = "login">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                <a href="challenger/ch_registration.php" class="pull-right need-help">Don't have an account? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
    </body>
</html>