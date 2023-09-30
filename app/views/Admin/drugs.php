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
<?php include('C:/xampp/htdocs/drug_dispensary/app/views/inc/admin_navbar.php')?>
 <!-- Navbar    -->

 <div class="choose flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4"  >
    <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm ">
        <li> <a href="../public/index.php?action=display" class="hover:underline">Table</a></li>
        <li><a href="../public/index.php?action=displayImage" class="hover:underline">Image</a></li>
        <li><a href="../public/index.php?action=addDrug" class="hover:underline">Add Drug</a></li>
    </ul>
</div>
  

 <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5 w-10/12 mx-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Pharmaceutical Company
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($drugs as $drug): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $drug['DrugID']; ?>
                </th>
                <td class="px-6 py-4">
                    <?php echo $drug['DrugName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $drug['StockQuantity']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $drug['PharmaceuticalCompany']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $drug['Description']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $drug['Price']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $drug['Category']; ?>
                </td>
                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>