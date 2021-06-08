

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/admin/atrio/source/lighthr/pages/examples/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 08:59:16 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>SIGN UP</title>
    <!-- Favicon-->
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="/assets/css/app.min.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="/assets/css/style.css" rel="stylesheet" />
    <link href="/assets/css/pages/extra_pages.css" rel="stylesheet" />
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="<?php echo base_url('user/add'); ?>">
                             <?php if (isset($message) && !empty($message)):
                            echo $message;
                            ?>
                            <?php endif; ?>
                            <?php echo \Config\Services::validation()->listErrors()?>
                    <span class="login100-form-title p-b-45">
                        Register
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input class="input100" type="text" name="name">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter valid email address">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                   <!--  <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="conpass">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Confirm Password</span>
                    </div> -->
                    <div class="flex-sb-m w-full p-t-15 p-b-20">
                        <div>
                            <a href="<?php echo base_url('user/signin'); ?>" class="txt1">
                                Already Registered?
                            </a>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="submit">
                            Register
                        </button>
                    </div>
                    <div class="text-center p-t-45 p-b-20">
                        <span class="txt2">
                            or sign up using
                        </span>
                    </div>
                    <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </form>
                <div class="login100-more" style="background-image: url('../../assets/images/pages/bg-02.png');">
                </div>
            </div>
        </div>
    </div>
    <!-- Plugins Js -->
    <script src="../../assets/js/app.min.js"></script>
    <!-- Extra page Js -->
    <script src="../../assets/js/pages/examples/pages.js"></script>
</body>


<!-- Mirrored from www.radixtouch.in/templates/admin/atrio/source/lighthr/pages/examples/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 08:59:34 GMT -->
</html>