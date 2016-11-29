<!DOCTYPE html>
<html>
<head>
	<title>proekt db</title>
	<script src='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href='https://api.mapbox.com/mapbox.js/v3.0.1/mapbox.css' rel='stylesheet' />
	<link href='css/style_2.css' rel='stylesheet' />
	<script
		src="https://code.jquery.com/jquery-3.1.1.min.js"
		integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		crossorigin="anonymous">
	</script>
	
</head>
<body>

	<nav id="primary_nav_wrap">
	<ul>
	  <li class="current-menu-item"><a href="#" id="clearMapMenu">Vyčisti</a></li>
	  <li><a href="#">Najbližšie ku tebe</a>
	    <ul>
	      <li><a href="#" id="nearest_bar">Bar</a></li>
	      <li><a href="#" id="nearest_pub">Krčma</a></li>
	      <li><a href="#" id="nearest_nightclub">Disco-Disko</a></li>
	      <li><a href="#" id="nearest_cinema">Kino</a></li>
	      <li><a href="#" id="nearest_place_of_worship">Svätyňa</a></li>
	    </ul>
	  </li>
	  <li><a href="#">Bližšie ako: </a>
	    <ul>
	      <li><a href="#" id="distance_bar">Bar</a></li>
	      <li><a href="#" id="distance_pub">Krčma</a></li>
	      <li><a href="#" id="distance_nightclub">Disco-Disko</a></li>
	      <li><a href="#" id="distance_cinema">Kino</a></li>
	      <li><a href="#" id="distance_place_of_worship">Svätyňa</a></li>
	    </ul>
	  </li>
	  <li>
	  	<input type="number" id="distance" value="1000"></input>  
	  </li>
	  <li><a href="#">Štvrť</a>
		<ul id="stvrte">
	      <li><a href="#">Staré Mesto</a></li>
	      <li><a href="#">Nové Mesto</a></li>
	      <li><a href="#">Petržalka</a></li>
	      <li><a href="#">Karlova Ves</a></li>
	      <li><a href="#">Vrakuňa</a></li>
	      <li><a href="#">Ružinov</a></li>
	      <li><a href="#">Lamač</a></li>
	      <li><a href="#">Dúbravka</a></li>
	    </ul>  	
	  </li>
	  <li><a href="#" id="nearest_cluster">Najbližší zhluk</a></li>
	</ul>
	</nav>

	<!--
	<div class="menu padding">
		<h2>MENU</h2>
		<ul>
	  		<li class="dropdown">Home 
	  			<div class="dropdown-content">
   					<p><a href="default.asp">Hello World!</a></p>
  				</div>
	  		</li>
	  		<li><a href="news.asp">News</a></li>
	  		<li><a href="contact.asp">Contact</a></li>
	  		<li><a href="about.asp">About</a></li>
		</ul>
	</div>
	-->
	<div class="map padding" id="map"></div>

	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>