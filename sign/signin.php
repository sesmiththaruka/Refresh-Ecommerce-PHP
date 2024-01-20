<!DOCTYPE html>
<html>

<head>
    <title>Refresh | Sign</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="icon" href="../resources/logo.jpeg" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="sign.css">

</head>

<body class="mainBackground" style="background-image: linear-gradient(360deg, #f5e2b1, white);">



    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->
            <div class="mb-5 col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class=" col-12">
                        <p class="title1 text-center">Welcome to Refresh</p>
                    </div>
                </div>
            </div>
            <!-- header -->

            <!-- content -->
            <div class="col-12 px-5">
                <div class="row">
                    <div class=" col-6 d-none d-lg-block background">

                    </div>
                    <div class="col-12 col-lg-6 d-none" id="signUpBox">
                        <div class="row g-1">
                            <div class="col-12">
                                <p class="title2">Create New Account</p>
                                <p id="msg" class="text-danger"></p>
                            </div>
                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input class="border border-dark border-1 form-control" type="text" id="fname"  style="font-weight: bold; background-color: transparent;">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input class="border border-dark border-1 form-control" type="text" id="lname"  style="font-weight: bold; background-color: transparent;">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input class="border border-dark border-1 form-control" type="text" id="email"  style="font-weight: bold; background-color: transparent;">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input class="border border-dark border-1 form-control" type="password" id="password"  style="font-weight: bold; background-color: transparent;">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input class="border border-dark border-1 form-control" type="text" id="mobile"  style="font-weight: bold; background-color: transparent;">
                            </div>
                        
                            <div class="mt-4 d-grid col-12 col-lg-6">
                                <button onclick="signUp();" class="btn " style="background-color: #DAA520;">Sign Up</button>
                            </div>
                            <div class="mt-4 d-grid col-12 col-lg-6">
                                <button onclick="changeView();" class="btn btn-dark">Already have an Account? Sign In</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-12 col-lg-6 d-block" id="signInBox">
                        <div class="row g-1">
                            <div class="col-12">
                                <p class="title2">Sign In To Your Account</p>
                                <p id="msg2"></p>
                            </div>

                            <div class="col-12">

                                <?php
                                $e = "";
                                $p = "";

                                if (isset($_COOKIE["e"])) {
                                    $e = $_COOKIE["e"];
                                }

                                if (isset($_COOKIE["p"])) {
                                    $p = $_COOKIE["p"];
                                }

                                ?>



                                <label class="form-label">Email</label>
                                <input class="border border-1 border-dark form-control" value="<?php echo $e; ?>" type="text" id="email2" style="font-weight: bold; background-color: transparent;">
                            </div>
                            <div class="mt-2 col-12">
                                <label class="form-label">Password</label>
                                <input class="border border-1 border-dark form-control" value="<?php echo $p; ?>" type="password" id="password2" style="font-weight: bold; background-color: transparent;">
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class=" border border-1 border-dark bg-dark form-check-input text-dark" type="checkbox" id="remember" style="font-weight: bold;">
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                            </div>
                            <div class="d-grid col-12 col-lg-6">
                                <button onclick="signin();" class="btn" style="background-color: #DAA520;">Sign In</button>
                            </div>
                            <div class="d-grid col-12 col-lg-6">
                                <button onclick="changeView();" class="btn text-dark btn-danger">New to Refresh? Join Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->



<!-- 
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <input type="text" placeholder="Email" id="email">
                    </div>
                    <div class="col-12">
                        <input type="password" placeholder="Password" id="password">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" onclick="signin();">Sign in</button>
                    </div>
                </div>
            </div>
             -->

             <!-- /////////////////////////////// -->
              <!-- modal -->
            <div class="modal fade" tabindex="-1" id="forgetPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password" id="np">
                                        <button id="npb" class="btn btn-outline-primary" type="button" onclick="showPassword1();">Show</button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-Type Password</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password" id="rnp">
                                        <button id="rnpb" class="btn btn-outline-primary" type="button" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Verification code</label>
                                    <input class="form-control" type="password" id="vc">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>


  

            <!-- modal -->

        </div>
    </div>



    <script src="sign.js"></script>
    <script src="../bootstrap.min.js"></script>

</body>

</html>