<?php
date_default_timezone_set('europe/paris');
//ini_set('display_errors', 1);
//error_reporting(E_ALL); 

//-------------------------------------------------------------------------------------------------------------
//-------------------------------------Fonction API------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

function getIp(){
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	      $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	      $ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function insertApiIpCheck($use,$key = false,$mail = false){
	include '../inc/bdd.php';
	
	$goodUse = addslashes($use);
	if ($mail)
	{
		$id = getUidInfos($mail,'mail');
	}
	else if ($key)
	{
		$goodKey = addslashes($key);
		$id = getUidInfos($goodKey);
	}
	else
	{
		$id = '0';
	}

	$request = $pdo->prepare("INSERT INTO api_ip_check(uid,ip, date_insert, page_api) VALUES ('".$id."','".getIp()."', '".time()."', '".$goodUse."')");
	$request->execute();
}

function getUidInfos($value,$type = null)
{
	include '../inc/bdd.php';
	if ($type == 'mail') {
		$req = $pdo->prepare("SELECT id FROM users WHERE mail = '".$value."'");
	}
	else
	{
		$req = $pdo->prepare("SELECT id FROM users WHERE generate_key = '".$value."'");
	}
	$req->execute();
	$row = $req->fetch();

	if ($row['id'] == null){
		$res = '0';
	}else{
		$res = $row['id'];
	}

    return $res;
}

function insertGenerateKey($id, $key){
	include '../inc/bdd.php';
	$request = $pdo->prepare("UPDATE users SET generate_key = '".$key."' WHERE id = ".$id."");
	$request->execute();
}

function checkSpam(){
	include '../inc/bdd.php';
	$stmt = $pdo->query("SELECT count(*) as nb FROM api_ip_check WHERE date_insert > ".time()." - 900 AND ip = '".getIp()."'");
	$res = $stmt->fetch();
	if ($res['nb'] >= '120'){
		displayJson('5', "too many connection failures, you have to wait more than minutes");
	exit();
	}

}

function generateKey() {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, 80 );
    return $password;
}

function checkGoodAccount($mail, $token){
	include '../inc/bdd.php';
	$req = $pdo->query("SELECT id,global_name FROM users WHERE mail = '".$mail."' AND token = '".$token."' ");
	$res = $req->fetch();
	$generateKey = generateKey();
	if ($res['id'] == NULL){
		displayJson('0', "mail or token is invalid");
		exit();
	}

	insertGenerateKey($res['id'], $generateKey);
	displayJson('1', "Hello", $generateKey);
}

function displayJson($status, $statusMsg, $key = ''){
	$response=array(
        'status' => $status,
        'status_message' => $statusMsg,
        'key' => $key
      );
	header('Content-Type: application/json');
	echo json_encode($response);
}

