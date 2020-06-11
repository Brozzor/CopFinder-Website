<?php
require "inc/functions.php";

$isPay = false;
$idTransac = trim(htmlspecialchars($_GET['idtransac']));
if (isPaymentExist($idTransac)) {
    if (checkPayment($idTransac)) {
        $isPay = true;
    }
} else {
    header('Location: /LANG_UTIL_LOWER/products/2');
}

?>
<!DOCTYPE html>
<html lang="<?= LANG_UTIL_LOWER; ?>">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        CopFinder - the fatest world copbot supreme
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CRoboto+Slab:400,700%7CMaterial+Icons" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/copfinder.css" rel="stylesheet" />
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
                        <h2 class="card-title text-center" id="product-name"><?= TXT_PAY_SUCCESS_TITLE; ?></h2>
                    <?php } else { ?>
                        <h2 class="card-title text-center" id="product-name"><?= TXT_PAY_NOT_SUCCESS_TITLE; ?></h2>
                    <?php } ?>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-4">

                                <?php if ($isPay) { ?>
                                    <div class="alert alert-success fade show" role="alert">
                                        <strong><?= TXT_PAY_WELLDONE; ?></strong> <?= TXT_PAY_SUCCESS; ?> <a href="/contact"><?= TXT_HERE; ?></a>
                                    </div>

                                <?php } else { ?>
                                    <div class="alert alert-danger fade show" role="alert">
                                        <strong><?= TXT_SORRY; ?></strong> <?= TXT_PAY_NOT_SUCCESS; ?>
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