<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FLOTTA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
</head>
<body>
    <!-- logo -->
    <div class="logo">
        FLOTTA
    </div>

    <!-- navigation -->
    <div class="navigation">
        <a href="<?php echo URL; ?>">bejelentkezés</a>
        <a href="<?php echo URL; ?>user/register">regisztrálás</a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == '/user/login'){ ?>active<?php } ?>" href="<?php echo URL; ?>">Bejelentkezés</a>
                <a class="nav-item nav-link <?php if($_SERVER['REQUEST_URI'] == '/user/register'){ ?>active<?php } ?>" href="<?php echo URL; ?>user/register">Regisztrálás</a>
            </div>
        </div>
    </nav>
