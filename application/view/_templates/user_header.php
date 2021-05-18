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

    <div class="d-flex p-3 mx-auto flex-column" style="max-height: 100px;">
        <div class="cover-container d-flex p-3 mx-auto flex-column col-xl-12">
            <header class="masthead">
                <div class="inner">
                    <h3 class="masthead-brand">Flotta</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/car'){ ?>active<?php } ?>" href="<?php echo URL; ?>">Autó</a>
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/user/settings'){ ?>active<?php } ?>" href="<?php echo URL; ?>user/settigs">Adataim módosítása</a>
                        <a class="nav-link" href="<?php echo URL; ?>user/logout">Kijelentkezés</a>
                    </nav>
                </div>
            </header>
        </div>

