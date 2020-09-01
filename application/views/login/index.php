<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <?php !empty($meta) ? $this->load->view($meta['meta']) : '';?>
</head>

<body>
    <div id="main-preloader" class="main-preloader semi-dark-background">
        <div class="main-preloader-inner center">

            <h1 class="preloader-percentage center">
                <span class="preloader-percentage-text">0</span>
                <span class="percentage">%</span>
            </h1>
            <div class="preloader-bar-outer">
                <div class="preloader-bar"></div>
            </div>

        </div>
    </div>
    <?php !empty($content) ? $this->load->view($content) : '';?>
</body>

<?php !empty($footer) ? $this->load->view($footer) : '';?>

</html>