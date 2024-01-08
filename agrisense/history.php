<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/8fb3f1df9b.js" crossorigin="anonymous"></script>
    <title>Saved Recommendations</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            justify-content: center;
            align-items: center;
        }

        h2 {
            text-transform: uppercase;
        }
        label{
            font-size: 17px;
        }
        input{
            text-align: center;
            width: 34%;
            background: transparent;
            border: none;
            outline: none;
            border: 1px solid #000;
            border-radius: 15px;
            font-size: 16px;
            color: #000;
            padding: 3px;
        }
        #data{
            padding: 10px;
        }
        #card{
            transition: transform 0.3s ease-in-out;
        }
        #card:hover{
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <?php
        $cropsImages = array(
            "Rice" => "https://cdn.britannica.com/89/140889-050-EC3F00BF/Ripening-heads-rice-Oryza-sativa.jpg",
            "Maize" => "https://babbangona.com/wp-content/uploads/2023/05/image-15.png",
            "Jute" => "https://upload.wikimedia.org/wikipedia/commons/9/9e/Jute_Field_Bangladesh_%287749587518%29.jpg",
            "Cotton" => "https://www.iaea.org/sites/default/files/styles/original_image_size/public/cottonbangladesh1.jpg?itok=i8WWXQat",
            "Coconut" => "https://handicraftsafimex.com/wp-content/uploads/2020/07/coconut-palm.jpg",
            "Papaya" => "https://www.brighterblooms.com/cdn/shop/products/Papaya_3_BB.jpg?v=1631623520&width=1000",
            "Orange" => "https://nurserynisarga.in/wp-content/uploads/2021/08/Chinese-Orange-Plant-05.webp",
            "Apple" => "https://extension.umn.edu/sites/extension.umn.edu/files/Two%20apples%20close-up_screen.jpg",
            "Muskmelon" => "https://harvesttotable.com/wp-content/uploads/2009/03/Melon-muskmelon1.jpg",
            "Watermelon" => "https://minnetonkaorchards.com/wp-content/uploads/2022/12/Watermelon-Plant-SS-741919240.jpg",
            "Grapes" => "https://contentgrid.homedepot-static.com/hdus/en_US/DTCCOMNEW/Articles/how-to-grow-grapes-hero.jpg",
            "Mango" => "https://kadiyamnursery.com/cdn/shop/products/alphonso-mango-plant-ratnagiri-grafted-1-healthy-live-plant-kadiyam-nursery-1_1200x1200.jpg?v=1662731270",
            "Banana" => "https://www.lovethegarden.com/sites/default/files/content/articles/uk/banana-fruit.jpgbanana_image.jpg",
            "Pomegranate" => "https://i.pinimg.com/originals/e0/46/9c/e0469c4e3c2d7784cacc4073470984ae.jpg",
            "Lentil" => "https://s3g2u3k4.rocketcdn.me/wp-content/uploads/sites/4/2017/09/lentil.jpg",
            "Blackgram" => "https://agritech.tnau.ac.in/agriculture/CropProduction/Pulses/gram.jpeg",
            "Mungbean" => "https://cdn.britannica.com/55/243655-050-0DBBC737/green-bean-plant-Vigna-radiata.jpg",
            "Mothbeans" => "https://thepaharilife.com/cdn/shop/products/Soybeans_1200x1200.jpg?v=1597947077",
            "Pigeonpeas" => "https://gardenerspath.com/wp-content/uploads/2022/02/How-to-Grow-Pigeon-Peas-Feature.jpg",
            "Kidneybeans" => "https://images.ctfassets.net/3s5io6mnxfqz/1fDv8vz6gv8uuKOdyNZOBW/260731e176a3ff5728e65d2ca40ee745/AdobeStock_407434971.jpeg",
            "Chickpea" => "https://harvesttotable.com/wp-content/uploads/2009/04/Chickpeas-bigstock-Fresh-Green-Chickpeas-Field-337227136-scaled.jpg",
            "Coffee" => "https://plantophiles.com/wp-content/uploads/2020/02/coffee-beans-1567389746ptu.jpg"
        );
    ?>
    <?php require('sidenav.php'); ?>
    <div class="main-content">
        <h2>
            <?php echo $_SESSION['username']; ?>'s Saved Recommendations
        </h2>
        <div class="container-fluid mt--8">
            <div class="row">
                <div class="col">
                    <?php
                    $username = $_SESSION['username'];
                    $getUserIDQuery = "SELECT userID FROM users WHERE username = '$username'";
                    $result = mysqli_query($conn, $getUserIDQuery);

                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $userID = $row['userID'];

                        $getHistoryQuery = "SELECT inputID, predictedResult, certaintyLevel, dateTime, longitude, latitude, ml FROM inputs WHERE userID = '$userID' ORDER BY dateTime DESC";
                        $historyResult = mysqli_query($conn, $getHistoryQuery);

                        if (mysqli_num_rows($historyResult) > 0) {
                            $currentDate = null;

                            while ($historyRow = mysqli_fetch_assoc($historyResult)) {
                                $date = date('Y-m-d', strtotime($historyRow['dateTime']));
                                if ($date != $currentDate) {
                                    echo '<h2 style="font-size: 20px; margin-top: 13px; font-weight: 700;">Date: ' . $date . '</h2>';
                                    $currentDate = $date;
                                }
                        
                                echo '<a href="view.php?inputID=' . $historyRow['inputID'] . '" class="card-link">';
                                echo '<div class="card shadow mt-4" id="card" style="background-color: #DBF4DE; display: flex; border-radius: 20px;">';
                                echo '<div class="row">' ;
                                echo '<div class="col-md-4">';// Set your desired background color
                                echo '<img src="' . $cropsImages[$historyRow['predictedResult']] . '" alt="' . $historyRow['predictedResult'] . '" style="max-width: 50%; max-height: 85%; margin: 0px auto; border-radius: 45px; padding: 2px;border: 5px solid #221f1f2c; margin: 10px;">';
                                echo '</div>';
                                echo '<div class="col-md-6" id="data">';
                                echo '<div style="color: black;">';
                                echo '<div class="crop-name">';
                                echo '<label for="cropName"><strong>Recommended Crop :&nbsp;&nbsp;&nbsp;</strong></label>';
                                echo '<input type="text" id="cropName" value="' . $historyRow['predictedResult'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="certainty_level">';
                                echo '<label for="certaintyLevel"><strong>Certainty Level:&nbsp;&nbsp;&nbsp;</strong></label>';
                                echo '<input type="text" id="certaintyLevel" value="' . $historyRow['certaintyLevel'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="machine_learning">';
                                echo '<label for="machineLearning"><strong>Machine Learning:&nbsp;&nbsp;&nbsp;</strong></label>';
                                echo '<input type="text" id="machineLearning" value="' . $historyRow['ml'] . '" readonly>';
                                echo '</div>';
                                echo '<div class="location">';
                                echo '<label for="location"><strong>Location:&nbsp;&nbsp;&nbsp;</strong></label>';
                                echo '<input type="text" id="location" value="' . $historyRow['longitude'] . '" readonly>,';
                                echo '<span><input type="text" id="location" value="' . $historyRow['latitude'] . '" readonly></span>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-md-2">';
                                echo '<form method="post" action="delete_history.php">';
                                echo '<input type="hidden" name="inputID" value="' . $historyRow['inputID'] . '">';
                                echo '<button type="submit" name="delete" class="ml-auto btn btn-sm btn-danger" style="padding: 30px; margin-top: 26px; font-size: 40px; border-radius: 20px;"><i class="fa-solid fa-trash-can"></i></button>';
                                echo '</form>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</a>';
                            }
                        } else {
                            echo '<p>Your saved recommendations will appear hear</p>';
                        }
                    } else {
                        echo "Error: Unable to retrieve userID.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<strong></strong>