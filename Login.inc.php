<html>
<div id="header">
    <?php
    include('Header.inc.php');
    ?>

</div>
</br>

<div id="login" class="col-lg-2">
    <fieldset>
        <form class="form-horizontal" method="post" target="_self" action="IndexFood.php">
            <input type="text" name="username" class="form-control" placeholder="Username" maxlength="96"></br>
            <input type="password" name="password" class="form-control" placeholder="Password"></br>
            <input type="hidden" value="validate" name="content">
            <button type="submit" id="login" class="btn btn-group-justified">Sign in</button>


        </form>
    </fieldset>
</div>

</html>