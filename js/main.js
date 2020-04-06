init();

function youtubePlay(){
    document.getElementById('youtubePlay').innerHTML = '<iframe width="560" height="338" src="https://www.youtube.com/embed/vIUPBYF8SpM" frameborder="0" allowfullscreen="" sandbox="allow-same-origin allow-scripts allow-forms"></iframe>'
}

function init(){
document.getElementById('navbar').innerHTML =  `
      <li class="nav-item">
        <a class="nav-link" href="">
          BLOG
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          FAQ
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          CONTACT
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          VIDEOS
        </a>
      </li>
      <hr class="vertical">
      <li class="nav-item">
        <a class="btn supreme-btn" href="">
          <i class="fa fa-shopping-cart"></i> BUY NOW
        </a>
      </li>

  `;

document.getElementById('footer').innerHTML =  `
<div class="container">
      <ul class="social-buttons">
        <a class="btn btn-just-icon btn-link btn-instagram" href="" target="_blank">
          <i class="fa fa-instagram"></i>
        </a>
        <a class="btn btn-just-icon btn-link btn-youtube" href="" target="_blank">
          <i class="fa fa-youtube-play"></i>
        </a>
      </ul>
      <div class="text-center">
        <img class="partner-logo" src="/img/payments/visa.png" alt="Visa">
        <img class="partner-logo" src="/img/payments/mastercard.png" alt="Mastercard">
        <img class="partner-logo" src="/img/payments/discover.png" alt="Discover">
        <img class="partner-logo" src="/img/payments/american-express.png" alt="Aex">
      </div>
      <div class="copyright pull-center">Copyright © 2020 COP FINDER | <a href="legal.pdf" target="_blank">Privacy Policy</a> | <a href="legal.pdf" target="_blank">Terms & Conditions</a></div><br>
    </div>
`;
}

function payments(){
   let productid = $_GET('id');
   requestApi("products", `&id=${productid}`, infoProducts);
}

function $_GET(param) {
	var vars = {};
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

function requestApi(use, argv, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "https://cop-finder.com/api/api.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("use=" + use + argv);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        let res = JSON.parse(xhr.responseText);
        if (res.status == "1" || res[0].status == "1") {
          if (callback != null) {
            callback(res);
          }
        } else {
          errorRequest();
        }
      }
    };
  }

  function infoProducts(res){
    console.log(res);
  }