<?php 
 

 
//mysql -u vagrant -p -- localhost / 127.0.0.1
// DSN Data Source Name
// 1 Driver. mesql
// 2 Host 127.0.0.1 or localhost 
// 3 Database name. employees
// 4 username: vagrant 
// 5 password: vagrant 
require __DIR__ . '/../constants.php';

//         ^^ sets the correct file path to get to the file that is linked VIA the require. when using DIR you must have the forward slash 


try {

$connection = new PDO (

	'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
	DB_USER,
	DB_PASSWORD
	);


// ****** NEVER PUSH THIS STUFF TO GIT >>>>> THATS WHY WE DEFINE THE CONSTANTS IN ANOTHER FILE. 

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// defining the PDOException (if connection has failed)
} catch (PDOException $dbc){


// this is optional -- It shows that the connection was successfull.
//if there is an exception --- catch it and get the error message
echo $dbc->getMessage() . PHP_EOL;

}

// Outputting the connection status  (if successful)
echo $connection->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";



// Exception 

// exceptional. - Something that you cannot control 
