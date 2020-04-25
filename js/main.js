function youtubePlay() {
  document.getElementById("youtubePlay").innerHTML =
    '<iframe width="560" height="338" src="https://www.youtube.com/embed/CpUCdvyzDcE" frameborder="0" allowfullscreen="" sandbox="allow-same-origin allow-scripts allow-forms"></iframe>';
}

function checkout() {
  let mail = document.getElementById("emailInput");
  if (validateEmail(mail.value)) {
    return window.location + "&email=" + mail.value;
  }else{
    document.getElementById('emailHelp').innerHTML = '<font color="red">Your mail address is not valid</font>';
    return window.location + "&email=";
  }
  
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function promoCodeAdd(){
  window.location = window.location + "&promo_code=" + document.getElementById('promocode-input').value
}