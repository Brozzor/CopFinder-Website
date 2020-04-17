<?php
function isLanguage($sDefault = 'en') 
{
    if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
      $aBrowserLanguages = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
      foreach($aBrowserLanguages as $sBrowserLanguage) {
        $sLang = strtolower(substr($sBrowserLanguage,0,2));
          return $sLang;  
      }
    }
    return $sDefault;
}
$userLang = isLanguage();
if ($userLang == 'fr') {
	include('fr.php');
} else if ($userLang == 'en') {
	include('en.php');
} else {
	include('en.php');
}
