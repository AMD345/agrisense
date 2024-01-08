<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Add this to the head section of your HTML -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendations</title>
    <link rel="stylesheet" href="assets\css\swiper-bundle.min.css">
    <link rel="stylesheet" href="assets\css\cropscss.css">
    <script src="assets\js\swiper-bundle.min.js"></script>
    <script src="assets\js\script.js"></script>
</head>
<body style="background: url('draftbg.jpg') no-repeat fixed; background-size: cover;
    background-position: center;">
    <?php
    require('sidenav.php');
    ?>
    <div class="main-content" style="margin-top: 40px;">
        <h1>Recommended crops based on the given soil parameters</h1>
        
    
    </div>
<!-- Update the script section at the end of your HTML -->



</body>
</html>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendations</title>
    <link rel="stylesheet" href="assets\css\swiper-bundle.min.css">
    <link rel="stylesheet" href="assets\css\cropscss.css">
    <script src="assets\js\swiper-bundle.min.js"></script>
    <script src="assets\js\script.js"></script>
</head>
<body style="background: url('draftbg.jpg') no-repeat fixed; background-size: cover; background-position: center;">

    <?php
    require('sidenav.php');

    // Retrieve variables from the URL
    $nitrogen = isset($_GET['nitrogen']) ? $_GET['nitrogen'] : '';
    $phosphorus = isset($_GET['phosphorus']) ? $_GET['phosphorus'] : '';
    $potassium = isset($_GET['potassium']) ? $_GET['potassium'] : '';
    $humidity = isset($_GET['humidity']) ? $_GET['humidity'] : '';
    $temperature = isset($_GET['temperature']) ? $_GET['temperature'] : '';
    $rainfall = isset($_GET['rainfall']) ? $_GET['rainfall'] : '';
    $pH = isset($_GET['pH']) ? $_GET['pH'] : '';
    $latitude = isset($_GET['latitude']) ? $_GET['latitude'] : '';
    $longitude = isset($_GET['longitude']) ? $_GET['longitude'] : '';
    ?>

    <div class="main-content" style="margin-top: 40px;">
        <h1>Recommended crops based on the given soil parameters</h1>
        <!-- You can now use the above PHP variables as needed in your HTML content -->
        <!-- For example, echo them to display on the page -->
        <p>Nitrogen: <?php echo $nitrogen; ?></p>
        <p>Phosphorus: <?php echo $phosphorus; ?></p>
        <!-- Add similar lines for other variables as needed -->
    </div>

</body>
</html>
