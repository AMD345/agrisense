<head>
    <title>View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #fff;
            justify-content: center;
            align-items: center;
        }

        h1 {
            font-size: 27px;
        }
    </style>
</head>

<body>
    <?php require('sidenav.php'); ?>
    <?php
    if (isset($_GET['inputID'])) {
        $inputID = $_GET['inputID'];
        $sql = "SELECT * FROM inputs WHERE inputID = $inputID";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();


        $userID = $row['userID'];
        $nitrogen = $row['nitrogen'];
        $phosphorus = $row['phosphorus'];
        $potassium = $row['potassium'];
        $rainfall = $row['rainfall'];
        $temperature = $row['temperature'];
        $humidity = $row['humidity'];
        $pH = $row['pH'];
        $location = $row['location'];
        $dateTime = $row['dateTime'];
        $recommended_crop = $row['predictedResult'];
        $confidence = $row['certaintyLevel'];
        $season = $row['season'];
        $longitude = $row['longitude'];
        $latitude = $row['latitude'];
        $ml = $row['ml'];
    }


    //------------------------------------------------------------------------------------------------------------------------
    

    $cropStats = array(
        "Rice" => array(
            "germination_rate" => "7-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "High (flooded fields)",
            "growth_period" => "90-150 days",
            "yield" => "Varies",
            "companion_plants" => "Azolla & Water spinach",
            "wind_tolerance" => "Low",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Maize" => array(
            "germination_rate" => "7-10 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "60-100 days",
            "yield" => "Varies",
            "companion_plants" => "Beans & Cucumber",
            "wind_tolerance" => "Moderate",
            "max_height" => "6-10 feet",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Jute" => array(
            "germination_rate" => "10-20 days",
            "sunlight_required" => "Full sun",
            "water_required" => "High",
            "growth_period" => "90-120 days",
            "yield" => "Varies",
            "companion_plants" => "Okra & Sunflower",
            "wind_tolerance" => "Moderate",
            "max_height" => "8-12 feet",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy soil"
        ),
        "Cotton" => array(
            "germination_rate" => "7-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "120-180 days",
            "yield" => "Varies",
            "companion_plants" => "Bean & Marigold",
            "wind_tolerance" => "Moderate",
            "max_height" => "3-6 feet",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Coconut" => array(
            "germination_rate" => "2-3 months",
            "sunlight_required" => "Full sun",
            "water_required" => "High",
            "growth_period" => "5-10 years",
            "yield" => "100-200 coconuts/tree",
            "companion_plants" => "Banana & Pineapple",
            "wind_tolerance" => "High",
            "max_height" => "30-100 feet",
            "propagation" => "Seedlings",
            "soil_type" => "Well-drained sandy soil"
        ),
        "Papaya" => array(
            "germination_rate" => "10-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "High",
            "growth_period" => "180-330 days",
            "yield" => "Varies",
            "companion_plants" => "Basil & Nasturtium",
            "wind_tolerance" => "Low",
            "max_height" => "10-12 feet",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Orange" => array(
            "germination_rate" => "10-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "365-730 days",
            "yield" => "Varies",
            "companion_plants" => "Chives & Marigold",
            "wind_tolerance" => "Moderate",
            "max_height" => "10-20 feet",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Apple" => array(
            "germination_rate" => "14-30 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "365-1825 days",
            "yield" => "Varies",
            "companion_plants" => "Chamomile & Dill",
            "wind_tolerance" => "Moderate",
            "max_height" => "10-30 feet",
            "propagation" => "Grafted trees",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Muskmelon" => array(
            "germination_rate" => "4-10 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "75-100 days",
            "yield" => "Varies",
            "companion_plants" => "Corn & Nasturtium",
            "wind_tolerance" => "Low",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Watermelon" => array(
            "germination_rate" => "4-10 days",
            "sunlight_required" => "Full sun",
            "water_required" => "High",
            "growth_period" => "70-100 days",
            "yield" => "Varies",
            "companion_plants" => "Radish & Marigold",
            "wind_tolerance" => "Low",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Grapes" => array(
            "germination_rate" => "10-20 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "365-730 days",
            "yield" => "Varies",
            "companion_plants" => "Rosemary & Tansy",
            "wind_tolerance" => "Moderate",
            "max_height" => "Varies",
            "propagation" => "Cuttings",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Mango" => array(
            "germination_rate" => "10-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "180-365 days",
            "yield" => "Varies",
            "companion_plants" => "Basil & Marigold",
            "wind_tolerance" => "Moderate",
            "max_height" => "30-100 feet",
            "propagation" => "Grafted trees",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Banana" => array(
            "germination_rate" => "10-20 days",
            "sunlight_required" => "Full sun",
            "water_required" => "High",
            "growth_period" => "365-730 days",
            "yield" => "Varies",
            "companion_plants" => "Beans & Cabbage",
            "wind_tolerance" => "Low",
            "max_height" => "6-25 feet",
            "propagation" => "Rhizomes",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Pomegranate" => array(
            "germination_rate" => "14-30 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "365-730 days",
            "yield" => "Varies",
            "companion_plants" => "Basil & Marigold",
            "wind_tolerance" => "Moderate",
            "max_height" => "10-20 feet",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Lentil" => array(
            "germination_rate" => "7-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Low to moderate",
            "growth_period" => "90-120 days",
            "yield" => "Varies",
            "companion_plants" => "Carrot & Chickpea",
            "wind_tolerance" => "Low",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Blackgram" => array(
            "germination_rate" => "7-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "90-120 days",
            "yield" => "Varies",
            "companion_plants" => "Sesame & Mungbean",
            "wind_tolerance" => "Moderate",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Mungbean" => array(
            "germination_rate" => "4-7 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "60-90 days",
            "yield" => "Varies",
            "companion_plants" => "Maize & Cucumber",
            "wind_tolerance" => "Low",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Mothbeans" => array(
            "germination_rate" => "4-7 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "60-90 days",
            "yield" => "Varies",
            "companion_plants" => "Cucumber & Radish",
            "wind_tolerance" => "Low",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained sandy loam"
        ),
        "Pigeonpeas" => array(
            "germination_rate" => "7-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "180-365 days",
            "yield" => "Varies",
            "companion_plants" => "Maize & Sorghum",
            "wind_tolerance" => "Moderate",
            "max_height" => "6-10 feet",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Kidneybeans" => array(
            "germination_rate" => "7-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "90-150 days",
            "yield" => "Varies",
            "companion_plants" => "Corn & Potato",
            "wind_tolerance" => "Moderate",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Chickpea" => array(
            "germination_rate" => "7-14 days",
            "sunlight_required" => "Full sun",
            "water_required" => "Moderate",
            "growth_period" => "90-120 days",
            "yield" => "Varies",
            "companion_plants" => "Tomato & Cilantro",
            "wind_tolerance" => "Moderate",
            "max_height" => "Varies",
            "propagation" => "Seeds",
            "soil_type" => "Well-drained loamy soil"
        ),
        "Coffee" => array(
            "germination_rate" => "30-60 days",
            "sunlight_required" => "Partial shade",
            "water_required" => "Moderate",
            "growth_period" => "365-730 days",
            "yield" => "Varies",
            "companion_plants" => "Nasturtium & Lemon balm",
            "wind_tolerance" => "Low",
            "max_height" => "3-8 feet",
            "propagation" => "Seeds or cuttings",
            "soil_type" => "Well-drained loamy soil"
        ),
    );

    //----------------------------------------------------------------------------------------------------------------------
    
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

    //------------------------------------------------------------------------------------------------------------------------
    
    $cropsGeneralDescriptions = array(
        "Rice" => "Rice is a primary staple food for more than half of the world's population. It is a cereal grain that thrives in flooded fields, known as paddy fields. The cultivation of rice involves a carefully managed water supply, with fields often serving as habitats for diverse aquatic life. With a history dating back thousands of years, rice plays a vital role in global agriculture and food security.",
        "Maize" => "Maize, commonly known as corn, is a versatile cereal crop cultivated for human consumption, animal feed, and industrial uses. It is a warm-season crop that thrives in full sunlight and well-drained soil. Maize is a major component of many diets worldwide and serves as a crucial source of carbohydrates. Its cultivation involves various varieties adapted to different climates and purposes.",
        "Jute" => "Jute is a fibrous crop valued for its strong and coarse threads, commonly used in the production of sacks and textiles. Native to the Indian subcontinent, jute cultivation requires well-drained fertile soil and high humidity. The plant has a relatively short growth period, and its sustainability makes it an important crop in the textile industry.",
        "Cotton" => "Cotton is a significant cash crop grown for its soft, fluffy fibers, which are used to make textiles and clothing. Cotton cultivation is widespread in warm climates with well-drained soils. The growth of cotton plants involves careful management of pests and diseases. Cotton is a crucial economic crop that plays a vital role in the textile and fashion industries.",
        "Coconut" => "Coconut trees are tropical plants known for their versatile uses. The coconut fruit provides nutrition in the form of water, milk, and oil. The fibrous husk and shell have applications in various industries. Coconut cultivation requires well-drained sandy soil and a tropical climate. These trees are resilient to wind and are often found in coastal regions.",
        "Papaya" => "Papaya is a tropical fruit tree with a rapid growth rate and a relatively short life cycle. The fruit is rich in vitamins and enzymes, making it a popular choice for both consumption and medicinal purposes. Papaya cultivation involves well-drained soil and regular watering. The trees are susceptible to strong winds, requiring protection in windy areas.",
        "Orange" => "Orange trees are citrus fruit-bearing plants known for their sweet and tangy fruits. They thrive in subtropical and tropical climates with well-drained soil. Oranges are rich in vitamin C and have nutritional value. Orange cultivation involves managing pests and diseases, and the trees are sensitive to frost. The fruit plays a significant role in the global fruit industry.",
        "Apple" => "Apple trees are deciduous fruit-bearing trees cultivated for their crisp and flavorful fruits. Apples are a popular fruit consumed fresh or used in various culinary applications. Apple orchards require well-drained loamy soil and a cold winter period for proper fruit development. The trees are often propagated through grafting to maintain desirable traits.",
        "Muskmelon" => "Muskmelon, a type of melon, is cultivated for its sweet and juicy flesh. It belongs to the gourd family and is rich in vitamins and antioxidants. Muskmelons require full sunlight and well-drained sandy loam soil. The vines have a spreading growth habit, and cultivation involves proper spacing and pollination for optimal fruit development.",
        "Watermelon" => "Watermelon is a refreshing and hydrating fruit cultivated for its sweet and juicy flesh. It belongs to the gourd family and thrives in warm climates with well-drained sandy loam soil. Watermelon plants require ample sunlight and high water availability during the growing season. Cultivation involves proper spacing to allow for vine expansion and fruit development.",
        "Grapes" => "Grapes are perennial vine plants cultivated for their sweet and versatile berries. They are a key ingredient in winemaking and are also consumed fresh or dried as raisins. Grapevines require full sunlight and well-drained loamy soil. Cultivation involves pruning, trellising, and pest management. Grapes have a rich cultural and historical significance in various regions.",
        "Mango" => "Mango trees are tropical fruit-bearing trees known for their sweet and succulent fruits. Mangoes are consumed fresh, dried, or processed into various products. Mango cultivation requires full sunlight, well-drained loamy soil, and a warm climate. The trees have a long lifespan and are often propagated through grafting to maintain desired fruit characteristics.",
        "Banana" => "Banana plants are herbaceous plants cultivated for their elongated and curved fruits. Bananas are a staple food in many tropical regions and are rich in potassium and other nutrients. Banana plants thrive in full sunlight and well-drained sandy loam soil. Cultivation involves managing pests and diseases, and bananas are typically propagated through rhizomes.",
        "Pomegranate" => "Pomegranate is a deciduous fruit-bearing shrub or small tree known for its juicy and ruby-red arils. Pomegranates are rich in antioxidants and have culinary and medicinal uses. Pomegranate cultivation requires full sunlight, well-drained sandy loam soil, and a warm climate. The shrubs are often pruned to maintain a desirable shape and facilitate fruit harvesting.",
        "Lentil" => "Lentils are leguminous crops cultivated for their edible seeds, rich in protein and fiber. Lentils are a valuable source of nutrition in various cuisines worldwide. Lentil plants thrive in full sunlight and well-drained sandy loam soil. Cultivation involves proper spacing and weed management to ensure optimal yields. Lentils are often rotated with other crops for soil health.",
        "Blackgram" => "Blackgram, also known as black lentil, is a leguminous crop grown for its nutritious seeds. Blackgrams are rich in protein and are commonly used in various culinary dishes. Blackgram plants prefer full sunlight and well-drained sandy loam soil. Cultivation involves proper irrigation and pest management to ensure healthy plant development.",
        "Mungbean" => "Mungbean is a leguminous crop cultivated for its small, green, and nutritious seeds. Mungbeans are a staple in many Asian cuisines and are also used for sprouting. Mungbean plants thrive in full sunlight and well-drained sandy loam soil. Cultivation involves proper spacing and irrigation to ensure optimal seed development.",
        "Mothbeans" => "Mothbeans, also known as matki, are leguminous crops grown for their small and brown seeds. Mothbeans are rich in protein and are used in various culinary dishes. Mothbean plants prefer full sunlight and well-drained sandy loam soil. Cultivation involves proper spacing and weed management to ensure healthy plant development.",
        "Pigeonpeas" => "Pigeonpeas are leguminous crops cultivated for their edible seeds and nitrogen-fixing properties. Pigeonpeas are a valuable crop in sustainable agriculture and are used in various culinary dishes. Pigeonpea plants thrive in full sunlight and well-drained loamy soil. Cultivation involves proper spacing and pest management for optimal yields.",
        "Kidneybeans" => "Kidneybeans, also known as rajma, are leguminous crops grown for their large and kidney-shaped seeds. Kidneybeans are a rich source of protein and are commonly used in various cuisines. Kidneybean plants prefer full sunlight and well-drained loamy soil. Cultivation involves proper spacing, trellising, and pest management for healthy plant development.",
        "Chickpea" => "Chickpeas, also known as garbanzo beans, are leguminous crops cultivated for their round and beige seeds. Chickpeas are a significant source of protein and are used in various culinary dishes. Chickpea plants thrive in full sunlight and well-drained loamy soil. Cultivation involves proper spacing and pest management for optimal yields.",
        "Coffee" => "Coffee plants are evergreen shrubs cultivated for their seeds, commonly known as coffee beans. Coffee is one of the most popular beverages globally. Coffee plants prefer partial shade and well-drained loamy soil. Cultivation involves careful management of pests and diseases, along with harvesting the ripe coffee cherries. Coffee is often grown in tropical regions with suitable climates."
    );

    //------------------------------------------------------------------------------------------------------------------------
    

    ?>
