<?php
    require("config.php");

    $active = "index";

    $conn = mysqli_connect($databaseHost, $databaseUser, $databasePassword);
    mysqli_select_db($conn, $databaseName);
    mysqli_set_charset($conn, "utf8");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DSM Helper</title>
    </head>
    <?php require('script.php'); ?>
    <body>
        <div class="row">
            <div id="left" class="col-md-4 alert alert-danger">
                <?php require('left.php') ?>
            </div>
            <div id="middle" class="col-md-4 alert alert-success">
                <?php require('middle.php') ?>
            </div>
            <div id="right" class="col-md-4 alert alert-info">
                <?php require('right.php') ?>
            </div>
        </div>
        <?php require('bottom_bar.php'); ?>
    </body>
</html>
