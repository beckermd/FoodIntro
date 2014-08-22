<?php
session_start();
include("Connection.php");

$RecipeID = $_GET['id'];

if (isset($_SESSION['valid_recipe_user'])) {

    $userid = $_SESSION['valid_recipe_user'];

    echo "<div class=\"col-lg-12\">";
    echo "<fieldset>
        <form action=\"IndexFood.php\" method=\"POST\" class=\"form-horizontal\" > ";
    echo "  <legend>Enter your comment</legend>
            <div class=\"form-group\"> ";


    echo " <label class=\"col-lg-4\">Comment:</label>
                <div class=\"col-lg-8\">
                    <input type=\"text\" name=\"texto\" class=\"form-control\">
                </div>
            </div>  ";

    echo " <div class=\"form-group\">
                <label class=\"col-lg-4\">Poster by</label>
                <div class=\"col-lg-8\">
                    <input type=\"text\" name=\"poster\" class=\"form-control\" value=\"$userid\">
                </div>
            </div>";

    echo "<input type=\"hidden\"  name=\"RecipeID\" value=\"$RecipeID\">";
   echo " <input name=\"content\" type=\"hidden\" value=\"addComment\">";

    echo "<div class=\"col-lg-2 control-label\">
                <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
            </div>
        </form>
</div>
</fieldset>";

} else {

    echo "<h2>Sorry, you do not have permission to post comments</h2><br>";
    echo "<a href=\"login.inc.php\">Login</a>";


}