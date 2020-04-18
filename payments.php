<?php
require "inc/functions.php";

$code = false;
if (is_numeric($_GET['id']) && isset($_GET['promo_code'])) {
  $products = productsBy($_GET['id']);
  $couponId = getCouponIdByName(trim(htmlspecialchars($_GET['promo_code'])));
  $price = priceCoupon($products[0]['price'], $couponId, $_GET['id']) / 100;
  $code = true;
} else if (is_numeric($_GET['id'])){
  $products = productsBy($_GET['id']);
  $price = $products[0]['price'];
}else{
  header('Location: /payments.php?id=2');
}

if (isset($_GET['email']) && isset($_GET['promo_code'])) {
  $session = checkout($_GET['email'], $_GET['id'], $_GET['promo_code']);
  $json = json_decode($session, true);

  if ($json && isset($json['id'])) {
    die($json['id']);
  }
  die();
} else if (isset($_GET['email'])) {
  $session = checkout($_GET['email'], $_GET['id']);
  $json = json_decode($session, true);

  if ($json && isset($json['id'])) {
    die($json['id']);
  }
  die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="/img/logo/icon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    CopFinder - Products
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
      <div class="main main-raised main-product" style="min-height: 770px;">
        <div id="page-data">
          <h2 class="card-title text-center" id="product-name"><?php echo $products[0]['name']; ?></h2>
          <?php if ($code && $price != $products[0]['price']) {?>
          <h3 class="card-title text-center"><strike><small id="product-price">$<?php echo $products[0]['price']; ?></small></strike><br>
          <span id="product-price">$<?php echo $price; ?></span>
          </h3>
          <?php }else{ ?>
          <h3 class="card-title text-center"><span id="product-price">$<?php echo $price; ?></span></h3>
          <?php } ?>
          <div class="text-center">
            <a data-target="#promocodeModal" style="color: #d2d2d2;" data-toggle="modal" href="#" id="promocode-toggler"><?= TXT_PAY_COUPON_HAVE; ?></a>
            <?php if ($code && $price == $products[0]['price']) {?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?= TXT_SORRY; ?> !</strong> <?= TXT_PAY_CODE_UNVAILABLE; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            <?php }else if ($code) { ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong><?= TXT_PAY_WELLDONE; ?></strong> <?= TXT_PAY_YOUR; ?> <?= searchPercentEconomy($couponId) ?>% <?= TXT_PAY_CODE_AVAILABLE; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            <?php } ?>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 mt-4">
                <center><span><?php echo getGoodDesc($products[0]['description'], $products[0]['description_fr']); ?></span></center>

                <div class="form-group mt-5">

                  <input type="email" id="emailInput" data-id="<?php echo $products[0]['id']; ?>" class="form-control" aria-describedby="emailHelp" placeholder="<?= TXT_PAY_ENTER_MAIL; ?>">
                  <small id="emailHelp" class="form-text text-muted"><?= TXT_PAY_NOT_SHARE_MAIL; ?></small>
                </div>
                <button type="submit" id="buy" class="btn supreme-btn btn-block"><?= TXT_PAY_PROCCESS; ?></button>

              </div>
              <div class="col-md-6 text-center">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <a role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                        <h4 class="panel-title">
                          <?= TXT_PAY_ACCORDEON1_TITLE; ?>
                          <i class="fa fa-cog"></i>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                        <span><?= TXT_PAY_ACCORDEON1_DESC; ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <a class="collapsed" role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h4 class="panel-title">
                        <?= TXT_PAY_ACCORDEON2_TITLE; ?>
                          <i class="fa fa-lock"></i>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                        <span><?= TXT_PAY_ACCORDEON2_DESC; ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <a class="collapsed" role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h4 class="panel-title">
                        <?= TXT_PAY_ACCORDEON3_TITLE; ?>
                          <i class="fa fa-envelope"></i>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                        <span><?= TXT_PAY_ACCORDEON3_DESC; ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                      <a class="" role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <h4 class="panel-title">
                        <?= TXT_PAY_ACCORDEON4_TITLE; ?>
                          <i class="fa fa-comments-o"></i>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour" aria-expanded="true">
                      <div class="panel-body">
                        <span><?= TXT_PAY_ACCORDEON4_DESC; ?> <a style="color: #da2727;" href="/contact"><?= TXT_HERE; ?></a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="cd-section js-simple-hide" id="about-us-section">
        <div class="container">
          <div class="features-1">
            <div class="row">
              <div class="col-md-8 ml-auto mr-auto">
                <h2 class="card-title"><?= TXT_PAY_MADE_DECISION; ?></h2>
                <h5 class="description"><?= TXT_PAY_JOIN_COMMUNITY; ?></h5>
              </div>
            </div>
            <div class="row justify-content-center socials">
              <a class="btn btn-instagram btn-round" href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i>Instagram</a><a class="btn btn-youtube btn-round" href="https://www.youtube.com/channel/" target="_blank"><i class="fa fa-youtube"></i>Youtube</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="promocodeModal" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= TXT_PAY_COUPON_ENTER; ?></h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><i class="material-icons" style="opacity: 1;">clear</i></button>
        </div>
        <div class="modal-body">
          <div class="form form-newsletter" id="promocode-form">
            <div class="form-group bmd-form-group"><input class="form-control" id="promocode-input" placeholder="Coupon" type="text"></div><button class="btn btn-primary btn-just-icon" onclick="promoCodeAdd()" name="button"><i class="material-icons" style="opacity: 1;">check</i>
              <div class="ripple-container"></div>
            </button>
          </div>
          <div class="clearfix"></div>
          <div class="text-center js-simple-hide">
            <h5><?= TXT_PAY_COUPON_DESC; ?></h5>
            <ul class="social-buttons" style="padding-left: 0">
              <a class="btn btn-just-icon btn-link btn-instagram" href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
              <a class="btn btn-just-icon btn-link btn-youtube" href="https://www.youtube.com/channel/" target="_blank"><i class="fa fa-youtube-play"></i></a>
            </ul>
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
  <script type="text/javascript">
    var stripe = Stripe('<?php echo getSetting('stripe_pubKey') ?>');

    $('#buy').on('click', function(e) {

      $.post(checkout(), function(data) {
        stripe.redirectToCheckout({
          sessionId: data
        }).then(function(result) {
          console.log(result);
        });
      });
    });
  </script>
</body>

</html>