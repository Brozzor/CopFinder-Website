<?php 
  require "inc/functions.php";
  $products = productsBy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="/img/logo/icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    CopFinder - the fatest world copbot supreme
  </title>
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
          <h1 class="title">A passion made available</h1>
          <h4>We have created software that will save you time by ordering all the Supreme® items you want, and doing it when you want, at lightning speed.</h4>
          <br>
          <a href="/index.php#offers" class="btn supreme-btn btn-block">
            <i class="fa fa-shopping-cart"></i> Buy now
            <div class="ripple-container"></div></a>
        </div>
        <div id="youtubePlay" class="col-md-6 hidden-xs">
          <a href="#" onclick="youtubePlay()" class="youtube-integration lightbox-link"><img src="/img/other/play.svg" width="50" alt="" class="youtube-play-icon">
            <div class="text-block">Watch the presentation video</div>
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
              <h2 class="title mb-0">Chrome Extension</h2>
              <h5 class="description">Any Chrome-based browser (Windows, Linux, Mac)</h5>
              <div class="action-buttons"><a class="btn btn-primary" href="/index.php#offers">View all price</a></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-12 ml-auto mobile-column mobile-info-column">
              <div class="info info-horizontal">
                <div class="icon icon-firm"><i class="material-icons" style="opacity: 1;">dns</i></div>
                <div class="description">
                  <h4 class="info-title">Supports Proxy</h4>
                  <p>CopFinder supports personal proxies as well as offers ours. It gives you an opportunity to cop several orders at the same time.</p>
                </div>
              </div>
              <div class="info info-horizontal">
                <div class="icon icon-firm"><i class="material-icons" style="opacity: 1;">shopping_basket</i></div>
                <div class="description">
                  <h4 class="info-title">Unlimited Tasks</h4>
                  <p>Run as many tasks as you need to cop as many items as you need. You’re one step closer to becoming a reseller</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 text-center">
              <div class="info info-horizontal d-none d-md-block">
                <div class="row ml-5 mt-3 mb-3">
                  <div class="my-icon"><i class="material-icons" style="opacity: 1;">star</i></div>Includes all the main features
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="banner__carousel">

                <img class="macbook-img" style="box-sizing: initial;" src="/img/other/macbook.png" alt="Cadre">
              </div>
              <div class="product-video-link phone-video-link"><a class="btn btn-primary btn-sm video-modal-toggle" href="youtube.com"><i class="fa fa-youtube-play"></i>Cop demonstration</a></div>
            </div>
            <div class="col-lg-3 col-md-12 mr-auto mobile-column mobile-info-column">
              <div class="info info-horizontal app-sequence-info">
                <div class="icon icon-firm"><i class="material-icons" style="opacity: 1;">supervisor_account</i></div>
                <div class="description">
                  <h4 class="info-title">Staff is already</h4>
                  <p>Our chrome extension has been developped specialy to be update as fast as possible by our team if supreme modify the website.</p>
                </div>
              </div>
              <div class="info info-horizontal app-sequence-info">
                <div class="icon icon-firm"><i class="material-icons" style="opacity: 1;">notifications_active</i></div>
                <div class="description">
                  <h4 class="info-title">All restocks on your phone</h4>
                  <p>Our mobile app gives you a chance to track and cop items with our auto-restock feature.. Once the item is restocked you will get a notification and the purchase will start.</p>
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
          <h2 class="title">Our main features</h2>
        </div>
        <div class="container">
          <div class="row top-row">
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">verified_user</i></div>
                <h4 class="info-title">Smart Cop</h4>
                <p>No categories problems. No color problems. No size problems. No keywords problems. Our algorithm beats all this errors. </p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">settings</i></div>
                <h4 class="info-title">Lots of useful settings</h4>
                <p>The bot is very versatile, you can set a timer, and the stuff you want to cop, then the bot is completly automatical, and it will buy for you, and skip all the steps very fast. Our bot CopFinder has been tested and approved.</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">refresh</i></div>
                <h4 class="info-title">Auto-restock feature</h4>
                <p>Our bot allows you 2 things : first you can buy very fast, and secondly, you can select your items before they are on stock, you wont have to wait the stock time and the CopFinder will do all steps for you.</p>
              </div>
            </div>
          </div>
          <div class="row second-row">
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">face</i></div>
                <h4 class="info-title">Human imitation</h4>
                <p>CopFinder uses algorithms that fully imitate the human manner of entering data.</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">store</i></div>
                <h4 class="info-title">Store and Restocks</h4>
                <p>These are very helpful because they give you an opportunity to track items that are available or have been restocked as well as to buy them instantly.</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="info">
                <div class="icon"><i class="material-icons" style="opacity: 1;">format_list_numbered</i></div>
                <h4 class="info-title">FastCop 2.3/sec</h4>
                <p>be the first to buy with our algorithm and our optimisations, they have an execution time of 2.3s</p>
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
              <h2 class="title">Choose your license</h2>
              <ul class="nav nav-pills nav-pills-firm">
                <li class="nav-item"><a class="nav-link active" data-scroll-ignore="" data-toggle="tab" href="#pricings-chrome">Chrome extension</a></li>
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
                        <li>One Drop Only</li>
                        <li>Basic support</li>
                        <li>Restocks are available only on drop days</li>
                        <li>FastCop Included</li>
                        <li>No SmartCop</li>
                      </ul>
                    </div>
                    <div class="card-footer justify-content-center"><a class="btn btn-primary btn-round" href="/payments.php?id=1">Buy Now</a></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-pricing card-background card-raised" style="background-image: url('/img/bg/models-price-bg.jpg');">
                    <div class="card-body">
                      <h6 class="card-category"><?php echo $products[2]['name']; ?></h6>
                      <div class="title title-center mt-5"><small>$</small>109<small>.99</small></div>
                      <ul>
                        <li>The best value for money</li>
                        <li>First class support and setup assistance</li>
                        <li><b>Full access to restocks</b></li>
                        <li><b>SmartCop Included</b></li>
                        <li><b>FastCop Included</b></li>
                        <li><b>No renewel fee</b></li>
                      </ul>
                    </div>
                    <div class="card-footer justify-content-center"><a class="btn btn-primary btn-round" href="/payments.php?id=3">Buy Now</a></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-pricing card-plain">
                    <div class="card-body">
                      <h6 class="card-category"><?php echo $products[1]['name']; ?></h6>
                      <div class="title"><small>$</small>69<small>.99</small></div>
                      <ul>
                        <li>Renewal for only 19.99$/year</li>
                        <li>Priority support and setup assistance</li>
                        <li><b>Full access to restocks</b></li>
                        <li><b>FastCop Included</b></li>
                        <li><b>SmartCop Included</b></li>
                      </ul>
                    </div>
                    <div class="card-footer justify-content-center"><a class="btn btn-primary btn-round" href="/payments.php?id=2">Buy Now</a></div>
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