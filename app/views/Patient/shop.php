<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body>
    <!-- Navbar    -->
    <?php include('../views/inc/navbar.php') ?>
    <!-- Navbar    -->

    <div class="drugImage flex  mx-auto max-w-screen-xl p-4  ">
        <div class="sideBar mt-5 ">
            <h5 class="text-xl font-bold">Categories</h5>
            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <ul class="ml-1">
                <li><a href="../public/index.php?action=shop&cat=Analgesics">Analgesics</a></li>
                <li><a href="../public/index.php?action=shop&cat=Cardiovasculars">Cardiovasculars</a></li>
                <li><a href="../public/index.php?action=shop&cat=Vitamins">Vitamins</a></li>
            </ul>
        </div>

        <div class="drugCards ml-5 flex flex-wrap">
            <?php foreach ($drugs as $drug): ?>

                <div class=" mt-5 w-fit max-w-xs bg-white border border-gray-200 rounded-lg shadow mr-3 ">
                    <a href="#">
                        <img class="p-8 rounded-t-lg"
                            src="<?php echo $drug['ImageUrl'] ?>"
                            alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 "><?php echo $drug['Name'];?></h5>
                        </a>

                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 "><?php echo $drug['Price'];?></span>
                            <a href="../public/index.php?action=viewDrug&id=<?php echo $drug['MedicineID'];?>"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">View
                                Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


</body>

</html>