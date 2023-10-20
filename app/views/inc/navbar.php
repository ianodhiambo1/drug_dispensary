<?php
    session_start();

    // Check if the user is logged in as an patient
    if (!isset($_SESSION["UserID"])) {
        header("Location: ../public/index.php?action=login&role=patient");
        exit;
    }

    // Database connection
    include('../config/database.php');
    // Retrieve patient details
    $patientId = $_SESSION["UserID"];
    if(isset($_GET['logout'])){
        unset($patientId);
        session_destroy();
        header("Location: ../public/index.php?action=login&role=patient");

    }
    $query = "SELECT * FROM patient WHERE PatientID='$patientId'";
    $result = mysqli_query($conn, $query);
    $patient = mysqli_fetch_assoc($result);

?>


<link href="../public/images/android-chrome-512x512.png" rel="icon" />
<nav class=" border-gray-200 bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
    <a href="index.php" class="flex items-center">
            <img src="https://www.svgrepo.com/show/303353/dash-3-logo.svg" class="h-8 mr-3" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">MataDrugs</span>
        </a>
        <div class="flex items-center">
            <a href="../public/index.php?action=patientDetails&id=<?php echo $patient['PatientID']?>" class="mr-6 text-sm  text-gray-500 text-white hover:underline"><?php echo $patient['UserName'];?></a>
            <a href="../views/Patient/index.php?logout=<?php echo $patientId; ?>" class="text-sm  text-red-600 text-red-500 hover:underline">Logout</a>
        </div>
    </div>
</nav>
<nav class="bg-gray-50 bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm">
                <li>
                    <a href="#" class="text-gray-900 text-white hover:underline" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="../public/index.php?action=shop" class="text-gray-900 text-white hover:underline">Shop</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 text-white hover:underline">Team</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 text-white hover:underline">Features</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
