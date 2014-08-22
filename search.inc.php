<?php

include('Connection.php');

$search = $_GET['search'];

$words = explode(" ", $search);

$phrase = implode('AND Title', $words);


$mysqli->select_db('Recipe');

$query = "SELECT * FROM Recipe.FOOD WHERE ((TITLE LIKE '%$phrase%')OR (INGREDIENTS LIKE '%$phrase%'))";


$result = $mysqli->query($query);


$count = $result->num_rows;
if ($count == 0) {
    echo "<h4>Sorry, There is no match with <i>$search</i> in them</h4>";

} else {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $title = $row['Title'];
        $shortdescrip = $row['shortdescrip'];
        $RecipeID = $row['RecipeID'];

        echo "<div class='panel panel-default'>
                <div class ='panel-heading'>
                      <h3><a href=\"IndexFood.php?content=showrecipe&id=$RecipeID\">$title</a></h3>
                </div>
                <div class='panel-body'>
                   <h5>$shortdescrip</h5>
                </div>
               </div>";
    }

}

?>