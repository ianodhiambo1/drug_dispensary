<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login Admin</title>
    

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f0faff;
}

.wrapper {
  position: relative;
  max-width: 470px;
  width: 100%;
  border-radius: 12px;
  padding: 20px 30px 120px;
  background: #4070f4;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.form.login {
  position: absolute;
  left: 50%;
  bottom: -86%;
  transform: translateX(-50%);
  width: calc(100% + 220px);
  padding: 20px 140px;
  border-radius: 50%;
  height: 100%;
  background: #fff;
  transition: all 0.6s ease;
}

.wrapper.active .form.login {
  bottom: -15%;
  border-radius: 35%;
  box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.1);
}

.form header {
  font-size: 30px;
  text-align: center;
  color: #fff;
  font-weight: 600;
  cursor: pointer;
}

.form.login header {
  color: #333;
  opacity: 0.6;
}

.wrapper.active .form.login header {
  opacity: 1;
}

.wrapper.active .signup header {
  opacity: 0.6;
}

.wrapper form {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-top: 40px;
}

form input {
  height: 60px;
  outline: none;
  border: none;
  padding: 0 15px;
  font-size: 16px;
  font-weight: 400;
  color: #333;
  border-radius: 8px;
  background: #fff;
}

.form.login input {
  border: 1px solid #aaa;
}

.form.login input:focus {
  box-shadow: 0 1px 0 #ddd;
}

form .checkbox {
  display: flex;
  align-items: center;
  gap: 10px;
}

.checkbox input[type=checkbox] {
  height: 16px;
  width: 16px;
  accent-color: #fff;
  cursor: pointer;
}

form .checkbox label {
  cursor: pointer;
  color: #fff;
}

form a {
  color: #333;
  text-decoration: none;
}

form a:hover {
  text-decoration: underline;
}

form input[type=submit] {
  margin-top: 15px;
  padding: none;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
}

.form.login input[type=submit] {
  background: #4070f4;
  color: #fff;
  border: none;
}

*, *:before, *:after {
  box-sizing: border-box;
}

body {
  padding: 24px;
  font-family: "Source Sans Pro", sans-serif;
  margin: 0;
}

h1, h2, h3, h4, h5, h6 {
  margin: 0;
}

.container {
  max-width: 1000px;
  margin-right: auto;
  margin-left: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.table {
  width: 100%;
  border: 1px solid #EEEEEE;
}

.table-header {
  display: flex;
  width: 100%;
  background: #000;
  padding: 18px 0;
}

.table-row {
  display: flex;
  width: 100%;
  padding: 18px 0;
}
.table-row:nth-of-type(odd) {
  background: #EEEEEE;
}

.table-data, .header__item {
  flex: 1 1 20%;
  text-align: center;
}

.header__item {
  text-transform: uppercase;
}

.filter__link {
  color: white;
  text-decoration: none;
  position: relative;
  display: inline-block;
  padding-left: 24px;
  padding-right: 24px;
}
.filter__link::after {
  content: "";
  position: absolute;
  right: -18px;
  color: white;
  font-size: 12px;
  top: 50%;
  transform: translateY(-50%);
}
.filter__link.desc::after {
  content: "(desc)";
}
.filter__link.asc::after {
  content: "(asc)";
}
    </style>
  </head>
  <body>
    <section class="wrapper active">
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
      
    <div class="form signup">
        <header>Sign Up</header>
        <form action="/index.php/user/register" method="POST">
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
        <header>Login</header>
        <form action="/index.php/user/login" method="POST">
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
