<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account</title>
    <link rel="stylesheet" href="assets\css\registercss.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body style="background: url('bglgn.jpg') no-repeat; background-size: cover;
    background-position: center;">
    <div id="topNav">
        <a href="landingpage.php"><h1>Agrisense</h1></a>
    </div>
    <div class="main" style="color: #fff;">
        <form action="" method="post">
            <h1><i class='bx bx-leaf'></i>&nbsp;Sign Up</h1>
            <div class="input-box">
                <input type="text" name="username" id="username" placeholder="Create a username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Email address" required>
                <i class='bx bxl-gmail'></i>
            </div>
            <div class="input-box">
                <input type="tel" name="phone" id="phone" placeholder="Phone Number" required>
                <i class='bx bxs-phone' ></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Create a password" required>
                <i class='bx bxs-lock-open' ></i>
            </div>
            <button type="submit" class="btn">Create account</button>
            <div class="register-link">
                <p>Already have an account?<a href="login.php">Log in</a></p>
            </div>
        </form>
    </div>
    <?php
session_start();
include('config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

    // Check for duplicate username
    $checkDuplicateQuery = "SELECT * FROM users WHERE username = ?";
    $stmtCheck = $conn->prepare($checkDuplicateQuery);
    $stmtCheck->bind_param('s', $username);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        // Username already exists
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "An account with that username already exists.",
                        showConfirmButton: true
                    });
                });
              </script>';
    } else {
        // Insert the new user into the database
        $insertQuery = "INSERT INTO users (username, password, email, number, request, accType) 
                        VALUES (?, ?, ?, ?, 0, 'default')";
        $stmtInsert = $conn->prepare($insertQuery);
        $stmtInsert->bind_param('ssss', $username, $password, $email, $phone);

        if ($stmtInsert->execute()) {
            // Successful account creation
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Account created!",
                            showConfirmButton: true
                        }).then(function() {
                            window.location.href = "login.php";
                        });
                    });
                  </script>';
        } else {
            // Error inserting into the database
            echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Error creating account.",
                            showConfirmButton: true
                        });
                    });
                  </script>';
        }

        $stmtInsert->close();
    }

    $stmtCheck->close();
}
?>

</body>
</html>