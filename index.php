<?php
$dir = 'promotional_content/';
$images = glob($dir . '*.jpg');
$interval = 5000; // interval between each image transition in milliseconds

function getSlideInterval($index, $interval) {
    return ($index + 1) * $interval;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Slideshow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        .progress {
            height: 10px;
            margin-bottom: 0;
        }

        .progress-bar {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach($images as $key => $image): ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>" class="<?php echo $key === 0 ? 'active' : '' ?>"></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach($images as $key => $image): ?>
                <div class="carousel-item <?php echo $key === 0 ? 'active' : '' ?>" data-interval="<?php echo getSlideInterval($key, $interval) ?>">
                    <img src="<?php echo $image ?>" class="d-block w-100" alt="Slide <?php echo $key ?>">
                </div>
                <?php endforeach; ?>
            </div>
            <div class="progress">
                <div class="progress-bar" role="progressbar"></div>
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
    <script>
        $(document).ready(function() {
            var $progressBar = $('.progress-bar');
            var $carousel = $('#carouselExampleIndicators');
            var $slides = $carousel.find('.carousel-item');
            var duration = 500; // duration of the progress bar animation in milliseconds
            var progressBarMaxWidth = $progressBar.parent().width();

            $carousel.carousel({
                interval: <?php echo $interval ?>,
                pause: false
            });

            $carousel.on('slide.bs.carousel', function(e) {
                var $slide = $(e.relatedTarget);
                var slide            = $slide.index();

// Set the progress bar width to 0 before animating
$progressBar.width(0);

// Animate the progress bar
$progressBar.animate({
    width: progressBarMaxWidth
}, getSlideInterval(slide, <?php echo $interval ?>) - duration, 'linear');
});

// Start the progress bar animation on the first slide
$carousel.trigger('slide.bs.carousel', { relatedTarget: $slides[0] });
});
</script>
</body>
</html>