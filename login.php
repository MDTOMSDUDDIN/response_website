<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>login page</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/response_website/dashboard_asset/images/favicon.png">
    <link href="/response_website/dashboard_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center mb-3">
                                <a href="index.html"><img src="/response_website/dashboard_asset/images/logo-full.png" alt=""></a>
                            </div>
                            <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                            <form action="login_post.php" method="POST">
                                <div class="form-group">
                                    <label class="mb-1 text-white"><strong>Email</strong></label>
                                    <input type="email" class="form-control"  name="email">
                                    <?php if(isset($_SESSION['email'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['email']  ?></strong>
                                    <?php } unset($_SESSION['email'])?>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1 text-white"><strong>Password</strong></label>
                                    <input type="password" class="form-control" name="password">
                                    <?php if(isset($_SESSION['password'])){ ?>
                                    <strong class="text-danger"><?= $_SESSION['password']  ?></strong>
                                  <?php } unset($_SESSION['password'])?>

                                </div> 
                                <div class="text-center">
                                    <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                </div>
                            </form>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/response_website/dashboard_asset/vendor/global/global.min.js"></script>
	<script src="/response_website/dashboard_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/response_website/dashboard_asset/js/custom.min.js"></script>
    <script src="/response_website/dashboard_asset./js/deznav-init.js"></script>

</body>

</html>