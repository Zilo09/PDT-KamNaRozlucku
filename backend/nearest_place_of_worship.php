<?php

$lat = $_GET['lat'];
$lng = $_GET['lng'];

// Connecting, selecting database
$dbconn2 = pg_connect("host=localhost port=5432 dbname=roylucka user=postgres password=vritiveslo") or die("Connection to DB failed: " . pg_last_error());

$query = "SELECT name, amenity, ST_AsGeoJSON(st_transform(ST_SetSRID(way, 4326 ), 4326))::json As geometry
		FROM planet_osm_point
		WHERE amenity = 'place_of_worship'
		ORDER BY   ST_Distance( way, ST_GeomFromText('POINT($lng $lat)', 4326)) ASC
		LIMIT 1";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());


// Print result of querry
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo json_encode([
        	"type" => "Feature",
        	"geometry" => json_decode($line['geometry']),
        	"properties" => [
        		"title" => $line['name']
        	]
        ]);
}
