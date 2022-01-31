<?php
    if(isset($_POST['userid']))
    {
        $conn=new mysqli('localhost','root','','user');
        $sql="SELECT * FROM `user` WHERE `email`='".$_POST['userid']."'";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            $conn->close();
            session_start();
            $_SESSION['verified']="";
            echo "<script>window.location.href='http://localhost/slim/app/admin/dntukadiya/SignUpSlim';</script>";
            exit();
        }
        else
        {
            $conn->close();
            echo "<script>window.location.href='http://localhost/slim/app/admin/dntukadiya/Login';</script>";
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <select name="GColor1" id="GColor1" class="GColorSelectors CssSelectors">
                    <option value="none">Top color</option>
                    <option value="Black">Black</option>
                    <option value="Red">Red</option>
                    <option value="Blue">Blue</option>
                    <option value="White">White</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Violet">Violet</option>
                </select>
                <select name="GColor2" id="GColor2" class="GColorSelectors CssSelectors">
                    <option value="none">Bottom color</option>
                    <option value="Black">Black</option>
                    <option value="Red">Red</option>
                    <option value="Blue">Blue</option>
                    <option value="White">White</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Violet">Violet</option>
                </select>
                <select name="elmgroup" id="elmgroup" class="ElmGroupSelectors CssSelectors">
                    <option value="none">Select The Group</option>
                    <option value="loginform">Outer Heading</option>
                    <option value="credentials">Inner Heading</option>
                    <option value="credentialelm">Credentials</option>
                    <option value="extlinks">Links</option>
                    <option value="copyright">Copyright</option>
                </select>
                <input type="number" name="font-size" id="font-size" class="ElmGroupSelectors CssSelector InpFontSize" value="16">
                <select name="font-color" id="font-color" class="ElmGroupSelectors CssSelectors">
                    <option value="none">Select Color</option>
                    <option value="Black">Black</option>
                    <option value="Red">Red</option>
                    <option value="Blue">Blue</option>
                    <option value="White">White</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Violet">Violet</option>
                </select>
            </div>
        </div>
    </div>
    <form action="index.php" id="loginuserform" method="post" autocomplete="off">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-3 col-md-2 col-sm-2 col-1"></div>
                <div class="col-lg-6 col-md-8 col-sm-8 col-10">
                    <div class="row justify-content-center mb-3">
                        <p class="loginform">Login Form</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-2 col-1"></div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-2 col-1"></div>
                <div class="col-lg-6 col-md-8 col-sm-8 col-10 login-block">
                    <div class="row justify-content-center mb-3 mt-3">
                        <p class="credentials">Credentials</p>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-10">
                            <div class="row">
                                <i class="fa fa-user  iicon"></i>
                                <input type="text" id="userid" name="userid" class="credentialelm" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-10">
                            <div class="row" id="UidErrMsg"></div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-10">
                            <div class="row">
                                <i class="fa fa-key  iicon"></i>
                                <input type="password" id="password" name="password" class="credentialelm" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-10">
                            <div class="row" id="PswdErrMsg"></div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-10">
                            <div class="row">
                                <button id="login" type="submit">LogIn</button>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-1"></div>
                    </div>
                    <div class="row justify-content-center mt-3 mb-2">
                        <div class="row">
                            <a href="#" class="extlinks">Forgot Password?</a>&emsp;
                            <a href="SignUp.html" class="extlinks" data-toggle="modal" data-target="#signupmodal">SignUp!</a>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-2" id="LoginMsg"></div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-2 col-1"></div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-lg-3 col-md-3 col-sm-3 col-1"></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-10">
                    <div class="row justify-content-center">
                        <span class="copyright">&copy; 2022, All Rights Reserved! Designed By DnTukadiya</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-1"></div>
            </div>
        </div>
    </form>
    <div class="modal" id="signupmodal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Don't have Account? SignUp!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" id="fname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mnumber">Mobile</label>
                                <input type="number" class="form-control" id="mnumber">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="supassword">Password</label>
                                <input type="password" class="form-control" id="supassword">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="rpassword">Re-type Password</label>
                                <input type="password" class="form-control" id="rpassword">
                            </div>
                        </div>
                        <div class="form-row gender-radio">
                            <div class="form-group col-lg-3">
                                Select Gender
                            </div>
                            <div class="form-group col-lg-9">
                                <label for="male">Male</label>
                                <input type="radio" id="male">
                                <label for="female">Female</label>
                                <input type="radio" id="female">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                Hobbies :
                            </div>
                            <div class="form-group col-md-9">
                                <label><input type="checkbox">&nbsp;Sports</label>&emsp;
                                <label><input type="checkbox">&nbsp;Programming</label>&emsp;
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Gujarat</option>
                                    <option>Rajasthan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="pimage">Choose Profile Photo</label>
                                <input type="file" class="form-control" id="pimage">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="txtar">Description : </label>
                                <div id="txtar">
                                    <textarea cols="30" rows="5" style="width: 100%;"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <button type="button" class="btn btn-secondary" onclick="form.reset()">Reset</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </form>
                    <!-- <iframe src="/home/setu/Desktop/Dharmesh Tukadiya/Forms/SignUp.html" frameborder="0"></iframe> -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>