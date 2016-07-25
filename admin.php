<!DOCTYPE html>
<?php
session_start();
require('vendor/autoload.php'); ?>
<html>
<head>
    <title>Laravel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


</head>
<body>


<?php if ($_SESSION['Status'] != 'enabled'):

    header('Location: /adminlog.php');


endif; ?>




<div class="container">
    <div class="col-md-6">
        <a href="/logout.php">Logout</a>
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1 class="panel-title">Add News</h1>
            </div>
            <div class="row">
                <div class="panel-body" id="panelbody">
                    <form class="form" method="post" action="/addnews.php">
                        <div class="form-group">
                            <label for="title">Article Title </label>
                            <input type="text" placeholder="Title" name="title" >
                        </div>

                        <div class="form-group">
                            <label for="date">Publish Date</label>
                            <input type="date" placeholder="dd-mm-yyyy" name="pubdate" >
                        </div>


                </div>
            </div>
            <div class="form-group">
                <label for="textarea">Content</label>
                <textarea class="form-control" rows="3" name="content" ></textarea>
            </div>
            <button type="submit">Add News</button>
            </form>

            <?php if (!empty ($_SESSION['errors'])): ?>
                <br/>
                <br/>
                <div class="alert alert-danger">
                <?php foreach ($_SESSION['errors'] as $errorList): ?>
                    <p role="alert"><?php echo $errorList?></p>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>


        </div>
    </div>
</div>


</body>


</html>
