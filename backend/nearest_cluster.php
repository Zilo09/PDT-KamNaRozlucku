<?php

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$array = [];

// Connecting, selecting database
$dbconn2 = pg_connect("host=localhost port=5432 dbname=roylucka user=postgres password=vritiveslo") or die("Connection to DB failed: " . pg_last_error());


//select closest bar
$query = "SELECT name, amenity, ST_AsGeoJSON(st_transform(ST_SetSRID(way, 4326 ), 4326))::json As geometry
		FROM planet_osm_point
		WHERE amenity = 'bar'
		ORDER BY   ST_Distance( way, ST_GeomFromText('POINT($lng $lat)', 4326)) ASC
		LIMIT 1";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

        $array[] = [
                "type" => "Feature",
                "geometry" => json_decode($line['geometry']),
                "properties" => [
                        "title" => $line['name'],
                        "marker-symbol" => "cafe",
                        "marker-color" => "#e5a11e"
                ]
        ];
}

//select closest pub
$query = "SELECT name, amenity, ST_AsGeoJSON(st_transform(ST_SetSRID(way, 4326 ), 4326))::json As geometry
                FROM planet_osm_point
                WHERE amenity = 'pub'
                ORDER BY   ST_Distance( way, ST_GeomFromText('POINT($lng $lat)', 4326)) ASC
                LIMIT 1";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());


while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

        $array[] = [
                "type" => "Feature",
                "geometry" => json_decode($line['geometry']),
                "properties" => [
                        "title" => $line['name'],
                        "marker-symbol" => "beer",
                        "marker-color" => "#7b2210"
                ]
        ];
}

//select closest nightclub
$query = "SELECT name, amenity, ST_AsGeoJSON(st_transform(ST_SetSRID(way, 4326 ), 4326))::json As geometry
                FROM planet_osm_point
                WHERE amenity = 'nightclub'
                ORDER BY   ST_Distance( way, ST_GeomFromText('POINT($lng $lat)', 4326)) ASC
                LIMIT 1";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());


while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

        $array[] = [
                "type" => "Feature",
                "geometry" => json_decode($line['geometry']),
                "properties" => [
                        "title" => $line['name'],
                        "marker-symbol" => "star",
                        "marker-color" => "#ed0fe0"
                ]
        ];
}

//select closest place of worship
$query = "SELECT name, amenity, ST_AsGeoJSON(st_transform(ST_SetSRID(way, 4326 ), 4326))::json As geometry
                FROM planet_osm_point
                WHERE amenity = 'place_of_worship'
                ORDER BY   ST_Distance( way, ST_GeomFromText('POINT($lng $lat)', 4326)) ASC
                LIMIT 1";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());


while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

        $array[] = [
                "type" => "Feature",
                "geometry" => json_decode($line['geometry']),
                "properties" => [
                        "title" => $line['name'],
                        "marker-symbol" => "religious-christian",
                        "marker-color" => "#000000"
                ]
        ];
}

//select closest cinema
$query = "SELECT name, amenity, ST_AsGeoJSON(st_transform(ST_SetSRID(way, 4326 ), 4326))::json As geometry
                FROM planet_osm_point
                WHERE amenity = 'cinema'
                ORDER BY   ST_Distance( way, ST_GeomFromText('POINT($lng $lat)', 4326)) ASC
                LIMIT 1";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());


while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

        $array[] = [
                "type" => "Feature",
                "geometry" => json_decode($line['geometry']),
                "properties" => [
                        "title" => $line['name'],
                        "marker-symbol" => "cinema",
                        "marker-color" => "#3539e3"
                ]
        ];
}

echo json_encode($array);