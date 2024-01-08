<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Agrisense</title>
  <link rel="stylesheet" href="assets/css/landingpagecss.css">
</head>
<body>
  <div id="firstDiv">
    <video id="videoBackground" autoplay muted loop>
      <source src="assets\components\bgvideo.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <div id="topNav">
      <nav>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="login.php">Log In</a></li>
          <li><a href="register.php">Sign Up</a></li>
        </ul>
      </nav>
    </div>

    <div id="titleDesc">
      <h1>Agrisense</h1>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agrisense is a game-changer in agriculture, utilizing smart sensors to monitor real-time soil conditions. Through advanced data analytics and machine learning, the system predicts the most suitable crops for specific soil types, 
        empowering farmers with actionable insights for precise and sustainable farming decisions.</p>
      <div class="buttons">
      <button id="FAQs">FAQs</button>
      <button id="Enter" onclick="redirectLogin()">Try Agrisense</button>
      </div>
    </div>
  </div>

  <script>
  function redirectLogin() {
    window.location.href = "login.php";
  }
</script>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Agrisense</title>
  <link rel="stylesheet" href="assets/css/landingpagecss.css">
</head>

<body>
  <div id="firstDiv">
    <video id="videoBackground" autoplay muted loop>
      <source src="assets\components\bgvideo.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <div id="topNav">
      <nav>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="login.php">Log In</a></li>
          <li><a href="register.php">Sign Up</a></li>
        </ul>
      </nav>
    </div>

    <div id="titleDesc">
      <h1>Agrisense</h1>
      <p style="coolor: #fff;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agrisense is a game-changer in agriculture, utilizing smart sensors to
        monitor real-time soil conditions. Through advanced data analytics and machine learning, the system predicts the
        most suitable crops for specific soil types,
        empowering farmers with actionable insights for precise and sustainable farming decisions.</p>
      <div class="buttons">
        <button id="FAQs" onclick="faqsu()">FAQs</button>
        <button id="Enter" onclick="redirectLogin()">Try Agrisense</button>
      </div>
    </div>
  </div>

  <script>
    function redirectLogin()
    {
      window.location.href = "login.php";
    }
    function faqsu()
    {
      window.location.href = "FAQS.php";
    }
  </script>

</body>

</html>