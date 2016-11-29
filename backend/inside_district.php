<?php

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$district = $_GET['district'];

// Connecting, selecting database
$dbconn2 = pg_connect("host=localhost port=5432 dbname=roylucka user=postgres password=vritiveslo") or die("Connection to DB failed: " . pg_last_error());

$array = [];

function select ($place, $symbol = "") {
        global $lat;
        global $lng;
        global $district;
        global $array;

        $query = "SELECT planet_osm_point.name, planet_osm_point.amenity, ST_asgeojson(ST_transform(planet_osm_point.way, 4326)) as geometry
        FROM planet_osm_point
        JOIN planet_osm_polygon
        ON ST_Contains(planet_osm_polygon.way, planet_osm_point.way)
        WHERE planet_osm_point.amenity = '$place' AND planet_osm_polygon.name = '$district'
        ORDER BY
        ST_distance(
                ST_GeomFromText('POINT($lng $lat)', 4326),
                planet_osm_point.way
        ) DESC
        LIMIT 1";

        $result = pg_query($query) or die('Query failed: ' . pg_last_error());


        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {

                $array[] = [
                        "type" => "Feature",
                        "geometry" => json_decode($line['geometry']),
                        "properties" => [
                                "title" => $line['name'],
                                "marker-symbol" => $symbol
                        ]
                ];
        }
}

select("pub", "beer");
select("bar", "cafe");
select("cinema", "cinema");
select("nightclub");
select("place_of_worship");


echo json_encode($array);

