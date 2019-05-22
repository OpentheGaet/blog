<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="web/css/blog.css">
    <link rel="stylesheet" href="web/bootstrap/bootstrap.min.css">
    <title><?= isset($_GET['action']) ? $_GET['action'] : 'Home'; ?></title>
    <?php require 'views/user/includes/JS.inc.php';?>
</head>
<body>
<header class="container-fluid header-navbar">
    <div class="action-home">
        <a href="?action=Home" style="color:orange!important;text-decoration:none;">MStore</a>
    </div>
    <nav class="navbar-dark coins container-fluid navbar-inverse">
		<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
			&#9776;
		</button>
		<div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
        <ul class="nav navbar-nav">
    <?php foreach ($menu as $title) :?>
        <?php if (isset($_GET['action']) and $title == $_GET['action']) :?>
            <li class="nav-item active">
                <a class="nav-link" href="?action=<?= $title ?>"><?= $title ?></a>
            </li>
        <?php else :?>
            <li class="nav-item">
                <a class="nav-link" href="?action=<?= $title ?>"><?= $title ?></a>
            </li>
        <?php endif ?>
    <?php endforeach ?></ul>
		</div>
    </nav>
</header>
<div id="components-error" class="container">
    <div id="component-error" class="container">
    <h2 class="text-danger">An error occurred when sending commands to the program !</h2>
        <div class="col-md-3 error-box" id="error-pics">
            <img src="web/img/error/exception.png" alt="error">
        </div>
        <div class="col-md-6 error-box" id="error-text">
            <h3 class="text-danger">Error type</h3>
            <p>Lorem ipsum dolor sit amet</p>
        </div>
    </div>
    <link rel="stylesheet" href="views/user/components-error/css/component-error.css">
    <script src="views/user/components-error/js/component-error.js"></script>
</div>
<div id="content-warper">
