<?php
require('../inc/functions.php');
reconnect_from_cookie();
logged_only();

$user = getUserInfos($_SESSION['auth']['id']);
$coupon = getCouponByUid();
$lastCouponUtil = getLastUseCoupon($coupon['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        CopFinder - Account
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/copfinder.css" rel="stylesheet" />
</head>

<body class="product-page" data-demo-ios="#" data-project="supreme_bot_world" style="overflow-x: hidden">
    <?php include "../inc/header-manager.php"; ?>
    <div class="page-header header-filter" data-parallax="true" filter-color="black" style="background-image: url('/img/bg/main-bg2.jpg'); transform: translate3d(0px, 0px, 0px);">
        <div class="container">
            <div class="row title-row"></div>
        </div>
    </div>
    <div class="section section-gray">
        <div class="container">
            <div class="main main-raised main-product" style="min-height: 370px;">
                <div id="page-data">
                    <h2 class="card-title text-center" id="product-name">0$</h2>

                    <div class="card-body">
                        <div class="col-md-12 mt-4">
                                <center><span>Your affiliate code is : <strong><?= $coupon['name'] ?></strong> </span></center>
                            <div class="row mt-5">
                                <div class="col-lg-6">
                                    <center><h2>Last repayment request</h2></center>
                                    <table class="table text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                    //foreach ($lastCouponUtil as $row){
                                            ?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                    <?php // } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                <center><h2>Last use of the code</h2></center>
                                    <table class="table text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Mail</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Commission</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                    foreach ($lastCouponUtil as $row){
                                            ?>
                                            <tr >
                                                <td><?= $row['user_mail']; ?></td>
                                                <td><?= transformTimetoDate($row['modified']); ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['commission']; ?>$</td>
                                                
                                            </tr>
                                    <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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