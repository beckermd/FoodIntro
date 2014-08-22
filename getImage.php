<?php
include('Connection.php');

$mysqli->select_db('Recipe');

$recipeID = $_GET['id'];

$query = "Select Image from Recipe.FOOD where RecipeID=$recipeID";

$image = $mysqli->query($query);

if ($image) {
    $image = $image->fetch_array(MYSQL_BOTH);


    header("Content-type:Image/jpeg");

    echo $image[0];
} else {

    echo "the error is" . $mysqli->error;
}

