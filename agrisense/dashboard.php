<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrisense Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/8fb3f1df9b.js" crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family#Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #ffffffd5;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            /* Allow cards to wrap to the next line if needed */
            margin: 20px 0;
        }

        .card {
            width: 40%;
            flex: 1;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.9);
        }

        .description-card {
            transition: transform 0.3s ease-in-out;
            margin-top: 20px;
            /* Adjust as needed */
        }
        .description-card:hover{
            transform: scale(1.02);
        }
        .description-card p{
            padding: 20px;
            font-weight: 450;
        }
        .mapcard{
            transition: transform 0.3s ease-in-out;
            margin: 0px auto;
            width: 90%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .mapcard:hover{
            transform: scale(1.02);
        }
        h2,
        h1 {
            text-transform: uppercase;
            padding: 10px;
        }
        .mapdescriptioncard{
            transition: transform 0.3s ease-in-out;
            background: #e9e2e2;
            padding: 20px;
            margin: 70px;
            width: 90%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }
        .mapdescriptioncard:hover{
            transform: scale(1.02);
        }
        canvas{
            transition: transform 0.3s ease-in-out;
        }
        canvas:hover{
            transform: scale(1.02);
        }
        .mapdescriptioncard p{
            font-size: 15px;
            padding: 20px;
            font-weight: 450;
        }
        #map-layer {
            margin: 0px auto;
            max-width: 90%px;
            min-height: 500px;
        }
    </style>


</head>

