<?php
require "inc/functions.php";

$isPay = false;
$idTransac = trim(htmlspecialchars($_GET['idtransac']));
if (isPaymentExist($idTransac)) {
    if (checkPayment($idTransac)) {
        $isPay = true;
    }
} else {
    header('Location: /payments.php?id=2');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        CopFinder - the fatest world copbot supreme
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/copfinder.css" rel="stylesheet" />
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="product-page" data-demo-ios="#" data-project="supreme_bot_world" style="overflow-x: hidden">
    <?php include "inc/header.php"; ?>
    <div class="page-header header-filter" data-parallax="true" filter-color="black" style="background-image: url('/img/bg/main-bg2.jpg'); transform: translate3d(0px, 0px, 0px);">
        <div class="container">
            <div class="row title-row"></div>
        </div>
    </div>
    <div class="section section-gray">
        <div class="container">
            <div class="main main-raised main-product" style="min-height: 370px;">
                <div id="page-data">
                    <?php if ($isPay) { ?>
                        <h2 class="card-title text-center" id="product-name">Successfully Payment</h2>
                    <?php } else { ?>
                        <h2 class="card-title text-center" id="product-name">Error Payment</h2>
                    <?php } ?>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-4">

                                <?php if ($isPay) { ?>
                                    <div class="alert alert-success fade show" role="alert">
                                        <strong>Well done !</strong> Well done ! your payment has been made and we have emailed you your license key, if you do not receive it check your spam and if after 1 hour you still have not received anything contact support in the contact section : <a href="/contact">click here</a>
                                    </div>

                                <?php } else { ?>
                                    <div class="alert alert-danger fade show" role="alert">
                                        <strong>Well done !</strong> We are sorry but your payment was unsuccessful
                                    </div>
                                <?php } ?>

                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "inc/footer.php"; ?>
    <script src="/js/main.js"></script>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/popper.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="/js/material-kit.js" type="text/javascript"></script>
</body>

</html>