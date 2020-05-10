<?php
require('../inc/functions.php');
reconnect_from_cookie();
limitedAccess(3);

$lastbill = lastBill();
$lastTicket = lastTicket();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        CopFinder - Admin
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
                <h1 class="card-title text-center mb-5" id="product-name">Revenu</h1>
                <hr>
                    <div class="row mb-5">
                        <div class="text-center col">
                            <h2 class="card-title" id="product-name"><?= totalAmount(24) ?>$</h2>
                            <span>24 Heures</span>
                        </div>
                        <div class="text-center col">
                            <h2 class="card-title" id="product-name"><?= totalAmount(7 * 24) ?>$</h2>
                            <span>7 Jours</span>
                        </div>
                        <div class="text-center col">
                            <h2 class="card-title" id="product-name"><?= totalAmount(30 * 24) ?>$</h2>
                            <span>1 Mois</span>
                        </div>
                        <div class="text-center col">
                            <h2 class="card-title" id="product-name"><?= totalAmount(24) ?>$</h2>
                            <span>Total</span>
                        </div>
                    </div>
                <hr>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <center><h2>Dernières factures</h2></center>
                                    <table class="table table-responsive text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Produits</th>
                                                <th scope="col">Mail</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                    foreach ($lastbill as $row){
                                            ?>
                                            <tr>
                                                <th><?= getProducts($row['pid'])['name']; ?></th>
                                                <td><?= $row['user_mail']; ?></td>
                                                <td><?= timestampTodate($row['created']); ?></td>
                                                <td><?= centsToDollars($row['price']); ?>$</td>
                                                <td><?= statusForm($row['state']); ?></td>
                                                <td><button class="btn supreme-btn">Voir</button></td>
                                            </tr>
                                    <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                <center><h2>Dernier ticket</h2></center>
                                    <table class="table table-responsive text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Mail</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                   foreach ($lastTicket as $row){
                                    ?>
                                    <tr>
                                        <th><?= htmlspecialchars($row['name']); ?></th>
                                        <td><?= $row['mail']; ?></td>
                                        <td><?= timestampTodate($row['date_send']); ?></td>
                                        <td><?= statusForm($row['state']); ?></td>
                                        <td><button class="btn supreme-btn">Voir</button></td>
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