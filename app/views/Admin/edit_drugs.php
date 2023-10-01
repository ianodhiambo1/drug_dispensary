<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <section class="max-w-6xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20">
        <!-- Navbar    -->
        <?php include('C:/xampp/htdocs/drug_dispensary/app/views/inc/admin_navbar.php')?>
        <!-- Navbar    -->
    <h1 class="text-xl font-bold text-white capitalize dark:text-white">Drug Details</h1>
    <form action="../public/index.php?action=editDrug&id=<?php echo $drug['DrugID']?>" method="POST" enctype="multipart/form-data">
    <?php foreach ($drugs as $drug): ?>
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white dark:text-gray-200" for="username">Name</label>
                <input value="<?php echo $drug['DrugID']?>" name="DrugID"  type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="emailAddress">Pharmaceutical Company</label>
                <input value="<?php echo $drug['DrugName']?>" name="PharmaceuticalCompany"  type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="password">Price</label>
                <input value="<?php echo $drug['Price']?>" name="Price"  type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Category</label>
                <select value="<?php echo $drug['Category']?>" id="category" name="Category" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option>Analgesics</option>
                    <option>Cardiovasculars</option>
                    <option>Vitamins</option>
                </select>
        </div>
            <div>
                <label class="text-white dark:text-gray-200" for="passwordConfirmation">Description</label>
                <textarea name="Description" id="textarea" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                <script>
                    document.getElementById("textarea").value = "<?php echo $drug['Description'];?>"; 
                    document.getElementById("category").value = "<?php echo $drug['Category'];?>"; 
                </script>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <input type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600" name="submit" value="Upload">
        </div>
        <?php endforeach;?>
    </form>

</body>
</html>
