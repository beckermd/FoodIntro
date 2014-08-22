<?php
include("Connection.php");


?>

<!-- Last Recipies
=====================================================  -->
<div>
    <fieldset>
        <div class="page-header">
        <h1 id="indicators">Last Recipes</h1>
        </div>
        <?php

        $query = "SELECT RecipeID,Title,Poster,shortdescrip from Recipe.FOOD order by RecipeID desc limit 5";

        $result= $mysqli ->query($query);

        if ($result->num_rows == 0) {
            echo $result->num_rows;
            echo "<h3>Sorry, there are no recipes posted at this time, please try back later. </h3>";
        } else {

            while ($row = $result->fetch_array(MYSQL_ASSOC)) {

                $title = $row['Title'];
                $poster = $row['Poster'];
                $shortdesc = $row['shortdescrip'];
                $RecipeID = $row['RecipeID'];


                echo "<div class='panel panel-default'>
                        <div class='panel-heading'>
                                <a href=\"IndexFood.php?content=showrecipe&id=$RecipeID&\"><h4>$title</h4></a>
                        </div>
                           <div class='panel-body'>
                              <h6>Submited by $poster</h6>
                              </br><i>$shortdesc</i>
                           </div>
                      </div>";
            }
        }

        ?>
</div>
</fieldset>

