

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/admin/atrio/source/lighthr/pages/examples/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 08:59:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Signin</title>
    <!-- Favicon-->
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="/assets/css/app.min.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="/assets/css/style.css" rel="stylesheet" />
    <link href="/assets/css/pages/extra_pages.css" rel="stylesheet" />
</head>
<body class="light">
    <?php if (isset($message) && !empty($message)):
    echo $message;
    ?>
<?php endif; ?>
<?php echo \Config\Services::validation()->listErrors()?>
    <div class="loginmain">
        <div class="loginCard">
            <div class="login-btn splits">
                <p>Already an user?</p>
                <button class="active">Login</button>
            </div>
            <div class="wrapper">
                 <?php echo form_open('user/login'); ?>
                    <h3>Login</h3>
                    <div class="mail">
                        <?php echo form_input('email','',''); ?>
                        <label>Mail or Username</label>
                    </div>
                    <div class="passwd">
                        <?php echo form_password('password','',''); ?>
                        <label>Password</label>
                    </div>
                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>
                    <div class="submit">
                        <?php echo form_submit('mybutton','Login Now',''); ?>
                    </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>
</body>


<!-- Mirrored from www.radixtouch.in/temegplates/admin/atrio/source/lighthr/pages/examples/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2021 08:59:07 GMT -->
</html>