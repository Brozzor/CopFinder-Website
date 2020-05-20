<?php
require "../inc/functions.php";
reconnect_from_cookie();

if (isset($_SESSION['auth'])) {
    header('Location: main.php');
    exit();
}

if (!empty($_POST['mail']) && !empty($_POST['password'])) {
    checkAccount($_POST['mail'], $_POST['password']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        CopFinder - Manager
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/copfinder.css" rel="stylesheet" />
</head>

<body class="product-page" data-demo-ios="#" data-project="supreme_bot_world" style="overflow-x: hidden">

    <div class="page-header header-filter" data-parallax="true" filter-color="black" style="background-image: url('/img/bg/main-bg2.jpg'); transform: translate3d(0px, 0px, 0px);">
        <div class="container">
            <div class="row title-row"></div>
        </div>
    </div>
    <div class="section section-gray">
        <div class="container">
            <div class="main main-raised main-product" style="min-height: 370px;">
                <div id="page-data">
                    <h2 class="card-title text-center" id="product-name">Log in</h2>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mt-4">
                                <center><span>You must be affiliated to be able to connect on this page, if you forgot your password you can contact the support : <a style="color: black" href="/contact.php">here</a></span></center>

                                <form method="POST" class="mt-4" action="">
                                    <div class="form-group bmd-form-group">
                                        <label for="mail" class="bmd-label-static">Email address</label>
                                        <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group bmd-form-group">
                                        <label for="password" class="bmd-label-static">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                    </div>



                                    <button type="submit" class="btn supreme-btn btn-block">Log in</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "../inc/footer.php"; ?>
    <script src="/js/main.js"></script>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/popper.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="/js/material-kit.js" type="text/javascript"></script>
</body>

</html>