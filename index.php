<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


    <?php
    $db = new PDO('mysql:host=localhost;dbname=laravelpage;charset=utf8mb4', 'root', 'Taxi1208');
    //select statement for side bar
    $articleSelect = $db->query('SELECT * FROM mainArticle');
    $sideBarArray = $articleSelect->fetchAll(PDO::FETCH_ASSOC);
    //select statement for page info 1st5
    $pageInfoSelect5 = $db->query('SELECT * FROM mainArticle LIMIT 5');
    $infoArray = $pageInfoSelect5->fetchAll(PDO::FETCH_ASSOC);
    //select statement for page info 2nd5
    $pageInfoSelectOther = $db->query('SELECT * FROM mainArticle LIMIT 5 offset 5');
    $infoArraySecond = $pageInfoSelectOther->fetchAll(PDO::FETCH_ASSOC);


    $navInfo =  $_GET['nav'];
    //var_dump( $navInfo );

    ?>


    <style>
        #site-navigation a {
            text-align: center;
            color: gray;
        }

        #site-navigation {
            border-bottom: 1px solid lightgray;
            border-top: 1px solid lightgray;

        }

        .jumbotron p {
            font-size: x-small;
            text-align: center;
        }

        .container .jumbotron, .container-fluid .jumbotron {
            padding-left: 10px;

        }

        #side-nav ul li a {
            border-bottom: 1px solid lightgray;
            display: block;
            color: black;
        }

        #sponsor {
            border-bottom: 1px solid lightgray;
            padding-bottom: 20px;
        }

        #icons {
            float: right;
        }

        #icons a {
            color: gray;
        }

        #recently {
            color: gray;
        }

        .navbar {
            text-align: center;
        }

        .navbar .navbar-nav {
            display: inline-block;
            float: none;
        }

    </style>


</head>

<body>

<div class="container">
    <div class="row">
        <h6 id="icons">
            <a href="http://www.gmail.com"><span class="glyphicon glyphicon-send"></span></a>
            <a href="http://www.twitter.com"><span class="glyphicon glyphicon-plane"></span></a>
            <a href="http://www.facebook.com"><span class="glyphicon glyphicon-thumbs-up"></span></a>
            <a href="http://www.apple.com/uk/"><span class="glyphicon glyphicon-apple"></span></a>
        </h6>
    </div>
    <header>
        <h1 class="text-center">Laravel News</h1>
        <nav class="navbar" id="site-navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" title="podcast">PODCAST</a>
                </li>
                <li>
                    <a href="#" title="newsletter">NEWSLETTER</a>
                </li>
                <li>
                    <a href="#" title="archive">ARCHIVE</a>
                </li>
                <li>
                    <a href="#" title="membership">MEMBERSHIP</a>
                </li>
                <li>
                    <a href="#" title="sponsor">SPONSOR</a>
                </li>
        </nav>
        <h5 id="sponsor" class="text-center">Sponsor <?php echo $infoArray['title']; ?></h5>
    </header>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-8">
            <h3 class="text-center"><?php echo $infoArray['title']; ?></h3>

            <img src="/cmv" alt="pic" class="centerl center-block img-responsive">
        </div>

        <div class="col-lg-3 col-lg-offset-1">
            <div class="jumbotron">
                <h5 class="text-center">Stay Up To Date</h5>
                <p class="text-center">Join the weekly news letter and we'll send you junk mail</p>
                <div class="row">
                    <form method="post" action="#">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"/>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-default btn-sm">Subscribe</button>
                        </div>
                    </form>
                </div>
                <p class="text-center">Delivered every 30 seconds</p>
            </div>
        </div>

        <div class="col-lg-3 col-lg-offset-1">
            <h5 id="recently" class="text-center"> -- Recently -- </h5>
            <nav id="side-nav">
                <ul class="nav text-center">
                    <?php foreach ($sideBarArray as $newsArt): ?>
                        <li>
                            <a href="#" title="code"><?php echo $newsArt['title']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>

    </div>
    <div class="col-lg-7">
        <article>

            <?php  if( $navInfo == ""){ ?>
            <?php foreach ($infoArray as $info):?>

                <h3><?php echo $info['title']?></h3>
                   <?php echo $info['content'];?>
                <br>
            <?php endforeach;
            }?>

            <?php  if( $navInfo == "1"){ ?>
                <?php foreach ($infoArraySecond as $info5):?>

                    <h3><?php echo $info5['title']?></h3>
                    <?php echo $info5['content'];?>
                    <br>
                <?php endforeach;
            }?>

        </article>
    </div>
</div>
</body>

<nav>
    <ul class="pager">
        <li><a href="/">Previous</a></li>
        <li><a href="/?nav=1">Next</a></li>
    </ul>
</nav>



