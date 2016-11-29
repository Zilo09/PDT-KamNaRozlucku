<?php

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$distance = $_GET['distance'];

// Connecting, selecting database
$dbconn2 = pg_connect("host=localhost port=5432 dbname=roylucka user=postgres password=vritiveslo") or die("Connection to DB failed: " . pg_last_error());


$query = "SELECT name, amenity, ST_AsGeoJSON(st_transform(ST_SetSRID(way, 4326 ), 4326))::json As geometry
                FROM planet_osm_point
                WHERE amenity = 'nightclub'
                AND ST_DistanceSphere('POINT($lng $lat)',way) < $distance";

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Print result of querry
$array = [];
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

        $array[] = [
                "type" => "Feature",
                "geometry" => json_decode($line['geometry']),
                "properties" => [
                        "title" => $line['name']
                ]
        ];
}

echo json_encode($array);