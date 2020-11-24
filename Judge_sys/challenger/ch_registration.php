<!DOCTYPE html>
<html>
<head>  
<link rel="stylesheet" href="../bootstrap-4.4.1-dist/bootstrap-4.4.1-dist/css/bootstrap.css">
<link rel="stylesheet" href= "../tools/registration.css">
</head>
<body>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>" Talk is cheap show me the code "</p>
                        <button type = "button" class="btn btn-dark"><a href = "../index.php"/>Login</a></button><br/>
                    </div>
                    <div class="col-md-9 register-right">

                        <div class="tab-content" id="myTabContent">
                        <form class="form-signin" method="post" action ="user_registration.php">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Coder</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name = "firstname" placeholder="First Name *" value="" />
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name = "lastname" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name = "username" placeholder="User Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name = "password" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  name = "confpassword" placeholder="Confirm Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" value="" name = "email"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>

                                        <input type="submit" class="btnRegister"  value="Register" name ="submit"/>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
</body>
</html>