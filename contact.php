<?php
require "inc/functions.php";
$mailstate = 'pending';

if (!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['msg'])) {
    $mailstate = createTicket($_POST['name'], $_POST['mail'], $_POST['msg'], get_ip_address());
}
?>
<!DOCTYPE html>
<html lang="<?= LANG_UTIL_LOWER; ?>">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/img/logo/icon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        CopFinder - Contact
    </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/copfinder.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="/site.webmanifest" rel="manifest" />
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
                    <h2 class="card-title text-center" id="product-name">Contact</h2>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 mt-4">
                                <center><span><?= TXT_CONTACT_SUBTITLE; ?> <a style="color: black" href="/<?= LANG_UTIL_LOWER; ?>/faq"><?= TXT_HERE; ?></a></span></center>

                                <form method="POST" class="mt-4" action="">
                                    <div class="form-group">
                                        <label for="name"><?= TXT_CONTACT_NAME; ?></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="<?= TXT_CONTACT_ENTER_NAME; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="mail"><?= TXT_CONTACT_MAIL; ?></label>
                                        <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="<?= TXT_CONTACT_ENTER_MAIL; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="msg">Message</label>
                                        <textarea name="msg" class="form-control textarea-border" id="msg" rows="6" placeholder="Message..."></textarea>
                                    </div>
                             

                                    <div class="g-recaptcha" data-sitekey="6LeTWu0UAAAAAD15IrNLdl3JkRoISHfDqW-jPs75"></div>
                                    <br />



                                    <button type="submit" class="btn supreme-btn btn-block"><?= TXT_CONTACT_SUBMIT; ?></button>
                                    <?php if ($mailstate == 'send') { ?>
                                        <div class="alert alert-success fade show" role="alert">
                                            <strong>Your message is send !</strong> Please wait 12 to 24 hours to receive the recipient's response
                                        </div>
                                    <?php } else if ($mailstate != 'pending') { ?>
                                        <div class="alert alert-danger fade show" role="alert">
                                            <strong>Your message is not send : </strong> <?= $mailstate ?>
                                        </div>
                                    <?php } ?>

                                </form>


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