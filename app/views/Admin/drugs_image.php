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
 <?php include('../inc/admin_navbar.php')?>
 <!-- Navbar    -->


<div class="choose flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4"  >
    <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm ">
        <li> <a href="drugs.html" class="hover:underline">Table</a></li>
        <li><a href="drugs_image.html" class="hover:underline">Image</a></li>
    </ul>
</div>

<div class="drugImage flex  mx-auto max-w-screen-xl p-4  ">
    <div class="sideBar mt-5 ">
      <h5 class="text-xl font-bold">Categories</h5>
      <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700"> 
        <ul class="ml-1">
            <li><a href="">Laxatives</a></li>
            <li><a href="">Antibiotics</a></li>
            <li><a href="">Antacids</a></li>
            <li><a href="">Vitamins</a></li>
        </ul>
    </div>
    
    <div class="drugCards ml-5 flex flex-wrap">

<div class=" mt-5 w-fit max-w-xs bg-white border border-gray-200 rounded-lg shadow mr-3 ">
    <a href="#">
        <img class="p-8 rounded-t-lg" src="https://www.henryschein.com/Products/2770780_US_Front_01_600x600.jpg" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 ">Amoxicillin</h5>
        </a>

        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 ">$599</span>
            <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">View Details</a>
        </div>
    </div>
</div>

</body>
</html>