<?php
require "inc/functions.php";

$products = productsBy();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="/img/logo/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    CopFinder - The fastest world copbot supreme
  </title>
  <meta property="og:type" content="website"/>
  <meta property="og:title" content="CopFinder | cop bot supreme"/>
  <meta name="description" content="CopFinder is the best solution for buying limited items from Supreme New York. Automate the entire process and never miss another release!"/>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="/css/copfinder.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <?php include "inc/header.php"; ?>

  <div class="page-header header-filter" style="background-image: url('/img/bg/main-bg2.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title"><?= TXT_ACCUEIL_INDEX; ?></h1>
          <h4><?= TXT_ACCUEIL_SUBTITLE_INDEX; ?></h4>
          <br>
          <a href="/index.php#offers" class="btn supreme-btn btn-block">
            <i class="fa fa-shopping-cart"></i> <?= TXT_BUY_NOW; ?>
            <div class="ripple-container"></div></a>
        </div>
        <div id="youtubePlay" class="col-md-6 hidden-xs">
          <a href="#" onclick="youtubePlay()" class="youtube-integration lightbox-link"><img src="/img/other/play.svg" width="50" alt="" class="youtube-play-icon">
            <div class="text-block"><?= TXT_ACCUEIL_INDEX_WATCH_VIDEO; ?></div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">

    <div class="container">
      <section id="product">
        <div class="features-4" id="products-mobile-app-section" style="position: relative; margin: auto; top: 0px; left: 0px; bottom: auto; right: auto; box-sizing: border-box; width: 100%;">
          <div class="row mb-5">
            <div class="col-md-8 ml-auto mr-auto text-center">
              <h2 class="title mb-0"><?= TXT_CHROME_EXTENSION; ?></h2>
              <h5 class="description"><?= TXT_ACCUEIL_SUBTITLE_CHROME; ?></h5>
              <div class="action-buttons"><a class="btn btn-primary" href="/index.php#offers"><?= TXT_ACCUEIL_VIEW_ALL_PRICE; ?></a></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-12 ml-auto mobile-column mobile-info-column">
              <div class="info info-horizontal">
                <div class="icon icon-firm"><i class="material-icons" style="opacity: 1;">dns</i></div>
                <div class="description">
                  <h4 class="info-title"><?= TXT_ACCUEIL_FEATURES1_TITLE; ?></h4>
                  <p><?= TXT_ACCUEIL_FEATURES1_DESC; ?></p>
                </div>
              </div>
              <div class="info info-horizontal">
                <div class="icon icon-firm"><i class="material-icons" style="opacity: 1;">pause</i></div>
                <div class="description">
                  <h4 class="info-title"><?= TXT_ACCUEIL_FEATURES4_TITLE; ?></h4>
                  <p><?= TXT_ACCUEIL_FEATURES4_DESC; ?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 text-center">
              <div class="info info-horizontal d-none d-md-block">
                <div class="row ml-5 mt-3 mb-3">
                  <div class="my-icon"><i class="material-icons" style="opacity: 1;">star</i></div><?= TXT_ACCUEIL_INCLUDE_ALL_FEATURES ?>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="banner__carousel">

                <img class="macbook-img" style="box-sizing: initial;" src="/img/other/macbook.png" alt="Cadre">
              </div>
              <div class="product-video-link phone-video-link mt-4">
                <a class="btn btn-primary btn-sm video-modal-toggle" href="https://youtube.com">
                  <i class="fa fa-youtube-play"></i>
                  <?= TXT_ACCUEIL_COP_DEMONSTRATION ?>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-md-12 mr-auto mobile-column mobile-info-column">
              <div class="info info-horizontal app-sequence-info">
                <div class="icon icon-firm"><i class="material-icons" style="opacity: 1;">supervisor_account</i></div>
                <div class="description">
                  <h4 class="info-title"><?= TXT_ACCUEIL_FEATURES3_TITLE; ?></h4>
                  <p><?= TXT_ACCUEIL_FEATURES3_DESC; ?></p>
                </div>
              </div>
              <div class="info info-horizontal app-sequence-info">
                <div class="icon icon-firm"><i class="material-icons" style="opacity: 1;">shopping_basket</i></div>
                <div class="description">
                  <h4 class="info-title"><?= TXT_ACCUEIL_FEATURES2_TITLE; ?></h4>
                  <p><?= TXT_ACCUEIL_FEATURES2_DESC; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section id="features">
      <div class="features-5" style="background-image: url('/img/bg/features-bg.jpg');">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h2 class="title"><?= TXT_ACCUEIL_OUR_MAIN_FEATURES; ?></p></h2>
        </div>
        <div class="container">
          <div class="row top-row">
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">verified_user</i></div>
                <h4 class="info-title"><?= TXT_ACCUEIL_MORE_FEATURES1_TITLE; ?></h4>
                <p><?= TXT_ACCUEIL_MORE_FEATURES1_DESC; ?></p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">settings</i></div>
                <h4 class="info-title"><?= TXT_ACCUEIL_MORE_FEATURES2_TITLE; ?></h4>
                <p><?= TXT_ACCUEIL_MORE_FEATURES2_DESC; ?></p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">refresh</i></div>
                <h4 class="info-title"><?= TXT_ACCUEIL_MORE_FEATURES3_TITLE; ?></h4>
                <p><?= TXT_ACCUEIL_MORE_FEATURES3_DESC; ?></p>
              </div>
            </div>
          </div>
          <div class="row second-row">
            <div class="col-sm-4">
              <div class="info mt-4">
                <div class="icon"><i class="material-icons" style="opacity: 1;">face</i></div>
                <h4 class="info-title"><?= TXT_ACCUEIL_MORE_FEATURES4_TITLE; ?></h4>
                <p><?= TXT_ACCUEIL_MORE_FEATURES4_DESC; ?></p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info mt-4">
                <div class="icon"><i class="material-icons" style="opacity: 1;">store</i></div>
                <h4 class="info-title"><?= TXT_ACCUEIL_MORE_FEATURES5_TITLE; ?></h4>
                <p><?= TXT_ACCUEIL_MORE_FEATURES5_DESC; ?></p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info mt-4">
                <div class="icon"><i class="material-icons" style="opacity: 1;">format_list_numbered</i></div>
                <h4 class="info-title"><?= TXT_ACCUEIL_MORE_FEATURES6_TITLE; ?></h4>
                <p><?= TXT_ACCUEIL_MORE_FEATURES6_DESC; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="offers">
      <div class="pricing-2" id="pricing-2">
        <div class="container">
          <div class="row">
            <div class="col-md-10 ml-auto mr-auto text-center">
              <h2 class="title"><?= TXT_ACCUEIL_CHOOSE_LICENSE; ?></h2>
              <ul class="nav nav-pills nav-pills-firm">
                <li class="nav-item"><a class="nav-link active" data-scroll-ignore="" data-toggle="tab" href="#pricings-chrome"><?= TXT_CHROME_EXTENSION; ?></a></li>
              </ul>
            </div>
          </div>
          <div class="tab-content">
            <div class="tab-pane active show" id="pricings-chrome">
              <div class="row">
                <div class="col-md-4">
                  <div class="card card-pricing card-plain">
                    <h3 class="recomendation-caption">We think it suits you:</h3>
                    <div class="card-body">
                      <h6 class="card-category"><?php echo $products[0]['name']; ?></h6>
                      <div class="title"><small>$</small>44<small>.99</small></div>
                      <ul>
                        <li><?= TXT_ACCUEIL_PRODUCT1_LIST1; ?></li>
                        <li><?= TXT_ACCUEIL_PRODUCT1_LIST2; ?></li>
                        <li><?= TXT_ACCUEIL_PRODUCT1_LIST3; ?></li>
                        <li><?= TXT_ACCUEIL_PRODUCT1_LIST4; ?></li>
                        <li><?= TXT_ACCUEIL_PRODUCT1_LIST5; ?></li>
                      </ul>
                    </div>
                    <div class="card-footer justify-content-center"><a class="btn btn-primary btn-round" href="/payments.php?id=1"><?= TXT_BUY_NOW; ?></a></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-pricing card-background card-raised" style="background-image: url('/img/bg/models-price-bg.jpg');">
                    <div class="card-body">
                      <h6 class="card-category"><?php echo $products[2]['name']; ?></h6>
                      <div class="title title-center mt-5"><small>$</small>109<small>.99</small></div>
                      <ul>
                        <li><?= TXT_ACCUEIL_PRODUCT3_LIST1; ?></li>
                        <li><?= TXT_ACCUEIL_PRODUCT3_LIST2; ?></li>
                        <li><b><?= TXT_ACCUEIL_PRODUCT3_LIST3; ?></b></li>
                        <li><b><?= TXT_ACCUEIL_PRODUCT3_LIST4; ?></b></li>
                        <li><b><?= TXT_ACCUEIL_PRODUCT3_LIST5; ?></b></li>
                        <li><b><?= TXT_ACCUEIL_PRODUCT3_LIST6; ?></b></li>
                      </ul>
                    </div>
                    <div class="card-footer justify-content-center"><a class="btn btn-primary btn-round" href="/payments.php?id=3"><?= TXT_BUY_NOW; ?></a></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-pricing card-plain">
                    <div class="card-body">
                      <h6 class="card-category"><?php echo $products[1]['name']; ?></h6>
                      <div class="title"><small>$</small>69<small>.99</small></div>
                      <ul>
                        <li><?= TXT_ACCUEIL_PRODUCT2_LIST1; ?></li>
                        <li><?= TXT_ACCUEIL_PRODUCT2_LIST2; ?></li>
                        <li><b><?= TXT_ACCUEIL_PRODUCT2_LIST3; ?></b></li>
                        <li><b><?= TXT_ACCUEIL_PRODUCT2_LIST4; ?></b></li>
                        <li><b><?= TXT_ACCUEIL_PRODUCT2_LIST5; ?></b></li>
                      </ul>
                    </div>
                    <div class="card-footer justify-content-center"><a class="btn btn-primary btn-round" href="/payments.php?id=2"><?= TXT_BUY_NOW; ?></a></div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include "inc/footer.php"; ?>

  <script src="/js/main.js"></script>
  <script src="/js/jquery.min.js" type="text/javascript"></script>
  <script src="/js/popper.min.js" type="text/javascript"></script>
  <script src="/js/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="/js/material-kit.js" type="text/javascript"></script>
</body>

</html>