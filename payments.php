<?php

require "inc/functions.php";

if (isset($_GET['id']))
{
  $products = productsBy($_GET['id']);
}
else
{
  header('Location: /payments.php?id=2');
}

if (isset($_GET['email']))
{
  $session = checkout($_GET['email'], $_GET['id']);
  $json = json_decode($session, true);

    if ($json && isset($json['id'])) {
      die($json['id']);
    }
    die();
}

if (isset($_GET['idtransac']))
{
  checkPayments($_GET['idTransac']);
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
      <div class="main main-raised main-product" style="min-height: 770px;">
        <div id="page-data">
          <h2 class="card-title text-center" id="product-name"><?php echo $products[0]['name']; ?></h2>
          <h3 class="card-title text-center"><s id="product-old-price"></s><span id="product-price">$<?php echo $products[0]['price']; ?></span></h3>
          <div class="text-center"><a data-target="#promocodeModal" data-toggle="modal" href="#" id="promocode-toggler">Have a coupon?</a></div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 mt-4">
                <center><span><?php echo $products[0]['description']; ?></span></center>

                  <div class="form-group mt-5">

                    <input type="email" id="emailInput" data-id="<?php echo $products[0]['id']; ?>" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <button type="submit" id="buy" class="btn supreme-btn btn-block">Proccess Payment</button>

              </div>
              <div class="col-md-6 text-center">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <a role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                        <h4 class="panel-title">
                          Panel
                          <i class="fa fa-cog"></i>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                        <span>We have designed one of the best panels to manage your tasks and make it as easy as possible for you to use them.</span>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <a class="collapsed" role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h4 class="panel-title">
                          Absolutely safe
                          <i class="fa fa-lock"></i>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                        <span>We have no access to your personal data. You will be redirected to our Stripe partners to make the payment.</span>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <a class="collapsed" role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h4 class="panel-title">
                          After payment
                          <i class="fa fa-envelope"></i>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                      <div class="panel-body">
                        <span>You will arrive on a page where you will have access to your license key, it is also sent to you by email and you can retrieve it at any time by connecting to your panel (your access code will be sent by email)</span>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                      <a class="" role="button" style="color: black;" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        <h4 class="panel-title">
                          Support 7/7 24h
                          <i class="fa fa-comments-o"></i>
                        </h4>
                      </a>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour" aria-expanded="true">
                      <div class="panel-body">
                        <span>Our support is available 24 hours a day, 7 days a week, and we will provide you with all the help you need as soon as possible.You can contact us <a style="color: #da2727;" href="/contact">here</a></span>
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
                <h2 class="card-title">Haven't made a decision yet?</h2>
                <h5 class="description">Join our community on social networks. We will gladly help with any question..</h5>
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
  <?php include "inc/footer.php"; ?>
  <script src="/js/main.js"></script>
  <script src="/js/jquery.min.js" type="text/javascript"></script>
  <script src="/js/popper.min.js" type="text/javascript"></script>
  <script src="/js/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="/js/material-kit.js" type="text/javascript"></script>
  <script type="text/javascript">
    var stripe = Stripe('<?php echo getSetting('stripe_pubKey') ?>');

    $('#buy').on('click', function(e) {

       $.post(checkout(), function (data) {
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