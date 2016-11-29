layers = [];
actualPosition = null;
previousPosition = null;
map;
vcircleLayer = null;

function addToMap (geoJson, addToArray = true) {
	var nieco = L.mapbox.featureLayer(geoJson).addTo(map);

	if (addToArray){
		layers.push(nieco);
	}
	return nieco;
}

function clearMap (isPos) {
	for (layer of layers) {
		layer.clearLayers();
	}
}

L.mapbox.accessToken = 'pk.eyJ1IjoiemlsbzA5IiwiYSI6ImNpdndpY2lqdzAwMGcyenBrdGFzdmV4Y3MifQ.A2N2OJ3OAb2eTmvFgcgZQQ';
map = L.mapbox.map('map', 'mapbox.streets')
    .setView([48, 17], 10);

$("#nearest_bar").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/nearest_bar.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
	},
	function(json){
        clearMap();
        addToMap (json);
    });

});

$("#nearest_pub").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/nearest_pub.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
	},
	function(json){
        clearMap();
        addToMap (json);
    });

});

$("#nearest_nightclub").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/nearest_love_hotel.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
	},
	function(json){
        clearMap();
        addToMap (json);
    });

});

$("#nearest_place_of_worship").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/nearest_place_of_worship.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
	},
	function(json){
        clearMap();
        addToMap (json);
    });

});

$("#nearest_cinema").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/nearest_cinema.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
	},
	function(json){
        clearMap();
        addToMap (json);
    });

});

$("#distance_bar").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/distance_bar.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
		distance: $("#distance").val()
	},
	function(json){
        clearMap();
        addToMap (json);
    });

	if (circleLayer) {
		map.removeLayer(circleLayer);
	}

	circleLayer = L.circle([actualPosition.lat, actualPosition.lng], parseInt($("#distance").val())).addTo(map);
});

$("#distance_pub").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/distance_pub.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
		distance: $("#distance").val()
	},
	function(json){
        clearMap();
        addToMap (json);
    });

	if (circleLayer) {
		map.removeLayer(circleLayer);
	}

	circleLayer = L.circle([actualPosition.lat, actualPosition.lng], parseInt($("#distance").val())).addTo(map);
});

$("#distance_nightclub").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/distance_love_hotel.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
		distance: $("#distance").val()
	},
	function(json){
        clearMap();
        addToMap (json);
    });

	if (circleLayer) {
		map.removeLayer(circleLayer);
	}

	circleLayer = L.circle([actualPosition.lat, actualPosition.lng], parseInt($("#distance").val())).addTo(map);
});

$("#distance_cinema").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/distance_cinema.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
		distance: $("#distance").val()
	},
	function(json){
        clearMap();
        addToMap (json);
    });

	if (circleLayer) {
		map.removeLayer(circleLayer);
	}

	circleLayer = L.circle([actualPosition.lat, actualPosition.lng], parseInt($("#distance").val())).addTo(map);
});

$("#distance_place_of_worship").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/distance_place_of_worship.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
		distance: $("#distance").val()
	},
	function(json){
        clearMap();
        addToMap (json);
    });

	if (circleLayer) {
		map.removeLayer(circleLayer);
	}

	circleLayer = L.circle([actualPosition.lat, actualPosition.lng], parseInt($("#distance").val())).addTo(map);
});



$("#nearest_cluster").on("click", function(){

	$.getJSON("http://localhost/databazy-projekt/backend/nearest_cluster.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
	},
	function(json){
        clearMap();
        addToMap (json);
    });

});

$("#clearMapMenu").on("click", clearMap);

$("#stvrte li a").on("click", function(){

	var name = $(this).text();	

	$.getJSON("http://localhost/databazy-projekt/backend/inside_district.php", {
		lat: actualPosition.lat,
		lng: actualPosition.lng,
		district: name,
	},
	function(json){
        clearMap();
        addToMap (json);
    });
	
}); 

map.on("click", function(event) {
	/*if (actualPosition == null) {
		actualPosition = event.latlng;
		previousPosition = addToMap({
			type: "Feature",
			geometry: {
				type: "Point",
				coordinates: [ actualPosition.lng, actualPosition.lat ]
			}
		});
	} else {
		previousPosition.clearLayers();
		actualPosition = event.latlng;
		previousPosition = addToMap({
			type: "Feature",
			geometry: {
				type: "Point",
				coordinates: [ actualPosition.lng, actualPosition.lat ]
			}
		});
	}*/
	if (previousPosition) previousPosition.clearLayers();
	actualPosition = event.latlng;
		previousPosition = addToMap({
			type: "Feature",
			geometry: {
				type: "Point",
				coordinates: [ actualPosition.lng, actualPosition.lat ]
			},
			"properties": {
				"marker-color": "#D22222"
			}
		}, false);
});
