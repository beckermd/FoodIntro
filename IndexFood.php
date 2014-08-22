<?php
  session_start();
?>

<!DOCTYPE html>

    <?php
    require("Header.inc.php");
    ?>
</br>


<!-- Center page
     ================================================= -->
<div class="col-lg-6">
    <?php
    if (!isset($_REQUEST['content'])) {

        include("main.inc.php");
    } else {
        $page = $_REQUEST['content'];
        $nextpage = $page . ".inc.php";
        include("$nextpage");
    }

    ?>
</div>
<!-- How to make
    =====================================================  -->
</br>
</br>
<div class="col-lg-4">
    <div class="well bs-component">
        <fieldset>
            <legend>How to make</legend>
            <form action="IndexFood.php" method="get">
            <input type="text" class="form-control" name="search">
            </br>
            <input name="content" type="hidden" value="search">
            <button type="submit" class="btn btn-primary">Search</button>
            <div>
            </form>
                <br/>
                <ul>
                    <a href="http://pinterest.com"><img
                            src="css/glyphicons_social/png/glyphicons_social_00_pinterest.png"></a>
                    <a href="http://google.com/+"><img
                            src="css/glyphicons_social/png/glyphicons_social_02_google_plus.png"></a>
                    <a href="http://facebook.com"><img
                            src="css/glyphicons_social/png/glyphicons_social_30_facebook.png"></a>
                </ul>
            </div>
        </fieldset>
    </div>
    <fieldset>
        <div>
            <a href="http://www.cookingchanneltv.com/home.html">Cooking Channel</a> <br/>
            <a href="http://www.foodnetwork.com">Food Network</a>
        </div>
    </fieldset>
    <div>
        <fieldset>
            <span style="font-family:Arial bold; font-size: 40px; color: #000000">News</span>

            <?php

            include('news.inc.php');

            ?>

        </fieldset>
    </div>
</div>

<!-- Foot Page
      ============================================== -->

<footer style="text-align:center">
    <div >
        <div class="col-lg-12">
        <?php
        include('FootPage.php');
        ?>
    </div>
    </div>
</footer>

</body>
</html>


