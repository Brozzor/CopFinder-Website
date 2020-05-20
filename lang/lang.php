<?php

function isLanguage($lang = null) 
{
    $langRes = "";
    if ($lang == null || $lang == 'en')
    {
      $langRes = 'en';
    }else{
      $langRes = 'fr';
    }
    return $langRes;

}

if (isset($_GET['lang'])){
  $userLang = isLanguage($_GET['lang']);
}else{
  $userLang = isLanguage();
}

if ($userLang == 'fr') {
	include('fr.php');
} else if ($userLang == 'en') {
	include('en.php');
} else {
	include('en.php');
}