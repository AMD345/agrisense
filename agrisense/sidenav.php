<?php
session_start();
include('config/config.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}
?>

<head>
    <!-- Add this to the head section of your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        .user-image {
            border-radius: 100%;
            width: 50px;
            border: 1px solid #eee;
        }

        p {
            text-transform: uppercase;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 80px;
            background-color: #000000e7;
            padding: 0.4rem 0.8rem;
            transition: all 0.5s ease;
        }

        .main-content {
            position: relative;
            min-height: 100vh;
            top: 0;
            left: 80px;
            transition: all 0.5s ease;
            width: calc(100% - 80px);
            padding: 1rem;
        }

        .sidebar.active~.main-content {
            left: 250px;
            width: calc(100% - 250px);
            font-size: 11.2px;
        }

        .sidebar.active {
            width: 250px;
        }

        .sidebar #btn {
            position: absolute;
            color: #eee;
            top: .4rem;
            left: 50%;
            font-size: 1.2rem;
            line-height: 50px;
            transform: translate(-50%);
            cursor: pointer;
        }

        .sidebar.active #btn {
            left: 90%;
        }

        .sidebar .top .logo {
            margin-left: 20px;
            color: #eee;
            display: flex;
            height: 70px;
            width: 90%;
            align-items: center;
            pointer-events: none;
            opacity: 0;
        }

        .sidebar.active .top .logo {
            opacity: 1;
        }

        .top .logo i {
            font-size: 2rem;
            margin-right: 5px;
        }

        .user {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }

        .user p {
            color: #fff;
            opacity: 1;
            margin-left: 1rem;
        }

        .bold {
            font-weight: 600px;
        }

        .sidebar p {
            opacity: 0;
        }

        .sidebar.active p {
            opacity: 1;
        }

        .sidebar ul li {
            position: relative;
            list-style-type: none;
            height: 50px;
            width: 90%;
            margin: 0.8rem auto;
            line-height: 50px;
        }

        .sidebar ul li a {
            color: #fff;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 0.8rem;
        }

        .sidebar ul li a:hover {
            background-color: #fff;
            color: black;
        }

        .sidebar ul li a i {
            min-width: 50px;
            text-align: center;
            height: 50px;
            border-radius: 12px;
            line-height: 50px;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: #fff;
            color: black;
        }

        .sidebar .nav-item {
            opacity: 0;
        }

        .sidebar.active .nav-item {
            opacity: 1;
        }

        .sidebar ul li .tooltip {
            background: rgb(218, 210, 210);
            position: absolute;
            left: 125px;
            top: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0.5rem 0.8rem rgb(0, 0, 0, 0.2);
            border-radius: 0.6rem;
            padding: .4rem 1.2rem;
            line-height: 1.8rem;
            z-index: 20;
            opacity: 0;
        }

        .sidebar ul li:hover .tooltip {
            opacity: 1;
        }

        .sidebar.active ul li .tooltip {
            display: none;
        }
    </style>
</head>
<div class="sidebar">
    <div class="top">
        <div class="logo">
            <i class='bx bxs-leaf'></i>
            <span>AGRISENSE</span>
        </div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <div class="user">
        <img src="https://cdn-icons-png.flaticon.com/512/6997/6997490.png" alt="pfp" class="user-image">
        <div>
            <p class="bold">
                <?php echo $_SESSION['username']; ?>
            </p>
        </div>
    </div>
    <ul>
        <li>
            <a href="dashboard.php"><i class='bx bx-grid-alt'></i>
                <span class="nav-item">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="recommend.php"><i class='bx bxs-tree'></i>
                <span class="nav-item">Recommend</span>
            </a>
            <span class="tooltip">Use System</span>
        </li>
        <li>
            <a href="profile.php"><i class='bx bx-user-circle'></i>
                <span class="nav-item">Profile</span>
            </a>
            <span class="tooltip">Your Profile</span>
        </li>
        <li>
            <a href="history.php"><i class='bx bx-history'></i>
                <span class="nav-item">Saved</span>
            </a>
            <span class="tooltip">Saved Recommendations</span>
        </li>
        <!-- Update the logout link in your sidebar -->
        <li>
            <a href="#" onclick="confirmLogout()">
                <i class='bx bx-log-out'></i>
                <span class="nav-item">Log Out</span>
            </a>
            <span class="tooltip">Log Out</span>
        </li>

    </ul>
</div>
<script>
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');
    let mainContent = document.querySelector('.main-content');

    btn.onclick = function ()
    {
        sidebar.classList.toggle('active');
    };
</script>
<!-- Add this script tag after your existing script -->
<script>
    function confirmLogout()
    {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!'
        }).then((result) =>
        {
            if (result.isConfirmed)
            {
                // User clicked "Yes"
                window.location.href = 'logout.php'; // Redirect to logout script
            }
        });
    }
</script>