function displayPersoInfo($key){
	include '../inc/bdd.php';
	$response = array();
	$req = $pdo -> query("SELECT id,mail,global_name,tel,address,city,postcode,country FROM users WHERE generate_key = '".$key."'");
	$response[] = array('status' => '1');

	while ($row = $req -> fetch()) {
		$response[] = utf8ize($row);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

function displayCat(){
	include '../inc/bdd.php';
	
	$response = array();
	$req = $pdo -> query("SELECT DISTINCT cat_stuff.id, cat_stuff.name ,(SELECT count(*) FROM cop_stuff WHERE cat_stuff.id = cop_stuff.cat_id) AS nb FROM `cat_stuff` INNER JOIN cop_stuff ON cop_stuff.cat_id = cat_stuff.id");
	$response[] = array('status' => '1');
	while ($row = $req -> fetch()) {
		$response[] = $row;
	}
	header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);

}

function addInfoUser($key,$name,$tel,$city,$postcode,$country,$address){
	include '../inc/bdd.php';
	$request = $pdo->prepare("UPDATE users SET global_name = '".$name."', tel = '".$tel."', city = '".$city."', postcode = '".$postcode."', country = '".$country."', address = '".$address."' WHERE generate_key = '".$key."'");
	$request->execute();
	displayJson('1', "inserer");
}

function displayItem($catId = '0', $itemId = '0'){
	include '../inc/bdd.php';
	$response = array();
	if ($catId == '0' && $itemId == '0'){

		$req = $pdo -> query("SELECT * FROM cop_stuff");
		$response[] = array('status' => '1');

	} else if ($catId == '0' && $itemId != '0'){

		$req = $pdo -> query("SELECT * FROM cop_stuff WHERE id = '".$itemId."'");
		$response[] = array('status' => '1');

	} else {

		$req = $pdo -> query("SELECT * FROM cop_stuff WHERE cat_id = '".$catId."' ");
		$req2 = $pdo -> query("SELECT * FROM cat_stuff WHERE id = '".$catId."' ");
		$row2 = $req2 -> fetch();
		$response[] = array('status' => '1' , 'catName' => $row2['name']);

	}
	while ($row = $req -> fetch()) {
		$response[] = utf8ize($row);
	}

	header('Content-Type: application/json');
	echo json_encode($response);
}

function checkWithKey($key){
	include '../inc/bdd.php';
	$goodKey = addslashes($key);
	if ($goodKey == NULL) {
		displayJson('0', 'reconnect key invalid , please re login');
		exit();
	}
	$req = $pdo->query("SELECT id,global_name FROM users WHERE generate_key = '".$goodKey."' ");
	$res = $req->fetch();

	if ($res['id'] == NULL){
		displayJson('0', 'reconnect key invalid , please re login');
		exit();
	}
	return true;
}

if ($_POST['use'] == NULL)
{
	$response=array(
        'status' => 5,
        'status_message' => "forbidden access to this page"
      );
	header('Content-Type: application/json');
	echo json_encode($response);
	exit();
}
//-------------------------------------------------------------------------------------------------------------
//-------------------------------------check-------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

$use = htmlspecialchars($_POST['use']);
if (isset($_POST['key']))
{
	$keyCheck = htmlspecialchars($_POST['key']);
}else{
	$keyCheck = false;
}

checkSpam();

//-------------------------------------------------------------------------------------------------------------
//-------------------------------------Déroulement du code-----------------------------------------------------
//-------------------------------------------------------------------------------------------------------------

switch ($use) {
	case 'login':

		$mailCheck = addslashes(htmlspecialchars($_POST['mail']));
		$tokenCheck = addslashes(htmlspecialchars($_POST['token']));
		insertApiIpCheck($use,$tokenCheck,$mailCheck);
		if ($mailCheck == NULL || $tokenCheck == NULL)
		{
			displayJson('0', "mail or token is invalid");
			exit();
		}
		checkGoodAccount($mailCheck, $tokenCheck);

		break;

	case 'reconnect':

		$keyCheck = htmlspecialchars($_POST['key']);
		insertApiIpCheck($use,$keyCheck);
		if (checkWithKey($keyCheck)) {
			displayJson('1', 'its good');
		}

		break;

	case 'checkK':
		insertApiIpCheck($use,$keyCheck);
		$keyCheck = htmlspecialchars($_POST['key']);

		if (checkWithKey($keyCheck)) {
			displayJson('1', 'its good');
		}

		break;

	case 'item-cat':

		$keyCheck = htmlspecialchars($_POST['key']);

		if (checkWithKey($keyCheck)) {
			displayCat();
		}

		break;

	case 'item-all':

		$keyCheck = htmlspecialchars($_POST['key']);

		if (checkWithKey($keyCheck)) {
			displayItem();
		}

		break;

	case 'item-choice':

		$keyCheck = htmlspecialchars($_POST['key']);

		if (checkWithKey($keyCheck)) {
			
		if ($_POST['itemId']){
			$itemIdCheck = addslashes(htmlspecialchars($_POST['itemId']));
			displayItem('0', $itemIdCheck);
		}else{
			$catIdCheck = addslashes(htmlspecialchars($_POST['catId']));
			displayItem($catIdCheck);
		}

		}

		break;

	case 'perso':

		$keyCheck = addslashes(htmlspecialchars($_POST['key']));

		if (checkWithKey($keyCheck)) {
			displayPersoInfo($keyCheck);
		}

		break;
	
	default:
		header("HTTP/1.0 405 Method Not Allowed");
		break;
}

?>