<?php
date_default_timezone_set('Europe/Paris');
function debug($variable)
{
    echo '<pre>' . print_r($variable, true) . '</pre>';
}

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

function getSetting($name)
{
    include 'bdd.php';
    $req = $pdo->query("SELECT * FROM settings WHERE name = " . $name . "");
    $data = $req->fetch();
    return $data->value;
}

function checkout($mail, $id)
{
    include_once ($_SERVER['DOCUMENT_ROOT'] .'/lib/stripe-php/init.php');
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse email '$mail' est considérée comme valide.";
    }else{
        echo "L'adresse email '$mail' est considérée comme invalide.";
    }


}