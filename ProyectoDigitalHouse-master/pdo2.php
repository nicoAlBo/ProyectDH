<?php



if($_POST){
  $db = new PDO('mysql:host=localhost;dbname=movies_db', 'root', 'root',
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	var_dump($_POST);

	$title = $_POST['title'];
	$rating = $_POST['rating'];
	$awards = $_POST['awards'];
	$length = $_POST['length'];
	$release_date = $_POST['release_date'];


  $sql="select * from movies where title = :title";
  $stmt = $db->prepare( $sql );
	$stmt->bindValue(':title', $title );
	$stmt->execute();

if($stmt -> rowCount()==0){



	$sql = "insert into movies (title, rating, awards, length, release_date)
	 values ( :title, :rating, :awards, :length, :release_date )";

	$stmt = $db->prepare( $sql );
	$stmt->bindValue(':release_date', $release_date );
	$stmt->bindValue(':rating', $rating );
	$stmt->bindValue(':awards', $awards );
	$stmt->bindValue(':title', $title );
	$stmt->bindValue(':length', $length );
	$stmt->execute();
}else {
  $sql="update movies set rating=:rating, awards=:awards,
        release_date=:release_date, length=:length where title = :title";
    $stmt = $db->prepare( $sql );
    $stmt->bindValue(':release_date', $release_date );
  	$stmt->bindValue(':rating', $rating );
  	$stmt->bindValue(':awards', $awards );
  	$stmt->bindValue(':length', $length );
    $stmt->bindValue(':title', $title );
    $stmt->execute();

}
	echo 'Se pudo gil';

}
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar Pelicula</title>

</head>

<body>
	<form method="post">
		<div>
			<label>Titulo</label>
			<input type="text" name="title" >
		</div>
		<div>
			<label>Rating</label>
			<input type="text" name="rating" >
		</div>
		<div>
			<label>Premios</label>
			<input type="text" name="awards" >
		</div>
		<div>
			<label>Duracion</label>
			<input type="text" name="length" >
		</div>
		<div>
			<label>Fecha de Estreno</label> <br>
			<input type="date" name="release_date">
		</div>
		<button type="submit">Guardar película</button>
	</form>
</body>

</html>
