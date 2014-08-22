<?php
include('Connection.php');

$recipeID = $_POST['recipeID'];
$title = $_POST['title'];
$poster = $_POST['poster'];
$shordescrip = $_POST['shortdescrip'];
$ingredients = $_POST['ingredients'];
$directions = $_POST['directions'];
//======================================= Upload an image

$name = $_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$size=$_FILES['image']['size'];
$type=$_FILES['image']['type'];


//$image_size = getimagesize($_FILES['image']['name']);


//if ($image_size == FALSE) {
//    ECHO "There is no an image";


if(!get_magic_quotes_gpc()){
    $name = addslashes($name);
}

// open up the file and extract the data/content from it
$extract = fopen($tmp_name, 'r');
$content = fread($extract, $size);
$content = addslashes($content);
fclose($extract);


    if (empty($title) OR empty($poster) or empty($ingredients) or empty($directions)) {

        echo "<a href=\"IndexFood.php?content=newRecipe&id=$RecipeID\"></a><h4 style='color: red'>You have to complete all fields </h4>";
        echo "<ul style='color: red'><li>Title</li>
                <li>Poster</li>
                <li>Ingredients</li>
                <li>Direction</li>
              </ul>";
        include('newRecipe.inc.php');

    } else {

        $mysqli->select_db('Recipe');

        $query = "INSERT INTO Recipe. (Title,Poster,shortdescrip,Ingredients,Directions,Image) VALUES ('$title','$poster','$shordescrip','$ingredients', '$directions', '$content')";
        $result = $mysqli->query($query);

        if ($result) {

            echo "<div style='text-align: center'> <h2 >Your recipe was added</h2></br>
                                         </div>
                  <div style='text-align: center'>
            <img src=\"Img/thanks.jpg\" high=\"300px\" width='300px'>

        </div> ";

        } else {
            echo $mysqli->error . "</br>";

        }

}