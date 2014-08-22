<?php
include('Connection.php');


 function clean($string)
{
    $string = str_replace('-', ' ', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}

$query = "Select Title,Date,Newcomplete, newsID from Recipe.NEWS Order by Date desc limit 2";

$result = $mysqli->query($query);

if ($result->num_rows == 0) {
    echo $result->num_rows;
    echo "<h3>Sorry, there are no News </h3>";
} else {

    while ($row = $result->fetch_array(MYSQL_ASSOC)) {

        $newsID=$row['newsID'];
        $title = $row['Title'];
        $news = $row['Newcomplete'];
        $title = clean($title);
        $news = clean($news);

        echo " <div class=\"alert alert-dismissable alert-danger\">
        <a href=\"IndexFood.php?content=callNews&id=$newsID\"><strong style='font: Cabin'>$title</strong></a></br><span style='color: #000000'><i>$news</i></span>
        </div></br>";

    }
}

