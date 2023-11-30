
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <section class="w-3/4 max-w-6xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20">
       
    <h1 class="text-xl font-bold text-white capitalize dark:text-white">User Details</h1>
    <?php foreach ($users as $user): ?>
    <form action="../public/index.php?action=editUser&id=<?php echo $user['user_id'];?>" method="POST" >
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white dark:text-gray-200" for="username">Username</label>
                <input value="<?php echo $user['username'];?>" name="username"  type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="emailAddress">Email</label>
                <input value="<?php echo $user['email'];?>" name="user_email"  type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="gender">Gender</label>
                <select name="gender" id="genderSelect" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="male" <?php if($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
                    <option value="other" <?php if($user['gender'] == 'other') echo 'selected'; ?>>Other</option>
                </select>
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="api_key">API Key</label>
                <input value="<?php echo $user['api_key'];?>" name="api_key"  type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <input type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600" name="submit" value="Update">
        </div>
        <?php endforeach;?>
    </form>
</body>
</html>
