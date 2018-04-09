<?php

function addMovie($name, $image, $synopsis, $stars, $rating, $year, $director, $genre)
{
	  include('connect.php');
// image is the type of file and then the extension
if($image['type'] == "image/jpg" || $image['type'] == "image/jpeg"){
			$targetpath = "../images/{$image['name']}";

			if(move_uploaded_file($image['tmp_name'], $targetpath)){
				echo "File transfer complete";
			$th_copy = "../images/TH_{$image['name']}";
				if(!copy($targetpath, $th_copy)){
					$message = "Whoops, that didn't work.";
					return $message;
				}
				$size = getimagesize($targetpath);
		 echo $size[1]; // check the php.net for getimagesize

		 list( $width,$height ) = getimagesize($targetpath);
		 $widthchanged = 350;
		 $heightchanged = 600;

		 $thumb = imagecreatetruecolor( $widthchanged, $heightchanged );
		 $source = imagecreatefromjpeg($th_copy);
		 imagecopyresized($thumb, $source, 0, 0, 0, 0, $widthchanged, $heightchanged, $width, $height);
		 imagejpeg( $thumb, $th_copy, 100 );

		 $out_image=addslashes(file_get_contents($th_copy));


$qstring = "INSERT into tbl_movies VALUES(NULL, '{$name}', '{$image['name']}', '{$synopsis}', '{$stars}', '{$rating}' ,'{$year}', '{$director}')";
// echo $qstring;
$result1= mysqli_query($link, $qstring);

if($result1)
{
	$qstring2 = "SELECT * from tbl_movies order by movies_id desc limit 1";
	$result2 = mysqli_query($link, $qstring2);
	$row = mysqli_fetch_array($result2);
	$lastID = $row['movies_id'];
	// echo $lastID;
	}
	// else {
	// 	echo "Error";
	// }

	$genq = "INSERT into tbl_mov_genre values(NULL, {$lastID}, {$genre} )";
	$result3 = mysqli_query($link, $genq);
}
redirect_to("admin_index.php");
//$size = getimagesize($targetpath);
//echo $size[2];
}

else{
echo "No GIF's allowed";
}

}

function deleteMovie($id)
{
  include('connect.php');

$delete = "DELETE from tbl_movies where movies_id= {$id}";
$deletequery = mysqli_query($link, $delete);
// echo $delete;
if($deletequery)
{
  redirect_to('../admin_movie.php?id=1');

}
else{
  $message = "error";
  return $message;
}
  mysqli_close($link);
}




 ?>
