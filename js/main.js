function youtubePlay() {
  document.getElementById("youtubePlay").innerHTML =
    '<iframe width="560" height="338" src="https://www.youtube.com/embed/QmXAbBAyJ4s" frameborder="0" allowfullscreen="" sandbox="allow-same-origin allow-scripts allow-forms"></iframe>';
}

function $_GET(param) {
	let vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi,
		function( m, key, value ) {
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}

function checkout() {
  let mail = document.getElementById("emailInput");
  let cgu = document.getElementById("accept-check").checked;
  if (validateEmail(mail.value) && cgu) {
    return urlPage + "&email=" + mail.value + "&promo_code=" + $_GET('promo_code');
  }else if (!cgu){
    document.getElementById('emailHelp').innerHTML = '<font color="red">You must accept the conditions</font>';
  }else{
    document.getElementById('emailHelp').innerHTML = '<font color="red">Your mail address is not valid</font>';
  }
  return urlPage + "&email=";
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function promoCodeAdd(){
  window.location = urlPage + "&promo_code=" + document.getElementById('promocode-input').value
}