<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- jquery - a library of function  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <!-- bootrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    include('config/config.php');
    if (isset($_POST['save'])) {

        $username = $_SESSION['username'];
        $getUserIDQuery = "SELECT userID FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $getUserIDQuery);


        try {
            if ($result && ($row = mysqli_fetch_assoc($result))) {
                $userID = $row['userID'];

                // Capture the current date and time
                $dateTime = date('Y-m-d H:i:s');


                $nitrogen = isset($_SESSION['nitrogen']) ? $_SESSION['nitrogen'] : null;
                $phosphorus = isset($_SESSION['phosphorus']) ? $_SESSION['phosphorus'] : null;
                $potassium = isset($_SESSION['potassium']) ? $_SESSION['potassium'] : null;
                $humidity = isset($_SESSION['humidity']) ? $_SESSION['humidity'] : null;
                $temperature = isset($_SESSION['temperature']) ? $_SESSION['temperature'] : null;
                $rainfall = isset($_SESSION['rainfall']) ? $_SESSION['rainfall'] : null;
                $ph = isset($_SESSION['ph']) ? $_SESSION['ph'] : null;
                $location = isset($_SESSION['location']) ? $_SESSION['location'] : null;
                $recommended_crop = isset($_SESSION['recommended_crop']) ? $_SESSION['recommended_crop'] : null;
                $confidence = isset($_SESSION['confidence']) ? $_SESSION['confidence'] : null;
                $season = isset($_SESSION['season']) ? $_SESSION['season'] : null;
                $longitude = isset($_SESSION['longitude']) ? $_SESSION['longitude'] : null;
                $latitude = isset($_SESSION['latitude']) ? $_SESSION['latitude'] : null;
                $ml = isset($_SESSION['ml']) ? $_SESSION['ml'] : null;


                $insertQuery = "INSERT INTO inputs (userID, nitrogen, phosphorus, potassium, rainfall, temperature, humidity, pH, dateTime, predictedResult, certaintyLevel, season, longitude, latitude, ml)
                          VALUES ($userID, $nitrogen, $phosphorus, $potassium, $rainfall, $temperature, $humidity, $ph , '$dateTime', '$recommended_crop', $confidence, '$season', $longitude, $latitude, '$ml')";
                // Execute the SQL query
                $insertResult = mysqli_query($conn, $insertQuery);


                if ($insertResult) {
                    // Clear the recommendation data from the session
                    unset($_SESSION['recommendation_data']);

                    // Display SweetAlert using Swal.fire()
                    echo '<script>
                        function showSuccessAlert() {
                            Swal.fire({
                                icon: "success",
                                title: "Success!",
                                text: "Data saved successfully."
                            }).then(function() {
                                // Redirect to the homepage
                                window.location.href = "dashboard.php";
                            });
                        }
                        showSuccessAlert();
                      </script>';

                } else {
                    // Error in saving data
                    throw new Exception("Error: Unable to save data.");
                }



            }
        } catch (Exception $e) {
            // Handle the exception (e.g., log it or show an error message)
            echo "Caught exception: " . $e->getMessage();
        }



    }
    ?>
</body>

</html>