<body>
    <?php
    require('sidenav.php');
    require('config/config.php');

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to login page or handle as needed
        header("Location: login.php");
        exit();
    }


    $queryLocations = "SELECT latitude, longitude FROM inputs";
    $result = $conn->query($queryLocations);
    $locArr = [];

    while ($row = $result->fetch_assoc()) {
        // Append latitude and longitude values to the array
        $locArr[] = [
            'lat' => $row["latitude"],
            'lng' => $row["longitude"]
        ];
    }

    // Convert the array to a JSON string
    $locArrJson = json_encode($locArr);
    // echo $locArrJson;
    
    // echo "<script>alert('" . $locArrJson . "');</script>";
    
    // Echo the JSON string
    



    // Fetch data for the logged-in user - Pie Chart
    $username = $_SESSION['username'];
    $queryPie = "SELECT predictedResult, COUNT(predictedResult) as resultCount
                 FROM inputs
                 WHERE userID = (SELECT userID FROM users WHERE username = ?)
                 GROUP BY predictedResult
                 ORDER BY resultCount DESC
                 LIMIT 5";
    $stmtPie = $conn->prepare($queryPie);
    $stmtPie->bind_param("s", $username);
    $stmtPie->execute();
    $resultPie = $stmtPie->get_result();
    $dataPie = $resultPie->fetch_all(MYSQLI_ASSOC);

    // Prepare data for Pie Chart
    $labelsPie = [];
    $dataPointsPie = [];

    foreach ($dataPie as $rowPie) {
        $labelsPie[] = $rowPie['predictedResult'];
        $dataPointsPie[] = $rowPie['resultCount'];
    }

    // Fetch data for the logged-in user - Bar Chart
    $queryBar = "SELECT AVG(nitrogen) as avgNitrogen, AVG(phosphorus) as avgPhosphorus, AVG(potassium) as avgPotassium, AVG(rainfall) as avgRainfall, AVG(temperature) as avgTemperature, AVG(humidity) as avgHumidity, AVG(pH) as avgpH
                 FROM inputs
                 WHERE userID = (SELECT userID FROM users WHERE username = ?)";
    $stmtBar = $conn->prepare($queryBar);
    $stmtBar->bind_param("s", $username);
    $stmtBar->execute();
    $resultBar = $stmtBar->get_result();
    $averagesBar = $resultBar->fetch_assoc();

    // Prepare data for Bar Chart
    $labelsBar = ['Nitrogen', 'Phosphorus', 'Potassium', 'Rainfall', 'Temperature', 'Humidity', 'pH'];
    $dataPointsBar = [
        $averagesBar['avgNitrogen'],
        $averagesBar['avgPhosphorus'],
        $averagesBar['avgPotassium'],
        $averagesBar['avgRainfall'],
        $averagesBar['avgTemperature'],
        $averagesBar['avgHumidity'],
        $averagesBar['avgpH'],
    ];
    ?>
    <div class="main-content">
        <h1>
            <?php echo $_SESSION['username']; ?>'s Dashboard<i class='bx bxs-leaf'></i>
        </h1>
        <h2 style="text-align: center;">Location History Map<i class='bx bx-location-plus'></i></h2>
        <div class="mapcard"><div id="map-layer"></div></div>
        <div class="mapdescriptioncard">
            <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The location history map plays a pivotal role in AgriSense by visually displaying the precise 
            locations where farmers have conducted soil sampling activities. 
            This feature provides a detailed spatial overview of soil sample distribution, 
            allowing users to discern patterns and variations in soil health across 
            different areas of their agricultural landscape. By integrating this information with other layers, 
            such as weather data and crop performance indicators, 
            the map offers a comprehensive understanding of the intricate relationship between environmental 
            factors and soil conditions. This dynamic visualization empowers farmers to make informed decisions, 
            optimizing crop selection, nutrient management, 
            and irrigation practices based on the localized insights derived from historical soil sampling data.
            </p>
        </div>
        <h2 style="text-align: center; margin-top: 20px;">Activity Charts<i class="fa-solid fa-chart-line"></i></h2>
        <div class="container">
            <!-- Pie Chart Container -->
            <div class="card">
                <h2 style="text-align: center; margin-top: 20px;">Your Top 5 favourite recommendations</h2>
                <canvas id="pieChart"></canvas>
                <div class="description-card">
                    <h2>Pie Chart Description</h2>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The pie chart elegantly illustrates the
                         user's preferences and priorities within AgriSense, showcasing the top 5 most 
                         saved recommendations. Each segment of the pie represents a specific 
                         crop or agricultural practice that has garnered the highest favor from the 
                         user. The chart provides a visually compelling snapshot of the user's 
                         strategic choices, offering insights into the crops and recommendations that 
                         have proven most valuable or promising. This intuitive representation not only 
                         facilitates quick comprehension of the user's preferences but also aids in refining
                        and customizing future recommendations to align more closely with the user's agricultural objectives.</p>
                </div>
            </div>

            <!-- Bar Chart Container -->
            <div class="card">
                <h2 style="text-align: center; margin-top: 20px;">Average Soil Parameters</h2>
                <canvas id="barChart"></canvas>
                <div class="description-card">
                    <h2>Bar Chart Description</h2>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspThe bar chart, capturing the average values of crucial soil parameters 
                        including nitrogen, potassium, phosphorus, humidity, rainfall, pH, and temperature, 
                        offers a comprehensive overview of the prevailing soil conditions. 
                        Each parameter is represented by a distinct color-coded bar, 
                        allowing for easy comparison and identification of trends. 
                        This chart provides a visual narrative of the soil health profile, 
                        enabling users to identify areas of strength and potential areas for improvement in 
                        their agricultural practices. Whether it's assessing nutrient levels, 
                        monitoring environmental factors, or gauging overall soil fertility, 
                        this bar chart serves as a valuable tool for making informed decisions and 
                        implementing precision agriculture techniques 
                        based on the aggregated insights from diverse soil parameters.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($labelsPie); ?>,
                datasets: [{
                    data: <?php echo json_encode($dataPointsPie); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                }]
            },
            options: {
                responsive: true,
            }
        });

        var ctxBar = document.getElementById('barChart').getContext('2d');
        var myBarChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labelsBar); ?>,
                datasets: [{
                    label: 'Average Soil Parameters',
                    data: <?php echo json_encode($dataPointsBar); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(128, 128, 128, 0.7)',
                    ],
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                    y: {
                        beginAtZero: true,
                    },
                },
            }
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpnxeA77qzhKyYN8Jj1DXVAIOqZwuCcBM&callback=initMap"
        async defer></script>
    <script type="text/javascript">
        var map;
        var geocoder;
        var markers = [];

        function initMap()
        {
            var mapLayer = document.getElementById("map-layer");
            var centerCoordinates = new google.maps.LatLng(15, 120);
            var defaultOptions = { center: centerCoordinates, zoom: 4 };

            map = new google.maps.Map(mapLayer, defaultOptions);
            geocoder = new google.maps.Geocoder();

            // Your array of locations (latitude and longitude pairs)
            // var locations = [
            //     { lat: 37.7749, lng: -122.4194 },
            //     { lat: 15.7749, lng: 120.4194 },
            //     // Add 9 more pairs here...
            // ];



            // alert(locations);

            var locations = <?php echo $locArrJson; ?>;
            // alert(JSON.stringify(locations));



            locations.forEach(function (location)
            {
                var latlng = new google.maps.LatLng(location.lat, location.lng);
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map
                });

                markers.push(marker);

                google.maps.event.addListener(marker, 'click', function ()
                {
                    geocodeLatLng(latlng, function (address)
                    {
                        var infoWindow = new google.maps.InfoWindow({
                            content: address
                        });
                        infoWindow.open(map, marker);
                    });
                });
            });
        }

        function geocodeLatLng(latlng, callback)
        {
            geocoder.geocode({ 'location': latlng }, function (results, status)
            {
                if (status === google.maps.GeocoderStatus.OK)
                {
                    if (results[0])
                    {
                        var address = results[0].formatted_address;
                        callback(address);
                    }
                }
            });
        }

        window.initMap = initMap;
    </script>
</body>

</html>