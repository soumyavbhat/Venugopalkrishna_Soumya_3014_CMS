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




?>