<div class="main-content">
    <div class="container-fluid">
        <div style="margin: 0px auto; font-size: 27px; font-weight: 600; text-transform: uppercase;">
            Recommendation
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow" style="background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.5)),url('<?php echo $cropsImages[$recommended_crop]; ?>'); background-size: cover; background-position: center; border: none; height: 80vh; border-radius: 20px;">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 60px; margin-top: 20px;">
                            <div class="row">
                                <div class="col-md-6" style="max-width: 100%;">
                                    <div class="crop-name" style="padding: 16px;">
                                        <h1 style="color: #fff; font-size: 40px; font-style: italic;-webkit-text-stroke: 0.7px black;"><?php echo $recommended_crop; ?></h1>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stats" style="color: #ff1f; -webkit-text-stroke: 0.4px black; margin-top: 5px;">
                                        <h4><strong>Confidence Rate:</strong><?php echo $confidence; ?></h4>
                                        <h4><strong>Season:</strong> <?php echo $season; ?></h4>
                                        <h4><strong>Machine Learning Model:</strong> <?php echo $ml; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="description-title" style="padding: 15px; background-color: rgba(255, 255, 255, 0.5);">
                                <h2><strong>Crop Description</strong></h2>
                            </div>
                            <div class="description" style="padding: 18px; background-color: rgba(255, 255, 255, 0.56); height: 100%;">
                                <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cropsGeneralDescriptions[$recommended_crop]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card shadow-lg" style= "border-radius: 20px;">
                    <div class="card-header border-2" style="font-size: 26px; font-weight: 650; text-transform: uppercase; text-align: center;">
                        Statistics
                    </div>
                    <div class="card-body" style="overflow-y: auto; height: 74vh;">
                        <div class="statistics" style="padding: 10px;">
                            <p class="stat"><strong>Soil Type:</strong> <?php echo $cropStats[$recommended_crop]['soil_type']; ?></p>
                            <p class="stat"><strong>Germination:</strong> <?php echo $cropStats[$recommended_crop]['germination_rate']; ?></p>
                            <p class="stat"><strong>Sunlight:</strong> <?php echo $cropStats[$recommended_crop]['sunlight_required']; ?></p>
                            <p class="stat"><strong>Watering:</strong> <?php echo $cropStats[$recommended_crop]['water_required']; ?></p>
                            <p class="stat"><strong>Growth Period:</strong> <?php echo $cropStats[$recommended_crop]['growth_period']; ?></p>
                            <p class="stat"><strong>Yield:</strong> <?php echo $cropStats[$recommended_crop]['yield']; ?></p>
                            <p class="stat"><strong>Companion Plants:</strong> <?php echo $cropStats[$recommended_crop]['companion_plants']; ?></p>
                            <p class="stat"><strong>Wind Tolerance:</strong> <?php echo $cropStats[$recommended_crop]['wind_tolerance']; ?></p>
                            <p class="stat"><strong>Height:</strong> <?php echo $cropStats[$recommended_crop]['max_height']; ?></p>
                            <p class="stat"><strong>Propagation:</strong> <?php echo $cropStats[$recommended_crop]['propagation']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>