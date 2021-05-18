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

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column col-xl-12">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Flotta</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/user/login'){ ?>active<?php } ?>" href="<?php echo URL; ?>">Bejelentkezés</a>
                    <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/user/register'){ ?>active<?php } ?>" href="<?php echo URL; ?>user/register">Regisztrálás</a>
                </nav>
            </div>
        </header>
