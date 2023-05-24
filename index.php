<?php
$dir = 'promotional_content/*';
$images = glob($dir);
$interval = 8000; // interval between each image transition in milliseconds
?>
<!DOCTYPE html>
<html>
<head>
    <title>pro-act</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .carousel-inner img {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo $interval ?>" data-pause="false">
        <ol class="carousel-indicators">
            <?php foreach($images as $key => $image): ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>" class="<?php echo $key === 0 ? 'active' : '' ?>"></li>
            <?php endforeach; ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach($images as $key => $image): ?>
                <div class="carousel-item <?php echo $key === 0 ? 'active' : '' ?>">
                    <img src="<?php echo $image ?>" class="d-block w-100" alt="Slide <?php echo $key ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
