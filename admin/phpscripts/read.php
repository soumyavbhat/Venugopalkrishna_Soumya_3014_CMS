<?php
	function getAll($tbl)
	{
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		// echo $queryAll;

if($runAll)
{
	return $runAll;
}
else {
$error = "There was a problem accessing this information";
return $error;
}
		mysqli_close($link); //close or terminate the connection. Better to use so access to a db isn't accessible
	}



	function getSingle($tbl, $col, $id)
	{
		include('connect.php');
// $querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
// $querySingle = "SELECT * FROM tbl_movies m, tbl_genre g, tbl_movies_genre mg WHERE m.movies_id = {$id} and mg.movies_id = {$id} and g.genre_id = mg.genre_id";
$querySingle = "SELECT m.movies_id, movies_name, movies_desc, movies_year, movies_director, movies_rating, movies_stars, group_concat(' ',g.genre_name) as genre_name FROM tbl_movies m, tbl_genre g, tbl_movies_genre mg WHERE m.movies_id = {$id} and mg.movies_id = {$id} and g.genre_id = mg.genre_id";
$runSingle = mysqli_query($link, $querySingle);
// echo $querySingle;
if($runSingle)
{
	return $runSingle;
}
else {
$error = "There was a problem accessing this information";
return $error;
}

// echo $querySingle;

		mysqli_close($link);
	}

	function getEditSingle($tbl, $col, $id)
{
	include('connect.php');
$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
$runSingle = mysqli_query($link, $querySingle);

if($runSingle)
{
return $runSingle;
}
else {
$error = "There was a problem accessing this information";
return $error;
}

// echo $querySingle;

	mysqli_close($link);
}

// function genreResult($id)
// {
// 	include('connect.php');
//
// 	$genreQuery = "SELECT group_concat(g.genre_name) as genre_name from tbl_genre g, tbl_movies_genre mg where mg.movies_id = {$id} and g.genre_id = mg.genre_id";
// 	$genre = mysqli_query($link, $genreQuery);
//
// 	if($genre)
// 	{
// 		return $genre;
// 	}
// 	else {
// 	$error = "There was a problem accessing this information";
// 	return $error;
// 	}
// }
function filterResults($tbl1, $tbl2, $tbl3, $col1, $col2, $col3, $filter)
{
	include('connect.php');

	$filterQuery = "SELECT * FROM {$tbl1}, {$tbl2}, {$tbl3} where {$tbl1}.{$col1} = {$tbl3}.{$col1} and {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3} = '{$filter}'";
	// echo $filterQuery;

$runQuery = mysqli_query($link, $filterQuery);
if($runQuery)
{
return $runQuery;
}
else {
$error = "There was a problem accessing this information";
return $error;
}
		mysqli_close($link);
}


?>
