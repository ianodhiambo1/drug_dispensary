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
    <?php include('../views/inc/admin_navbar.php')?> 
    <!-- Navbar    -->
    <?php
    if (isset($_GET['message']) && $_GET['message'] == 1) {
        // Display the message div
        echo '<div  id="targetEl"  class="transition duration-700 ease-in-out w-10/12 mx-auto flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Success!</span> Drug Category Successfully Updated!
        </div>
        <button type="button" id="triggerEl" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-green-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
      </div>';
    }
    else if (isset($_GET['message']) && $_GET['message'] == 2) {
        // Display the message div
        echo '<div  id="targetEl"  class="transition duration-700 ease-in-out w-10/12 mx-auto flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Success!</span> Drug Category Successfully Deleted!
        </div>
        <button type="button" id="triggerEl" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-green-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
      </div>';
    }
    ?>

    <div class="choose flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm ">
            <li> <a href="../public/index.php?action=display" class="hover:underline">Table</a></li>
            <li><a href="../public/index.php?action=displayImage" class="hover:underline">Image</a></li>
            <li><a href="../public/index.php?action=addDrug" class="hover:underline">Add Drug</a></li>
            <li><a id="addCategoryBtn" class="hover:underline cursor-pointer">Add Category</a></li>
        </ul>
    </div>

    <div class="drugImage flex  mx-auto max-w-screen-xl p-4  ">
        <div class="sideBar mt-5">
            <h5 class="text-xl font-bold">Categories</h5>
            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <ul class="ml-1" id="categoryList">
            <?php

            foreach ($categories as $category) {
                $category_name = $category['category_name'];
                $category_id = $category['id'];
                echo "<li class='flex items-center'><a href='../public/index.php?action=displayCategory&cat=$category_name'>$category_name</a>   
                
                <a href='../public/index.php?action=deleteCategory&id=$category_id'><svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='14' height='14' viewBox='0 0 30 30'>
    <path d='M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 '></path>
</svg></a>
                
                </li>";
            }
            ?>

            </ul>
            <div class="addCategory">
                <form action="../public/index.php?action=addCategory" method="post">

                    <input name="Category" id="categoryInput" type="text" class="hidden block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <input type="submit" name="submit" value="Add New"  class="text-white bg-blue-700 mt-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">

                </form>
                </div>
        </div>

        <div class="drugCards ml-5 flex flex-wrap w-70">
            <?php foreach ($drugs as $drug): ?>

                <div class=" mt-5 w-fit max-w-xs bg-white border border-gray-200 rounded-lg shadow mr-3 ">
                    <a href="../public/index.php?action=viewDrug&id=<?php echo $drug['MedicineID'];?>">
                        <img class="p-8 rounded-t-lg"
                            src="<?php echo $drug['ImageUrl'] ?>"
                            alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="../public/index.php?action=viewDrug&id=<?php echo $drug['MedicineID'];?>">
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
        <script src="../views/js/category.js"></script>
</body>

</html>