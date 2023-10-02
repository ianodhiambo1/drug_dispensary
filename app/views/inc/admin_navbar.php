<?php
    session_start();

    // Check if the user is logged in as an admin
    if (!isset($_SESSION["UserID"])) {
        header("Location: login.php");
        exit;
    }

    // Database connection
    include('C:xampp/htdocs/drug_dispensary/app/config/database.php');
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

<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="index.html" class="flex items-center">
            <img src="https://www.svgrepo.com/show/303353/dash-3-logo.svg" class="h-8 mr-3" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MataDrugs</span>
        </a>
        <div class="flex items-center">
            <a href="user_details.html" class="mr-6 text-sm  text-gray-500 dark:text-white hover:underline"><?php echo $admin['Username']?><a>
            <a href="http://localhost/drug_dispensary/app/views/Admin/index.php?logout=<?php echo $adminId; ?>" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Logout</a>
        </div>
    </div>
</nav>
<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
                <li>
                    <a href="index.php" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Dashboard</a>
                </li>
                <li>
                    <a href="http://localhost/drug_dispensary/app/public/index.php?action=display" class="text-gray-900 dark:text-white hover:underline">Drugs</a>
                </li>
                <li>
                    <a href="users.php" class="text-gray-900 dark:text-white hover:underline">Users</a>
                </li>
                <li>
                    <a href="prescriptions.php" class="text-gray-900 dark:text-white hover:underline">Prescriptions</a>
                </li>
            </ul>
        </div>
    </div>
</nav>