<?php

include ('Connection.php');
function clean2($string)
{
    $string = str_replace('-', ' ', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}

$newsID = $_GET['id'];


$query = "Select Title,Newcomplete from Recipe.NEWS WHERE newsID='$newsID'";

$result = $mysqli->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);
$title = $row['Title'];
$news = $row['Newcomplete'];
$title=clean2($title);
$news=clean2($news);

echo"<h2> $title </h2>";
echo "<p>$news</p>";





