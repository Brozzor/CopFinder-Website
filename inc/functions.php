<?php

date_default_timezone_set('Europe/Paris');

function str_random($length)
{
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

function logged_only()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['auth'])) {
        $_SESSION['flash']['danger'] = "Veuillez vous connectez pour acceder à cette page";
        header('Location: https://buisson.pro/login.php');
        exit();
    }
}

function reconnect_from_cookie()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_COOKIE['remember']) && !isset($_SESSION['auth'])) {
        require_once 'bdd.php';
        if (!isset($pdo)) {
            global $pdo;
        }
        $remember_token = $_COOKIE['remember'];
        $parts = explode('==', $remember_token);
        $user_id = $parts[0];
        $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute([$user_id]);
        $user = $req->fetch();
        if ($user) {
            $expected = $user_id . '==' . $user->remember_token . sha1($user_id . 'ratonlaveurs');
            if ($expected == $remember_token) {
                session_start();
                $_SESSION['auth'] = $user;
                setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
            } else {
                setcookie('remember', null, -1);
            }
        } else {
            setcookie('remember', null, -1);
        }
    }
}

function where_month($variable)
{
    return date('m', $variable);
}

function where_day($variable)
{
    return date('d', $variable);
}

function day_in_seconds($var)
{
    return $var * 86400;
}

function hours_in_seconds($var)
{
    return $var * 3600;
}

function mins_in_seconds($var)
{
    return $var * 60;
}

function first_date_month()
{
    $ajd = time();
    $ajd_heure = hours_in_seconds(date("H"));
    $ajd_min = mins_in_seconds(date("i"));
    $ajd_sec = date("s");
    $retenu = 86400 - ($ajd_heure + $ajd_min + $ajd_sec);

    return $first_day_month = $retenu + ($ajd - day_in_seconds(where_day($ajd)));
}

function count_in($from, $where, $value)
{
    include 'bdd.php';
    $req = $pdo->query("SELECT COUNT(*) as nb FROM " . $from . " WHERE " . $where . " = '" . $value . "' ");
    $donnees = $req->fetch();
    return $donnees['nb'];
}

function productsBy($id = null)
{
    include 'bdd.php';
    if ($id == null) {
        $req = $pdo->prepare("SELECT * FROM products");
    } else if (is_numeric($id) && $id <= 3 && $id >= 1) {
        $req = $pdo->prepare("SELECT * FROM products WHERE id = $id");
    } else {
        $req = $pdo->prepare("SELECT * FROM products WHERE id = 2");
    }
    $req->execute();
    while ($row = $req->fetch()) {
        $response[] = $row;
    }
    return $response;
}

function transactionsBy($id)
{
    include 'bdd.php';
    $req = $pdo->prepare("SELECT * FROM transactions WHERE id = '$id'");
    $req->execute();
    return $req->fetch();
}

function getCouponIdByName($name)
{
    include 'bdd.php';
    if ($name == 'none') {
        return 0;
    } else if (count_in('coupon', 'name', $name) != 0) {
        $req = $pdo->prepare("SELECT id FROM coupon WHERE name = '$name' LIMIT 1");
        $req->execute();
        $row = $req->fetch();
        return $row['id'];
    } else {
        return 0;
    }
}

function getCouponById($id)
{
    include 'bdd.php';
    if (count_in('coupon', 'id', $id) != 0) {
        $req = $pdo->prepare("SELECT * FROM coupon WHERE id = '$id' LIMIT 1");
        $req->execute();
        return $req->fetch();
    } else {
        return 0;
    }
}

function diff_day_timestamp($date1, $date2)
{
    $date1 = new DateTime(date("Y-m-d H:i:s", $date1));
    $date2 = new DateTime(date('Y-m-d H:i:s', $date2));
    $interval = $date1->diff($date2);
    return $interval->format('%d');
}

function getSetting($nameInput)
{
    include 'bdd.php';
    $req = $pdo->query("SELECT * FROM settings WHERE name = '" . $nameInput . "'");
    $data = $req->fetch();

    return $data['value'];
}

function checkout($mail, $id, $promo_code = 'none')
{
    include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/stripe-php/init.php');
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || !is_numeric($id)) {
        return 'error mail or id';
    }

    \Stripe\Stripe::setApiKey(getSetting('stripe_privKey'));

    $products = productsBy($id);
    $idGenerate = str_random(10);
    $url = 'https://cop-finder.com/payments.php?idtransac=' . $idGenerate;
    $promo_code_id = getCouponIdByName(trim(htmlspecialchars($promo_code)));
    $price = priceCoupon($products[0]['price'], $promo_code_id, $id);
    try {
        $session = \Stripe\Checkout\Session::create([
            "success_url" => $url,
            "cancel_url" => $url,
            "customer_email" => $mail,
            "payment_method_types" => ["card"],
            "client_reference_id" => $idGenerate,
            "line_items" => [
                [
                    "name" => $products[0]['name'],
                    "amount" => $price,
                    "currency" => 'usd',
                    "quantity" => 1,
                ],
            ]
        ]);
        addTransac($idGenerate, $id, $session['id'], $mail, $promo_code_id, $products[0]['type']);
        return json_encode([
            'id' => $session['id']
        ]);
    } catch (Exception $e) {
        return $e;
    }
}

function transformPrice($price)
{
    $newPrice = str_replace('.', '', strval($price));
    if (strlen($newPrice) == 2) {
        $newPrice *= $newPrice . "00";
    } else if (strlen($newPrice) == 3) {
        $newPrice = $newPrice . "0";
    }
    return $newPrice;
}

function addTransac($idTransac, $pid, $stripeid, $mail, $promo_code, $type)
{
    include 'bdd.php';
    $now = time();
    $ip = get_ip_address();
    $req = $pdo->prepare("INSERT INTO transactions(id, pid, stripid,user_mail, promo_code, created, modified, state, type,uid,ip) VALUES('$idTransac', '$pid','$stripeid', '$mail', '$promo_code', $now, $now,'create', '$type', '0', '$ip')");
    $req->execute();
}

function priceCoupon($price, $id, $pid)
{

    $coupon = getCouponById($id);
    if ($id == 0 || $coupon == 0) {
        return transformPrice($price);
    }
    $products = explode(",", $coupon['pid']);

    if (time() >= $coupon['validity_date'] && time() <= $coupon['expiry_date']) {
        for ($i = 0; $i < count($products); $i++) {
            if (intval($pid) == $products[$i] || $products[$i] == 9999) {
                return ROUND((transformPrice($price) - ((transformPrice($price) * $coupon['promo_price']) / 100)));
                break;
            }
        }
    }
    return transformPrice($price);
}

function searchPercentEconomy($id)
{
    $value = getCouponById($id);
    return $value['promo_price'];
}

function createUser($mail, $pid, $ip)
{
    include 'bdd.php';
    $now = time();
    $product = productsBy($pid);
    $expiryDate = $now + ($product[0]['active_day'] * 86440);
    $password = str_random(6);
    $token = str_random(16);
    $req = $pdo->prepare("INSERT INTO users(mail,password,created_account_date,created_account_ip,token,token_expiry_date) VALUES('$mail', '$password', '$now', '$ip', '$token','$expiryDate')");
    $req->execute();
    return $pdo->lastInsertId();
}

function get_ip_address()
{
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }else{
        $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function updateTransac($id,$state,$uid)
{
    include 'bdd.php';
    $req = $pdo->prepare("UPDATE transactions SET state = '".$state."', uid = '".$uid."' WHERE id = '".$id."'");
    $req->execute();
}