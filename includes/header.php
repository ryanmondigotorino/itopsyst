<?php require('config/config.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Opsyst</title>
    <link rel="stylesheet" href="<?=$config['base_url']?>assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$config['base_url']?>assets/css/pageloader.css">
    <link rel="stylesheet" href="<?=$config['base_url']?>assets/css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?=$config['base_url']?>images/sys-logo.png" type="image/png">
</head>
<body>
    <?php require('nav-bar.php')?>
    <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
            <div class="content-container mt-5">
        
