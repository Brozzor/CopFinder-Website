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

function count_in($from, $where)
{
    include 'bdd.php';
    $fdm = first_date_month();
    $req = $pdo->query("SELECT COUNT(*) as nbtransac FROM " . $from . " WHERE " . $where . " >= " . $fdm . "");
    $donnees = $req->fetch();
    return $donnees->nbtransac;
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
    while ($row = $req -> fetch()) {
		$response[] = $row;
	}
    return $response;
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
    $req = $pdo->query("SELECT * FROM settings WHERE name = '".$nameInput."'");
    $data = $req->fetch();

    return $data['value'];
}

function checkout($mail, $id, $promo_code = "none")
{
    include_once ($_SERVER['DOCUMENT_ROOT'] .'/lib/stripe-php/init.php');
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || !is_numeric($id)) {
        return 'error mail or id';
    }

    \Stripe\Stripe::setApiKey(getSetting('stripe_privKey'));

    $products = productsBy($id);
    $url = 'https://cop-finder.com/payments.php?idtransac='. $idGenerate;
    $idGenerate = str_random(10);
    $price = transformPrice($products[0]['price']);
    $promoCheck = trim(htmlspecialchars($promo_code));

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
        addTransac($idGenerate,$id,$session['id'],$mail,$promoCheck);
        return json_encode([
            'id' => $session['id']
        ]);
    } catch (Exception $e) {
        return $e;
    }


}

function transformPrice($price){
    $newPrice = str_replace('.','',strval($price));
    if (strlen($newPrice) == 2){
        $newPrice = $newPrice . "00";
    } else if (strlen($newPrice) == 3) {
        $newPrice = $newPrice . "0";
    }
    return $newPrice;
}

function addTransac($idTransac,$pid,$stripeid,$mail,$promo_code){
    include 'bdd.php';
    $now = time();
    $req = $pdo->prepare("INSERT INTO transactions(id, pid, stripid,user_mail, promo_code, created, modified, state) VALUES('$idTransac', '$pid','$stripeid', '$mail', '$promo_code', $now, $now,'create')");
    $req->execute();
}

function checkPayments($idTransac){

}