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
    <script>
            // Function to get query parameter by name from URL
            function getQueryParam(name) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(name);
            }

            // Retrieve and display soil parameters data
            const receivedNitrogen = getQueryParam('nitrogen');
            const receivedPhosphorus = getQueryParam('phosphorus');
            const receivedPotassium = getQueryParam('potassium');
            const receivedHumidity = getQueryParam('humidity');
            const receivedTemperature = getQueryParam('temperature');
            const receivedRainfall = getQueryParam('rainfall');
            const receivedPH = getQueryParam('pH');
            const receivedLatitude = getQueryParam('latitude');
            const receivedLongitude = getQueryParam('longitude');

            alert("Received Nitrogen: " + receivedNitrogen +
                "\nReceived Phosphorus: " + receivedPhosphorus +
                "\nReceived Potassium: " + receivedPotassium +
                "\nReceived Humidity: " + receivedHumidity +
                "\nReceived Temperature: " + receivedTemperature +
                "\nReceived Rainfall: " + receivedRainfall +
                "\nReceived pH: " + receivedPH +
                "\nReceived Latitude: " + receivedLatitude +
                "\nReceived Longitude: " + receivedLongitude);
        </script>
    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="images/samplecrop1.jpg" alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">Recommmended Crop #1</h2>
                        <p class="description">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit. Sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. 
                        </p>
                        <button class="button" onclick="saveRecommendation()">Save Recommendation</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="images/samplecrop2.jpg" alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">Recommmended Crop #2</h2>
                        <p class="description">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit. Sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. 
                        </p>
                        <button class="button" onclick="saveRecommendation()">Save Recommendation</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="images/samplecrop3.jpg" alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">Recommmended Crop #3</h2>
                        <p class="description">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit. Sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. 
                        </p>
                        <button class="button" onclick="saveRecommendation()">Save Recommendation</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="images/samplecrop4.jpg" alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">Recommmended Crop #4</h2>
                        <p class="description">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit. Sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. 
                        </p>
                        <button class="button" onclick="saveRecommendation()">Save Recommendation</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="images/samplecrop5.jpg" alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">Recommmended Crop #5</h2>
                        <p class="description">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit. Sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. 
                        </p>
                        <button class="button" onclick="saveRecommendation()">Save Recommendation</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="images/samplecrop6.jpg" alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">Recommmended Crop #6</h2>
                        <p class="description">
                        Lorem ipsum dolor sit amet, consectetur 
                        adipiscing elit. Sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua. 
                        </p>
                        <button class="button" onclick="saveRecommendation()">Save Recommendation</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="images/samplecrop7.png" alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">Gomu Gomu no mi</h2>
                        <p class="description">
                        The DF eaten by Mugiwara no Luffy. But he does not know that it is an ancient zoan called, Hito hito no mi, Model "Nika" 
                        </p>
                        <button class="button" onclick="saveRecommendation()">Save Recommendation</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-button-next swiper-navBtn"></div>
    </div>
    </div>
<!-- Update the script section at the end of your HTML -->
<script>
    function saveRecommendation() {
        // Display SweetAlert confirmation dialog
        Swal.fire({
            title: 'Save Recommendation',
            text: 'Do you want to save the recommendation?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked "Yes"
                // Retrieve and sanitize form values
                var data = {
                    nitrogen: parseFloat(getQueryParam('nitrogen')),
                    phosphorus: parseFloat(getQueryParam('phosphorus')),
                    potassium: parseFloat(getQueryParam('potassium')),
                    humidity: parseFloat(getQueryParam('humidity')),
                    temperature: parseFloat(getQueryParam('temperature')),
                    rainfall: parseFloat(getQueryParam('rainfall')),
                    pH: parseFloat(getQueryParam('pH')),
                    latitude: parseFloat(getQueryParam('latitude')),
                    longitude: parseFloat(getQueryParam('longitude'))
                };

                // Make an AJAX request to save_recommendation.php
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'save_recommendation.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response if needed
                        alert(xhr.responseText);
                    }
                };
                xhr.send('nitrogen=' + data.nitrogen +
                    '&phosphorus=' + data.phosphorus +
                    '&potassium=' + data.potassium +
                    '&humidity=' + data.humidity +
                    '&temperature=' + data.temperature +
                    '&rainfall=' + data.rainfall +
                    '&pH=' + data.pH +
                    '&latitude=' + data.latitude +
                    '&longitude=' + data.longitude);

                    window.location.href = "history.php";
            }
        });
    }
</script>


</body>
</html>