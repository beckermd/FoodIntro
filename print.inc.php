<?php
include ('Connection.php');
header('Content-type: text/html; charset=utf-8');

$recipeID=$_GET['id'];

$mysqli->select_db('Recipe');

$query="SELECT Title, Poster, Ingredients, Directions From Recipe.FOOD WHERE RecipeID='$recipeID'";

$result= $mysqli->query($query);

$row=$result->fetch_array(MYSQLI_ASSOC);

$title= $row['Title'];
$poster=$row['Poster'];
$ingredients=$row['Ingredients'];
$ingredients=nl2br($ingredients);
$directions=$row['Directions'];
$directions=nl2br($directions);

echo "<h3>$title</h3>";
echo "<h6>Posted by $poster </h6>";
echo "<h4>Ingredients:</h4><h5>$ingredients</h5>";
echo "<h4>Directions:</h4><h5>$directions</h5>";

