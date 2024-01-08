<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommend</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/8fb3f1df9b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets\css\recommendform.css">
    <style>
        .input-form {
            margin-top: 70px;
        }
        select{
            border: solid 0.1px white;
            border-radius: 5px;
            width: 20%;
            height: 30px;
            text-align: center;
            font-size: 16px;
            background: transparent;
            
        }
        .input-box input{
            width: 50%;
            border: 2px solid rgba(12, 1, 1, 0.589);
        }
        .input-box select{
            width: 60%;
        }
        .fetch-button button{
            height: 45px;
            color: #fff;
            background: rgba(42, 35, 183, 0.5);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .3);
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            margin: 20px auto; 
        }
        .fetch-button button:hover{
            background: #fff;
            color: #000;
        }
    </style>
</head>

<body style="background: url('draftbg.jpg') no-repeat fixed; background-size: cover;
    background-position: center;">
    <?php

    require('sidenav.php');
    ?>

    <div class="main-content">
        <div class="input-form" style="background: #c0ccc388; width: 80%; height: 75vh;">
            <form action="" method="post">
                <h2 style="text-transform: uppercase; padding: 10px;">Agrisense Recommendation Form</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-box">
                                <label for="nitrogen">Nitrogen Level:
                                </label>
                                <input type="number" name="nitrogen" id="nitrogen" required>
                            </div>
                            <div class="input-box">
                            <label for="phosphorus">Phosphorus Level:
                                </label>
                                <input type="number" name="phosphorus" id="phosphorus" required>
                            </div>
                            <div class="input-box">
                                <label for="potassium">Potassium:</label>
                                <input type="number" name="potassium" id="potassium" required>
                            </div>
                            <div class="input-box">
                            <label for="humidity">Humidity Level:
                                </label>
                                <input type="number" name="humidity" id="humidity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="input-box">
                            <label for="temperature">Temperature: </label>
                            <input type="number" name="temperature" id="temperature" required>
                        </div>
                        <div class="input-box">
                        <label for="rainfall">Rainfall Level:
                            </label>
                            <input type="number" name="rainfall" id="rainfall" required>
                        </div>
                        <div class="input-box">
                            <label for="pH">pH (Acidity Level):</label>
                            <input type="number" name="pH" id="pH" required>
                        </div>
                        <div class="input-box">
                        <label for="algorithm">Select Algorithm:</label>
                            <select name="algorithm" id="algorithm">
                                <?php
                                if ($_SESSION['accType'] == 'Basic') {
                                    echo '<option value="randomForest">Random Forest</option>';
                                } elseif ($_SESSION['accType'] == 'Premium') {
                                    echo '<option value="randomForest">Random Forest</option>';
                                    echo '<option value="svm">Support Vector Machine</option>';
                                    echo '<option value="knn">K-Nearest Neighbor</option>';
                                    echo '<option value="logReg">Logistic Regression</option>';
                                    echo '<option value="bagging">Bagging</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="fetch-button">
                        <button type="submit" name="fetch_data" style="width: 60%;">Fetch</button>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div>
                    <button type="button" onclick="submitForm()" class="recommendbutton" style="color: #fff; width: 100%;">
                        Recommend<i class="fa-solid fa-arrow-right"></i>
                    </button>
                    </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>


    <script>
        function submitForm()
        {
            // Retrieve form values
            var nitrogen = document.getElementById('nitrogen').value;
            var phosphorus = document.getElementById('phosphorus').value;
            var potassium = document.getElementById('potassium').value;
            var humidity = document.getElementById('humidity').value;
            var temperature = document.getElementById('temperature').value;
            var rainfall = document.getElementById('rainfall').value;
            var pH = document.getElementById('pH').value;

            var selectedAlgorithm = document.getElementById('algorithm').value;


            // Construct query string
            // Construct query string
            var queryString = "?nitrogen=" + encodeURIComponent(parseFloat(nitrogen)) +
                "&phosphorus=" + encodeURIComponent(parseFloat(phosphorus, 10)) +
                "&potassium=" + encodeURIComponent(parseFloat(potassium, 10)) +
                "&humidity=" + encodeURIComponent(parseFloat(humidity, 10)) +
                "&temperature=" + encodeURIComponent(parseFloat(temperature)) +
                "&rainfall=" + encodeURIComponent(parseFloat(rainfall)) +
                "&pH=" + encodeURIComponent(parseFloat(pH)) +
                "&algorithm=" + encodeURIComponent(selectedAlgorithm);;


            // Redirect to addressmap.php with the values as parameters
            window.location.href = "addressmap.php" + queryString;
        }
    </script>
</body>

</html>