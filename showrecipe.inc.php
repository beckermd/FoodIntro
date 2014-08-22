<?php
include('Connection.php');

$mysqli->select_db('Recipe');


$recipeID = $_GET['id'];

$query = "SELECT RecipeID,Title,Poster,shortdescrip,Ingredients,Directions,Image from Recipe.FOOD WHERE RecipeID= $recipeID";

$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);


$title = $row['Title'];
$poster = $row['Poster'];
$description = $row['shortdescrip'];
$direction = $row['Directions'];
$directions = htmlspecialchars($direction);
$ingredients = $row['Ingredients'];
$ingredients = htmlspecialchars($ingredients);
$ingredient = nl2br($ingredients);
$image = $row['Image'];


if (empty($image)) {
    echo "<h2>$title</h2>
           <h6> Submited by $poster</h6>
           <h4>Ingridients</h4>
               $ingredient
          <h4>Directions</h4><p>$directions</p>";
} else {

    echo "<table>
            <td>
                <h2>$title</h2>
                <h6>Submited by $poster</h6>
                <h4>Ingridients</h4>
                    $ingredient
            </td>
            <td>
                <img src=getImage.php?id=$recipeID width='300px' height='300px'class=\"img-thumbnail\" style='text-align: right;margin: 0px' ></br>
            </td>
          </table>
    <h4>Directions</h4><p>$directions</p>";

}

// ============================================
// SQL to show Comments

$query = "SELECT count(CommentID) from Recipe.USER_COMMENTS WHERE RecipeID='$recipeID'";
$results = $mysqli->query($query);
$row = $results->fetch_array();


if ($row[0] == 0) {


//============================================
// Add comments or print recipe.
    echo "<div>";
    echo "Sorry there isn't comments at this time</br>";
    echo "<a href=\"IndexFood.php?content=newComment&id=$recipeID\">Add new comment</a>";
    echo "&nbsp;&nbsp;&nbsp;<a href=\"print.inc.php?id=$recipeID\" target=\"_blank\">Print</a>"; //=======Revisar!!
    echo "<hr>\n";
    echo "</div>";
} else {

    $totalrecords = $row[0];

    echo "<div>";
    echo $totalrecords . "\n";
    echo "&nbsp;comments posted.&nbsp;&nbsp;\n";

    echo "<a href=\"IndexFood.php?content=newComment&id=$recipeID\">Add a comment</a>\n";
    echo "&nbsp;&nbsp;&nbsp;<a href=\"print.inc.php?id=$recipeID\" target=\"_blank\">Print recipe</a>\n";
    echo "<hr>\n";

    if (!isset($_GET['page'])) {
        $thispage = 1;
    } else {

        $thispage = $_GET['page'];
    }
    $recordperpage = 5;

    $offset = ($thispage - 1) * $recordperpage;

    $totpages = ceil($totalrecords / $recordperpage);


    echo "<legend>Comments:</legend>";

    $query = "Select * from Recipe.USER_COMMENTS WHERE RecipeID='$recipeID' order by CommentID desc limit $offset,$recordperpage";

    $result = $mysqli->query($query);

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

        $poster = $row['Poster'];
        $date = $row['DateAdd'];
        $comment = $row['USER_COMMENT'];

        echo "
        <div class =\"list-group\"> $date &nbsp; &nbsp;&nbsp;&nbsp<span><b>Posted by</b></span> <i>$poster</i></br>
        <div>$comment</div></div>";


        if ($thispage > 1) {

            $page = $thispage - 1;

            $prevpag = "<a href=\"IndexFood.php?content=showrecipe&id=$recipeID&page=$page\">Prev</a>";
        }
        else {

            $prevpag = '';
        }

        $bar = '';

        if ($totpages> 1) {

            for ($page = 1; $page <= $totpages; $page++) {

                if ($page == $thispage) {

                    $bar = "$page";
                }
                else {

                    $bar .= " <a href=\"IndexFood.php?content=showrecipe&id=$recipeID&page=$page\">$page</a> ";

                }
            }

        }
        if ($thispage < $totpages) {

            $page = $thispage + 1;

            $nextpage = "<a href=\"IndexFood.php?content=showrecipe&id=$recipeID&page=$page\">Next</a>";
        } else {

            $nextpage = '';
        }


    }
    echo "Go to " . $prevpag . " ".$bar . " ".$nextpage;
}
echo "</div>";