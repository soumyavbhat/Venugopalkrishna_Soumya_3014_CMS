<?php

function single_edit($tbl, $col, $id)
{
  $result = getEditSingle($tbl, $col, $id);
  $getResult = mysqli_fetch_array($result);

  // echo "No of cols :".mysqli_num_fields($result)."<br>";

echo "<form action= \"phpscripts/edit.php\" method=\"post\">";
echo "<input hidden name=\"tbl\" value=\"{$tbl}\" >";
echo "<input hidden name=\"col\" value=\"{$col}\" >";
echo "<input hidden name=\"id\" value=\"{$id}\" >";

  for($i=0; $i<mysqli_num_fields($result); $i++)
  {
    $datatype = mysqli_fetch_field_direct($result, $i);
    $fieldName = $datatype->name;
    $fieldType = $datatype->type;
    // echo $fieldName."<br>";
    // echo $fieldType."<br>";

    if($fieldName != $col)
    {
      echo "<label class=\'l\'>{$fieldName}</label>";
if($fieldName == 'movies_img')
{
  echo "<img class=\"editimage\" src=\"../images/{$getResult[$i]}\">
  <input type=\"file\" name=\"{$fieldName}\" value=\"\"";
}
      elseif($fieldType != "252")
      {
        echo "<input class=\'i\' type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"><br>";
      }
      else{
        echo "<textarea class=\"i\" type=\"text\" name=\"{$fieldName}\">{$getResult[$i]}</textarea><br>";

      }
    }
  }
  echo "<input class=\"newMovie\" name=\"submit\" type=\"submit\" value=\"Save Content\">";
  echo "</form>";
}
 ?>
