<?php
require('vendor/autoload.php');
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/Stylesheet.css">

    <?php

    $navInfo = $_GET['nav'];
    //var_dump($navInfo);

    $offCount = $navInfo * 5;
    //var_dump($offCount);

    $next = $navInfo + 1;
    $prev = $navInfo - 1;

    $db = new PDO('mysql:host=' . getenv("HOST") . ';dbname=' . getenv("DATABASE") . ';charset=utf8mb4', getenv("USERNAME"), getenv("PASSWORD"));
    //select statement for side bar
    $articleSelect = $db->query('SELECT * FROM mainArticle');
    $sideBarArray = $articleSelect->fetchAll(PDO::FETCH_ASSOC);
    //select statement for page info 1st5
    $pageInfoSelect5 = $db->query('SELECT * FROM mainArticle LIMIT 5 offset ' . $offCount);
    $infoArray = $pageInfoSelect5->fetchAll(PDO::FETCH_ASSOC);
    $RowC = $pageInfoSelect5->rowCount();
    //var_dump($RowC);
    ?>

</head>

<body>
<div id="topCon">
    <div class="container">
        <div class="row">
            <h6 id="icons">
                <a href="http://www.gmail.com"><span class="glyphicon glyphicon-send"></span></a>
                <a href="http://www.twitter.com"><span class="glyphicon glyphicon-plane"></span></a>
                <a href="http://www.facebook.com"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                <a href="http://www.apple.com/uk/"><span class="glyphicon glyphicon-apple"></span></a>
            </h6>
        </div>
        <header id="header">
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
            <h5 id="sponsor" class="text-center">Sponsor</h5>
        </header>

        <div class="col-lg-7">

        <?php if ($RowC == 0): ?>
            <div id="alert" class="alert alert-danger" role="alert">No more articles to display</div>
            <nav>
                <ul class="pager">
                    <li><a href="/?nav=<?php echo $prev; ?>">Prev</a></li>
                </ul>
            </nav>
        <?php endif; ?>

        <?php if ($RowC !==0): ?>
            <div class="row">
                <?php foreach ($infoArray as $info): ?>
                    <article id="article">
                        <h3><?php echo $info['title'] ?></h3>

                        <img id="image" src="/cmv" alt="pic" class="centerl center-block img-responsive">
                        <?php echo $info['content']; ?>

                    </article>
                <?php endforeach; ?>
            </div>
            <?php if ($offCount < 1): ?>
                <nav>
                    <ul class="pager">
                        <li><a href="/?nav=<?php echo $next; ?>">Next</a></li>
                    </ul>
                </nav>
            <?php endif; ?>
            <?php if ($offCount !== 0): ?>
                <nav>
                    <ul class="pager">
                        <li><a href="/?nav=<?php echo $prev; ?>">Prev</a></li>
                        <li><a href="/?nav=<?php echo $next; ?>">Next</a></li>
                    </ul>
                </nav>
            <?php endif; ?>
        <?php endif;?>

        </div>

        <div class="col-lg-3 col-lg-offset-1">
            <div class="text-center" id="Emailbox">
                <h5 id="SUTD">Stay Up To Date</h5>
                <p id="Junkletter">Join the weekly news letter and we'll send you junk mail</p>
                <div>
                    <form method="post" action="#" class="form-inline">
                        <div class="row">
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Email"/>
                            <button class="btn btn-default btn-sm">Subscribe</button>
                        </div>

                    </form>
                </div>
                <p id="Dtime" class="text-center">Delivered every 30 seconds</p>
            </div>

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
</div>
</body>
</html>




