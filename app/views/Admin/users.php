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

 <div class="choose flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4"  >
    <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm ">
        <li> <a href="../public/index.php?action=display" class="hover:underline">Table</a></li>
        <li><a href="../public/index.php?action=displayImage" class="hover:underline">Image</a></li>
        <li><a href="../public/index.php?action=addDrug" class="hover:underline">Add Drug</a></li>
    </ul>
</div>
<?php
    // Check the "message" variable in the URL
    if (isset($_GET['message']) && $_GET['message'] == 1) {
        // Display the message div
        echo '<div  id="targetEl"  class="transition duration-700 ease-in-out w-10/12 mx-auto flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Success!</span> Drug Successfully Updated!
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
          <span class="font-medium">Success!</span> Drug Successfully Deleted!
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
  
  <h3 class="text-3xl font-bold text-center ">Patient</h3>
 <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5 w-10/12 mx-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    UserName
                </th>
                <th scope="col" class="px-6 py-3">
                    WalletID
                </th>
                <th scope="col" class="px-6 py-3">
                    FirstName
                </th>
                <th scope="col" class="px-6 py-3">
                    LastName
                </th>
                <th scope="col" class="px-6 py-3">
                    City
                </th>
                <th scope="col" class="px-6 py-3">
                    PostalCode
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $patient['PatientID']; ?>
                </th>
                <td class="px-6 py-4">
                    <?php echo $patient['UserName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $patient['WalletID']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $patient['FirstName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $patient['LastName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $patient['City']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $patient['PostalCode']; ?>
                </td>
                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="../public/index.php?action=deleteDrug&id=<?php echo $patient['PatientID'];?>" 
                    onclick="return confirm('Are you sure you want to delete this drug')" 
                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<h3 class="text-3xl font-bold text-center ">Doctor</h3>
 <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5 w-10/12 mx-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    UserName
                </th>
                <th scope="col" class="px-6 py-3">
                    FirstName
                </th>
                <th scope="col" class="px-6 py-3">
                    LastName
                </th>
                <th scope="col" class="px-6 py-3">
                    Speciality
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctors as $doctor): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $doctor['DoctorID']; ?>
                </th>
                <td class="px-6 py-4">
                    <?php echo $doctor['UserName']; ?>
                </td>
                
                <td class="px-6 py-4">
                <?php echo $doctor['FirstName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $doctor['LastName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $doctor['Speciality']; ?>
                </td>
                
                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="../public/index.php?action=deleteDrug&id=<?php echo $doctor['DoctorID'];?>" 
                    onclick="return confirm('Are you sure you want to delete this drug')" 
                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<h3 class="text-3xl font-bold text-center ">Pharmacist</h3>
 <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5 w-10/12 mx-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    UserName
                </th>
                <th scope="col" class="px-6 py-3">
                    FirstName
                </th>
                <th scope="col" class="px-6 py-3">
                    LastName
                </th>
                <th scope="col" class="px-6 py-3">
                    Speciality
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacists as $pharmacist): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $pharmacist['PharmacistID']; ?>
                </th>
                <td class="px-6 py-4">
                    <?php echo $pharmacist['UserName']; ?>
                </td>
                
                <td class="px-6 py-4">
                <?php echo $pharmacist['FirstName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $pharmacist['LastName']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $pharmacist['Location']; ?>
                </td>
                
                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="../public/index.php?action=deleteDrug&id=<?php echo $doctor['DoctorID'];?>" 
                    onclick="return confirm('Are you sure you want to delete this drug')" 
                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
            setTimeout(function() {
            var messageDiv = document.getElementById('targetEl');
            if (messageDiv) {
                messageDiv.style.opacity = '0';
                setTimeout(function() {
                    messageDiv.style.display = 'none';
                }, 500); // Hide after the transition
            }
        }, 3000); // 10 seconds

        // JavaScript to allow manual removal when clicking the close button
        var closeButton = document.getElementById('triggerEl');
        if (closeButton) {
            closeButton.addEventListener('click', function() {
                var messageDiv = document.getElementById('targetEl');
                if (messageDiv) {
                    messageDiv.style.display = 'none';
                }
            });
        }

</script>
</body>
</html>