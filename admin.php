<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


</head>
<body>

<div class="container">
    <div class="col-md-6">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1 class="panel-title">Add News</h1>
            </div>
    <div class="row">
            <form class="form" method="post" action="/addnews.php">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" placeholder="Title" name="title">
                     </div>

                    <div class="form-group">
                        <label for="date">Publish date</label>
                        <input type="date" placeholder="dd/mm/yyyy" name="pubdate">
                    </div>




    </div>
                    <div class="form-group">
                        <label for="textarea">Content</label>
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                <button type="submit">Add News</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>