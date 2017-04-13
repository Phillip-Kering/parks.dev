<?php

require __DIR__ . '/db_connection.php';
 

 
$parks = [
    [
        "name" => "Yellowstone National Park",
        "location" => "California",
        "description" => "National Park",
        "date_established" => 1872,
        "area_in_acres" => 2219791
    ],
    [
        "name" => "Great Smokey Mountains",
        "location" => "North Carolina",
        "description" => "National Park",
        "date_established" => 1939,
        "area_in_acres" => 522427
    ],
    [
        "name" => "Grand Canyon",
        "location" => "Arizona",
        "description" => "National Park",
        "date_established" => 1919,
        "area_in_acres" => 1217262
    ],
    [
        "name" => "Acadia",
        "location" => "Maine",
        "description" => "National Park",
        "date_established" => 1919,
        "area_in_acres" => 48995
    ],
    [
        "name" => "American Samoa",
        "location" => "Samoa",
        "description" => "National Park",
        "date_established" => 1988,
        "area_in_acres" => 28892
    ],
    [
        "name" => "Arches",
        "location" => "Utah",
        "description" => "National Park",
        "date_established" => 1971,
        "area_in_acres" => 76678
    ],
    [
        "name" => "Badlands",
        "location" => "South Dakota",
        "description" => "National Park",
        "date_established" => 1978,
        "area_in_acres" => 996263
    ],
    [
        "name" => "Big Bend",
        "location" => "Texas",
        "description" => "National Park",
        "date_established" => 1944,
        "area_in_acres" => 388290
    ],
    [
        "name" => "Biscanye",
        "location" => "Florida",
        "description" => "National Park",
        "date_established" => 1980,
        "area_in_acres" => 514709
    ],
    [
        "name" => "Black Canyon of the Gunnison",
        "location" => "Colorado",
        "description" => "National Park",
        "date_established" => 1999,
        "area_in_acres" => 30749
    ]
];

foreach($parks as $park)
{

    $query = "INSERT INTO national_parks (name, location, description, date_established, area_in_acres) VALUES (:name, :location, :description, :date_established, :area_in_acres)";

    $statement = $connection->prepare($query);

    $statement->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $statement->bindValue(':location', $park['location'], PDO::PARAM_STR);
    $statement->bindValue(':description', $park['description'], PDO::PARAM_STR);
    $statement->bindValue(':date_established', $park['date_established'], PDO::PARAM_INT);
    $statement->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_INT);

    $statement->execute();
}
