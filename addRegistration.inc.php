<?php
include("Connection.php");

$Name = $_POST['inputFullName'];
$User = $_POST['inputUserName'];
$Password = $_POST['inputPassword'];
$PasswordRep = $_POST['inputPassword2'];
$Email = $_POST['inputEmail'];
$passwordLength = strlen($Password);

if (empty($Name) or empty($User) or empty ($Password) or empty($Email) or empty($PasswordRep)) {

    echo "You need fill the following fields
    <ul style='color: red'>

        <li>Username</li>
        <li>Password</li>
        <li>Confirm password</li>
        <li>Full Name</li>
        <li>E-mail</li>
    </ul> ";
    include("Registration.inc.php");
}

// Check if user already exist
    $query = "Select Username, Email From Recipe.registration_table Where Username='$User' or Email='$Email'";
    $result = $mysqli->query($query);

    if (!empty($result)) {

        $row = $result->fetch_array(MYSQLI_ASSOC);


        if ($row['Username'] == $User or $row['Email'] == $Email) {

            echo "<h2>Sorry, that user name or Email is already taken.</h2><br>\n";
            echo "<a href=\"IndexFood.php?content=Registration\"> Try again</a><br>\n";
        }
    } //Check if password and confirm password match
    //===================================================== Check if password is > 6 char

    if ($Password != $PasswordRep or $passwordLength<6) {

            echo "<h3> &nbsp The password isn't the same or length isn't correct. Be sure you wrote correctly</h3>";
            echo "<a href=\"IndexFood.php?content=Registration\"> Try again</a><br>\n";
            //Add data to Database
        }

  else{

    $query = "INSERT into Recipe.registration_table (Name, Username, Email, Password)
                                       VALUES('$Name','$User','$Email',PASSWORD('$Password'))";
    $result = $mysqli->query($query);
    if (!$result) {
        echo $result;
        die('Invalid query: ' . mysql_error());
    } else {
        $_SESSION['valid_recipe_user'] = $User;
        echo "<h4>Thanks for your registration</h4>";
        echo "<p>This is your Username: $User</p>";
        echo "<a href=\"IndexFood.php\">Return to Home page</a>";

    }


  }
