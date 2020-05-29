<?php
require "inc/functions.php";

if (isset($_GET['season']) && isset($_GET['week']) && is_numeric($_GET['week']) && !empty($_GET['season'])) {
    $dropItems = allDropItems($_GET['season'], $_GET['week']);
} else {
    $dropItems = allDropItems('SS20','12');
}

if (!isset($dropItems[0]['week']) && strlen($_GET['week']) <= 2 && is_numeric($_GET['week']) && strlen($_GET['season']) == 4){
    $dropItems[0]['week'] = $_GET['week'];
    $dropItems[0]['season'] = htmlspecialchars($_GET['season']);
    $dropItems[0]['date_drop'] = null;
    $dropItems[0]['noItems'] = true;
    $dropItems[0]['more_infos'] = TXT_DROPLIST_PAGE_NOT_ARTICLE;
    
}else if (!isset($dropItems[0]['week'])){
    header('Location: ./');
}

?>
<!DOCTYPE html>
<html lang="<?= strtolower(LANG_UTIL); ?>">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CopFinder - Droplist Supreme <?= $dropItems[0]['season']; ?> Week <?= $dropItems[0]['week']; ?> <?= LANG_UTIL; ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/copfinder.css" rel="stylesheet" />
    <link href="/site.webmanifest" rel="manifest" />
    <link rel="alternate" href="https://cop-finder.com/fr/droplist/season/<?= $dropItems[0]['season']; ?>/week/<?= $dropItems[0]['week']; ?>" hreflang="fr" />
    <link rel="alternate" href="https://cop-finder.com/en/droplist/season/<?= $dropItems[0]['season']; ?>/week/<?= $dropItems[0]['week']; ?>" hreflang="en" />
    <link rel="alternate" href="https://cop-finder.com/en/droplist/season/<?= $dropItems[0]['season']; ?>/week/<?= $dropItems[0]['week']; ?>" hreflang="x-default" />
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
                    <h2 class="card-title text-center" id="product-name"><?= TXT_DROPLIST_PAGE_WEEK ?> <?= $dropItems[0]['week']; ?></h2>
                    <p class="text-center"><?= dropDate($dropItems[0]['date_drop']); ?></p>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mt-4">
                                <center><span><?= strip_tags($dropItems[0]['more_infos']); ?></span></center>
                                <a href="/<?= LANG_UTIL_LOWER ?>/droplist/season/<?= $dropItems[0]['season']; ?>"><button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> <?= TXT_DROPLIST_PAGE_BACK ?></button></a>
                                <div class="row">
                                    <?php
                                    if (!isset($dropItems[0]['noItems'])){       
                                    foreach ($dropItems as $row) {
                                    ?><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="card items-drop">
                                                <img class="card-img-top" src="https://cop-finder.com/img/blog/<?= $row['id']; ?>.jpg" alt="<?= htmlspecialchars($row['name']); ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?= htmlspecialchars($row['name']); ?></h4>
                                                    <p class="card-text"><?= cleanDescItemDrop($row['description']); ?></p>
                                                    <p class="text-center card-price-drop"><span class="badge badge-danger"><?= allPriceItemsClean($row['price']); ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }} ?>
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