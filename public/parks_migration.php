<?php

require __DIR__ . '/db_connection.php';



$dropTable = 'drop table if exists national_parks';

$connection->exec($dropTable);


$createTable = 'CREATE TABLE national_parks(
	id int unsigned NOT NULL AUTO_INCREMENT,
	name varchar(80) not null,
	location varchar(300) not null,
	description varchar(500),
	date_established int not null,
	area_in_acres int not null,
	primary key(id) 
)';

$connection->exec($createTable);

