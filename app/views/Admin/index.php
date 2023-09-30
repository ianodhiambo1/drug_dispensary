<?php
    session_start();

    // Check if the user is logged in as an admin
    if (!isset($_SESSION["UserID"])) {
        header("Location: login.php");
        exit;
    }

    // Database connection
    include('../../config/database.php');
    // Retrieve admin details
    $adminId = $_SESSION["UserID"];
    if(isset($_GET['logout'])){
        unset($adminId);
        session_destroy();
        header("Location: login.php");

    }
    $query = "SELECT * FROM users WHERE UserID='$adminId' AND Role='Admin'";
    $result = mysqli_query($conn, $query);
    $admin = mysqli_fetch_assoc($result);

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body>
<?php include('../inc/admin_navbar.php')?>  


</body>
</html>