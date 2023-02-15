<?php require "inc/functions.inc.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Chris Grasser - Image Gallery</title>
</head>

<body>
    <!-- upload form -->
    <div class="container mt-5 p-3">
        <h2>Image Gallery</h2>
        <h6>Add and delete images as you see fit.</h6>
        <?php
        $message = processImage();
        displayErrors($message);
        deleteImage();
        require "inc/form.inc.html";
        ?>
    </div>

    <!-- gallery section w/ links to delete -->
    <div class="container mt-3 mb-5">
        <div class="row m-2">
            <?php showImages('uploads'); ?>
        </div>
    </div>
</body>

</html>