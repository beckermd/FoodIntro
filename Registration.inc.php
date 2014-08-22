
<!DOCTYPE html>

<html lang="en">



<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>"Food Network"</title>

    <link rel="stylesheet/less" type="text/css" href="less/bootstrap.less"/>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>


<div class="col-lg-12">

    <div class="well bs-component">
        <form action="IndexFood.php" class="form-horizontal" method="post">
            <fieldset>
                <legend>Join us!</legend>
                <h4>Please enter the following information</h4>
                Username: <input type="text" class="form-control" name="inputUserName" placeholder="UserName">
                Password: <input type="password" class="form-control" name="inputPassword" placeholder="*****">
                Confirm Password: <input type="password" class="form-control" name="inputPassword2" placeholder="*****">
                Full Name: <input type="text" class="form-control" name="inputFullName" placeholder="Name">
                E-mail: <input type="text" class="form-control" name="inputEmail" placeholder="abc@df.com">
                    <input type="hidden" value="addRegistration" name="content">
                <div class="col-lg-10 col-lg-offset-9">
                    </br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

</html>


