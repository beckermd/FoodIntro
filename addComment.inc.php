<?php


include('Connection.php');

date_default_timezone_set('UTC');
$recipeID = $_POST['RecipeID'];
$poster = $_POST['poster'];
$comment = $_POST['texto'];

$date = date("Y-m-d");

//$mysqli->select_db('Recipe');

$query = "INSERT INTO Recipe.USER_COMMENTS(DateAdd, Poster, RecipeID, USER_COMMENT) VALUES ('$date','$poster',$recipeID,'$comment')";

$result = $mysqli->query($query);

if ($result){

    echo "<h4>Comment submitted</h4>";
    echo "<a href=IndexFood.php?comment=showrecipe&id=$recipeID>Return to recipe</a>";
}
else {
    echo $mysqli->error;
    echo $comment;
    echo "<h3 style='color: red'>There is a problem submit your comment</h3>";
    echo "<a href=IndexFood.php?comment=showrecipe&id=$recipeID>Return to recipe</a>";
}

