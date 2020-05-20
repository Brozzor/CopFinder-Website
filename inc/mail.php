<?php

function sendMailBuyLicense($mail,$password,$token){
$subject = "Thanks for purchase";
$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />

    <!-- For development, pass document through inliner -->
    <link rel="stylesheet" href="css/simple.css">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-size: 100%;
            font-family: "Avenir Next", "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            line-height: 1.65;
        }

        img {
            max-width: 100%;
            margin: 0 auto;
            display: block;
        }

        body,
        .body-wrap {
            width: 100% !important;
            height: 100%;
            background: #f8f8f8;
        }

        a {
            color: #da2727;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .button {
            display: inline-block;
            color: white;
            background: #da2727;
            border: solid #da2727;
            border-width: 10px 20px 8px;
            font-weight: bold;
            border-radius: 4px;
        }

        .button:hover {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-bottom: 20px;
            line-height: 1.25;
        }

        h1 {
            font-size: 32px;
        }

        h2 {
            font-size: 28px;
        }

        h3 {
            font-size: 24px;
        }

        h4 {
            font-size: 20px;
        }

        h5 {
            font-size: 16px;
        }

        p,
        ul,
        ol {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 20px;
        }

        .container {
            display: block !important;
            clear: both !important;
            margin: 0 auto !important;
            max-width: 580px !important;
        }

        .container table {
            width: 100% !important;
            border-collapse: collapse;
        }

        .container .masthead {
            padding: 80px 0;
            color: white;
        }

        .container .masthead h1 {
            margin: 0 auto !important;
            max-width: 90%;
            text-transform: uppercase;
        }

        .container .content {
            background: white;
            padding: 30px 35px;
        }

        .container .content.footer {
            background: none;
        }

        .container .content.footer p {
            margin-bottom: 0;
            color: #888;
            text-align: center;
            font-size: 14px;
        }

        .container .content.footer a {
            color: #888;
            text-decoration: none;
            font-weight: bold;
        }

        .container .content.footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <table class="body-wrap">
        <tr>
            <td class="container">

                <!-- Message start -->
                <table>
                    <tr>
                        <td align="center" class="masthead">

                        <img width="300px" src="https://cop-finder.com/img/logo/logo.png" alt="logo copfinder">

                        </td>
                    </tr>
                    <tr>
                        <td class="content">

                            <h2>Welcome to Cop Finder,</h2>

                            <p>Thank you for purchasing a cop finder license to be able to use it you must install it on your chrome browser by clicking on the button just above then enter as identify your email address and as token key :
                                <strong>'.$token.'</strong><br>
                                You can change your token key at any time or renew it in your member area accessible <a href="https://cop-finder.com/manager">https://cop-finder.com/manager</a><br>
                                Your password to connect to your customer area is: <strong>'.$password.'</strong> 
                            </p>

                            <table>
                                <tr>
                                    <td align="center">
                                        <p>
                                            <a href="https://chrome.google.com/webstore/detail/copfinder/jjnpbaehcbblehaikehechlckjoaamck" style="color: white;" class="button">Install Cop Finder</a>
                                        </p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td class="container">

                <!-- Message start -->
                <table>
                    <tr>
                        <td class="content footer" align="center">
                            <p>Sent by <a href="https://cop-finder.com">Cop Finder</a></p>
                            <p><a href="mailto:">contact@cop-finder.com</a></p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>

</html>';
$headers="MIME-Version: 1.0\r\n";
$headers.='From:"cop-finder.com"<contact@cop-finder.com>'."\n";
$headers.= 'Content-Type:text/html; charset="uft-8"'."\n";
$headers.='Content-Transfer-Encoding: 8bit';

mail($mail,$subject,$message, $headers);
}