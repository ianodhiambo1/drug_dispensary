<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login Patient</title>
    <link rel="stylesheet" href="../views/css/style_login.css" />
    <script src="../custom-scripts.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <section class="wrapper active">
      
    <div class="form signup">
    <?php
    if (isset($_GET['message']) && $_GET['message'] == 0) {
        // Display the message div
        echo '<div  id="targetEl"  class="transition duration-700 ease-in-out w-10/12 mx-auto flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Try again!</span> Something went wrong. 
        </div>
        <button type="button" id="triggerEl" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-green-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
      </div>';
    }
    else if (isset($_GET['message']) && $_GET['message'] == 1) {
      // Display the message div
      echo '<div  id="targetEl"  class="transition duration-700 ease-in-out w-10/12 mx-auto flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
      <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div>
        <span class="font-medium">Success!</span> User Registered
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
        <header>Patient Sign Up</header>
        <form action="../public/index.php?action=signup&role=Patient" method="POST">
          <input type="text" placeholder="User name" name="Username" required />
          <input type="password" placeholder="Password" name="Password" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" />
            <label for="signupCheck">I accept all terms & conditions</label>
          </div>
          <input type="submit" value="Signup" />
        </form>
      </div>
      <div class="form login">
        <header>Patient Login</header>
        <form action="../public/index.php?action=login&role=Patient" method="POST">
          <input type="text" placeholder="Username" name="Username" required />
          <input type="password" placeholder="Password" name="Password" required />
          <input type="submit" value="Login" />
        </form>
      </div>
    </section>
    <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
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
