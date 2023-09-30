<?php
    session_start();

    // Check if the user is logged in as an admin
    if (!isset($_SESSION["UserID"])) {
        header("Location: login.php");
        exit;
    }

    // Database connection
    include('../../database.php');
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
    
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="index.php" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MataDrugs</span>
        </a>
        <div class="flex items-center">
            <a href="user_details.html" class="mr-6 text-sm  text-gray-500 dark:text-white hover:underline"><?php echo $admin['Username']?></a>
            <a class="text-sm  text-blue-600 dark:text-blue-500 hover:underline" href="index.php?logout=<?php echo $adminId; ?>" onclick="return confirm('are your sure you want to logout?');">Logout</a>
        </div>
    </div>
</nav>
<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
                <li>
                    <a href="index.html" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Dashboard</a>
                </li>
                <li>
                    <a href="drugs.html" class="text-gray-900 dark:text-white hover:underline">Drugs</a>
                </li>
                <li>
                    <a href="users.html" class="text-gray-900 dark:text-white hover:underline">Users</a>
                </li>
                <li>
                    <a href="prescriptions.html" class="text-gray-900 dark:text-white hover:underline">Prescriptions</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>