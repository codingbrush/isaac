<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href=<?php echo URLROOT . '/public/assets/css/bootstrap.min.css'; ?> >
    <title><?php echo $title?></title>
</head>
<body style="height:100vh;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">E-EXTENSION</a>
            <ul class="navbar-nav ml-auto mr-4 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo URLROOT;?>/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT;?>/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT;?>/contact">CONTACT</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
