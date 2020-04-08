function youtubePlay(){
    document.getElementById('youtubePlay').innerHTML = '<iframe width="560" height="338" src="https://www.youtube.com/embed/vIUPBYF8SpM" frameborder="0" allowfullscreen="" sandbox="allow-same-origin allow-scripts allow-forms"></iframe>'
}

function checkout(){
    let mail = document.getElementById('emailInput');
   return window.location = window.location + "&email=" + mail.value;
}