<?php
include("Connection.php");

$RecipeID = $_GET['id'];

if (isset($_SESSION['valid_recipe_user'])) {

    $userid = $_SESSION['valid_recipe_user'];

}
echo "

<div class=\"navbar navbar-default\" style=\"background: transparent;border-top-color: #808080\">

    <div class=\"navbar-collapse collapse\">
        <ul class=\"nav navbar-nav\">
            <li class=\"active\">
                <a class=\"navbar-brandhref\" href=\"IndexFood.php?content=main\" style=\"background: transparent\">Home</a>
            </li>
            <li class=\"active\">
                <a href='IndexFood.php?content=NewRecipe' style=\"background: transparent\">Post a new Recipe</a>

            </li>
        </ul>


        <ul class=\"nav navbar-nav navbar-right\">
            <li class=\"dropdown\">
                <a href='' class=\"dropdown-toggle\" data-toggle=\"dropdown\"
                   style=\"background: transparent\">Welcome
                    <b class=\"caret\"></b>
                </a>
                <ul class=\"dropdown-menu\">
                <li>
                        <a href='Login.inc.php?content=Login'>Login</a>
                    </li>
                    <li>
                        <a href='IndexFood.php?content=Registration'>Register for free</a>
                    </li>
                     <li>
                        <a href='IndexFood.php?content=logout'>Logout</a>
                     </li>
                    <li>
                        <a href=\"http://www.linkedin.com/pub/daniela-becker/9/9b3/549/\">About us</a>
                    </li>
                </ul>
            </li>
        <li class=\"active\">
            <a href=\"\" style=\"background: transparent\"> $userid</a>
        </li>
        </ul>
    </div>
</div>


</html>";
