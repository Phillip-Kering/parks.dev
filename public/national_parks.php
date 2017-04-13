<?php

require __DIR__ . '/db_connection.php';
 

 

function pageController(){

	$_GET;

	$data = [];

	if(isset($_GET['page'])){
		$data['page'] = $_GET['page'];

	} else {

		$data['page'] = 1;
	}

	if($data['page'] < 1 || !is_numeric($data['page'])){
		$data['page'] = 1;
		header ("location: national_parks.php?page=1");
	} elseif ($data['page'] >= 3 || !is_numeric($data['page'])){
		$data['page'] = 3;
		echo "Last Page";
	}
	return $data;
}
extract(pageController());

function addPark($connection){
	$_POST;

	$add = [];


    $insert = "INSERT INTO national_parks (name, location, description, date_established, area_in_acres) VALUES (:name, :location, :description, :date_established, :area_in_acres)";

    $statement = $connection->prepare($insert);

    $statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $statement->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
    $statement->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
    $statement->bindValue(':date_established', $_POST['date_established'], PDO::PARAM_INT);
    $statement->bindValue(':area_in_acres', $_POST['area_in_acres'], PDO::PARAM_INT);

    $statement->execute();
}

if (!empty($_POST['name']) &&
	!empty($_POST['location']) &&
	!empty($_POST['description']) && 
	!empty($_POST['date_established']) &&
	!empty($_POST['area_in_acres']))
{
	addPark($connection);
}
	
	$limit = 4;

	$offSet = "offset" . " " . ($page -1) * $limit; 

	$select = "SELECT * FROM national_parks limit " . $limit . " " . $offSet;

	$statement  = $connection->prepare($select);

	$statement->execute(); 

	$parks = $statement->fetchAll(PDO::FETCH_ASSOC);




?>
<!DOCTYPE html>
<html>
	<head>
		<title>National Parks</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link rel = "stylesheet" href = "css/national_parks.css">
	</head>
<body>
	<center>
		<h1>National Parks</h1>
		<table>
			<tr>
				<th>Name</th>
				<th>Location</th>
				<th>Description</th>
				<th>Year Est.</th>
				<th>Area In Acres</th>
			</tr>

			<?php foreach($parks as $park => $rows) : ?>
				<tr>
					<td><?= $rows['name']?></td>
					<td><?= $rows['location']?></td>
					<td><?= $rows['description']?></td>
					<td><?= $rows['date_established']?></td>
					<td><?= $rows['area_in_acres']?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		<form method = "GET" action ="#">
		
			<?php if ($page == 1){
				  echo "<button type = 'submit' name = 'page' value = '" . ($page +1) . "'>Next</button>";
				} else {
					echo "<button type = 'submit' name = 'page' value = '" . ($page -1) . "'>Previous</button>";
					echo "<button type = 'submit' name = 'page' value = '" . ($page +1) . "'>Next</button>";
				}
			?>
			
		</form>
		<br>
		<br>
		<h3> Add A National Park</h3>
		<br>
		<form method = "POST" action = "national_parks.php">
			<div class = "containerInput">
				<label class = "label" placeholder = "Name">Name: </label>
				<input class = "input input1" name = "name" type = "text">
					<br>

				<label class = "label" placeholder = "Location">Location: </label>
				<input class = "input" name = "location" type = "text">
					
				<label class = "label" placeholder = "description">Description: </label>
				<input class = "input" name = "description" type = "text"><br>
					
				<label class = "label" placeholder = "date_established">Date Est: </label>
				<input class = "input" name = "date_established" type = "text"><br>
					

				<label class = "label" placeholder = "area_in_acres">Area In Acres: </label>
				<input class = "input" name = "area_in_acres" type = "text">

				<button class = "button" name ="submit" type = "submit">Add Park</button>
			</div>

		</form>
	</center>
</body>
</html>
