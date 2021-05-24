<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FLOTTA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?php echo URL; ?>img/favicon-32x32.png"/>

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet"/>
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet"/>
</head>
<body>

    <div class="d-flex p-3 mx-auto flex-column"">
        <div class="cover-container d-flex p-3 mx-auto flex-column col-xl-12" style="max-height: 100px;>
            <header class="masthead">
                <div class="inner">
                    <h3 class="masthead-brand">Flotta</h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/user'){ ?>active<?php } ?>" href="<?php echo URL; ?>user">Munkatársak</a>
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/car'){ ?>active<?php } ?>" href="<?php echo URL; ?>">Autó</a>
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/user/settings'){ ?>active<?php } ?>" href="<?php echo URL; ?>user/settings">Adataim módosítása</a>
                        <a class="nav-link" href="<?php echo URL; ?>user/logout">Kijelentkezés</a>
                    </nav>
                </div>
            </header>
        </div>
