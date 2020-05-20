<?php
require "inc/functions.php";
$faq = allFaq(LANG_UTIL);
?>
<!DOCTYPE html>
<html lang="<?= strtolower(LANG_UTIL); ?>">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        CopFinder - F.A.Q
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/copfinder.css" rel="stylesheet" />
    <link href="/site.webmanifest" rel="manifest" />
    <link rel="alternate" href="https://cop-finder.com/fr/faq" hreflang="fr" />
    <link rel="alternate" href="https://cop-finder.com/en/faq" hreflang="en" />
    <link rel="alternate" href="https://cop-finder.com/en/faq" hreflang="x-default" />
    <link href="/img/logo/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180" />
    <link href="/img/logo/apple-touch-icon.png" rel="shortcut icon" type="image/x-icon" />
    <link href="/img/logo/icon-32.png" rel="icon" sizes="32x32" type="image/png" />
    <link href="/img/logo/icon-16.png" rel="icon" sizes="16x16" type="image/png" />
    <meta content="#da2727" name="msapplication-TileColor" />
    <meta content="#da2727" name="theme-color" />
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
                    <h2 class="card-title text-center" id="product-name">F.A.Q</h2>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mt-4">
                                <center><span><?= TXT_FAQ_SUBTITLE; ?> <a style="color: black" href="/<?= LANG_UTIL_LOWER; ?>/contact"><?= TXT_HERE; ?></a></span></center>

                                <div class="panel-group mt-4" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                    foreach ($faq as $row) {
                                    ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading shadow p-3 mb-3 bg-white rounded" role="tab" id="heading<?= $row['id']; ?>">
                                                <a role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $row['id']; ?>" aria-expanded="false" aria-controls="collapse<?= $row['id']; ?>" class="collapsed">
                                                    <h4 class="panel-title">
                                                        <?= $row['question']; ?>
                                                        <i class="fa fa-arrow-down" style="color:#3c4858"></i>
                                                    </h4>

                                                </a>
                                            </div>
                                            <div id="collapse<?= $row['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $row['id']; ?>" aria-expanded="false">
                                                <div class="panel-body mb-3 ml-1 mr-1">
                                                    <span><?= $row['answer']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>


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