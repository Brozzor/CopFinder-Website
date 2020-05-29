<?php
require "inc/functions.php";

if (isset($_GET['season'])){
    $lastSeason = lastSeasonOr($_GET['season']);
}else{
    header('Location: https://cop-finder.com/'.LANG_UTIL_LOWER.'/droplist/season/'. lastSeasonOr()['season']);
}

$seasonList = allSeasonList();
$dropList = allDropList($lastSeason['season']);

?>
<!DOCTYPE html>
<html lang="<?= LANG_UTIL_LOWER; ?>">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CopFinder - Droplist Supreme <?= $lastSeason['season']; ?> <?= LANG_UTIL ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/copfinder.css" rel="stylesheet" />
    <link href="/site.webmanifest" rel="manifest" />
    <link rel="alternate" href="https://cop-finder.com/fr/droplist/season/<?= $lastSeason['season']; ?>" hreflang="fr" />
    <link rel="alternate" href="https://cop-finder.com/en/droplist/season/<?= $lastSeason['season']; ?>" hreflang="en" />
    <link rel="alternate" href="https://cop-finder.com/en/droplist/season/<?= $lastSeason['season']; ?>" hreflang="x-default" />
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
                    <h2 class="card-title text-center" id="product-name"><?= TXT_DROPLIST_DROPLIST ?> <?= $lastSeason['season']; ?> </h2>
                    <p class="text-center"><?= $lastSeason['seasonType']; ?></p>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mt-4">
                                <center><span><?= TXT_DROPLIST_ACCEUIL ?></span></center>
                                <div class="weeklist">
                                <select width="50px" class="custom-select" id="selectSeason">
                                <?php
                                    foreach ($seasonList as $row) {
                                        $isSelected = "";
                                        if ($row['season'] == $lastSeason['season']){
                                            $isSelected = "selected";
                                        }
                                ?>
                                    <option value="<?= $row['season']; ?>" <?= $isSelected; ?>><?= displaySeasonInText($row['season']); ?></option>
                                <?php } ?>
                                </select>
                                </div>
                                <div class="row">
                                    <?php
                                    foreach ($dropList as $row) {
                                    ?><div class="col-xs-12 col-sm-6 col-md-4">
                                    <a href="/<?= LANG_UTIL_LOWER ?>/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?>">
                                        <div class="card text-white bg-dark weekcard">
                                            <div class="card-body">
                                                <p class="droplist-title"><?= TXT_DROPLIST_WEEK ?> <?= $row['week']; ?></p>
                                            </div>
                                        </div>                       
                                    </a>
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