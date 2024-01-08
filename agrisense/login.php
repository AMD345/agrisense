<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to Agrisense</title>
    <link rel="stylesheet" href="assets\css\logincss.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body style="background: url('bglgn.jpg') no-repeat; background-size: cover;
    background-position: center;">
    <div id="topNav">
        <a href="landingpage.php"><h1>Agrisense</h1></a>
    </div>
    <div class="main">
        <form action="" method="post">
            <h1>Log In <i class='bx bxs-leaf'></i></h1>
            <div class="input-box">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember_user" id="remember_user">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn" name='login'>Login</button>
            <div class="register-link">
                <p>Don't have an account?<a href="register.php">Sign Up</a></p>
            </div>
        </form>
    </div>
    
<?php
session_start();
include('config/config.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;

        $sql = "SELECT * FROM users WHERE username = '$username'";
       $res =  $conn->query($sql);
       $row =  $res->fetch_assoc();
       $_SESSION['accType'] = $row['accType'];
        
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Welcome back, ' . $username . '!",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "dashboard.php";
                    });
                });
              </script>';
    } else {
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Invalid username or password",
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
              </script>';
    }

    $stmt->close();
}
?>

</body>
</html>
