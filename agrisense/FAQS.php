<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrisense</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        header {
            height: 100px;
            background-color: #000;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 40px;
            font-weight: bold;
            text-transform: uppercase;
        }

        main {
            padding: 20px 40px;
        }

        h2 {
            text-transform: uppercase;
            color: #000;
            padding: 20px;
        }

        #titleDesc h1 {
            padding-left: 50px;
            font-size: 40px;
            background: linear-gradient(90deg, #124201, #DFF40F);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke: 0.5px white;
            text-shadow: 2px 2px 5px rgba(255, 255, 255, 0.1);
        }

        .faq-card {
            background-color: #45b654;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            padding: 20px;
            margin-bottom: 40px;
            transition: transform 0.3s ease-in-out;
        }

        .faq-card:hover {
            cursor: pointer;
            transform: scale(1.05);

        }

        .faq-card p {
            font-size: 17px;
            font-weight: 500;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <div id="titleDesc">
            <h1>Agrisense</h1>
        </div>
        <nav>
            <a href="landingpage.php">Home</a>
            <a href="#">About Us</a>
        </nav>
    </header>
    <main>
        <h2>Frequently Asked Questions<i class='bx bxs-leaf'></i></h2>
        <p style="font-size: 20px; padding-bottom: 10px;"><strong>1. How does Agrisense work?</strong></p>
        <div class="faq-card">
            <p><i class='bx bxs-leaf'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agrisense uses Arduino sensors
                to measure soil parameters such as nitrogen, potassium, phosphorus, rainfall, pH, humidity, and
                temperature. The data is then displayed on the website, and based on these parameters, Agrisense
                recommends suitable crops for the soil.</p>
        </div>
        <p style="font-size: 20px; padding-bottom: 10px;"><strong>2. What sensors are used by Agrisense?</strong></p>
        <div class="faq-card">
            <p><i class='bx bxs-leaf'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agrisense utilizes Arduino
                sensors for nitrogen, potassium, phosphorus, rainfall, pH, humidity, and temperature measurements.</p>
        </div>
        <p style="font-size: 20px; padding-bottom: 10px;"><strong>3. Is Agrisense compatible with other sensor
                models?</strong></p>
        <div class="faq-card">
            <p><i class='bx bxs-leaf'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;As of now, Agrisense is
                specifically designed to work with Arduino sensors. Compatibility with other sensor models may be
                considered in future updates.</p>
        </div>
        <p style="font-size: 20px; padding-bottom: 10px;"><strong>4. How often should I calibrate the sensors?</strong>
        </p>
        <div class="faq-card">
            <p><i class='bx bxs-leaf'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The frequency of sensor
                calibration depends on environmental conditions and usage. We recommend calibrating the sensors
                periodically, especially if there are significant changes in the operating environment.</p>
        </div>
        <p style="font-size: 20px; padding-bottom: 10px;"><strong>5. Can Agrisense be integrated with other farming
                management systems?</strong></p>
        <div class="faq-card">
            <p><i class='bx bxs-leaf'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agrisense is designed to be
                flexible and can potentially be integrated with other farming management systems. Please contact our
                support team for further assistance and integration possibilities.</p>
        </div>
    </main>
</body>

</html>