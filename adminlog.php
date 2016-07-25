<!DOCTYPE html>
<?php require('vendor/autoload.php'); ?>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>


<div class="container">
    <form method="post" action="/processlogin.php">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Login</h1>
                </div>

                <div class="row">

                    <div class="col-xs-12 col-md-10">
                        <div class="form-group">
                            <label for="InputUserName">User Name</label>
                            <input type="text" class="form-control" id="InputUserName" placeholder="User Name"
                                   name="UserName">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-10">
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input type="password" class="form-control" id="InputPassword" placeholder="Password"
                                   name="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button id="button" type="submit">Login</button>
                </div>

                <?php if (isset($_GET['errors']) && $_GET['errors'] != 0): ?>
                    <div class="alert alert-danger" role="alert">Login Failed</div>
                <?php endif; ?>

    </form>
</div>