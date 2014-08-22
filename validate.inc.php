<?php

include('Connection.php');

function message_gohome(){
    echo "<a href=\"IndexFood.php\">Return home</a>";
}

$userid = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT Username, Password from Recipe.registration_table where Username='$userid' and Password=PASSWORD('$password')";

$result = $mysqli->query($query);


if ($result->num_rows == 0) {

    echo "<h3>Sorry, your username or password are incorrect</h3></br>";
    echo "<a href=\"Login.inc.php\">Try again</a><br>";
    message_gohome();

} else {
    $_SESSION['valid_recipe_user'] = $userid;

    echo "<h3>Your account has been validate</h3></br>";
    message_gohome();


}


