<?php
   // Database connection
   include('../../database.php');
   session_start();
   
   // Check if the form is submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Retrieve the submitted values
       $username = $_POST["Username"];
       $password = $_POST["Password"];
   
       // Prepare and execute the query
       $query = "SELECT * FROM users WHERE Username='$username' AND Password='$password' AND Role='Admin'";
       $result = mysqli_query($conn, $query);
   
       if (mysqli_num_rows($result) == 1) {
           // Authentication successful, redirect to admin dashboard or desired page
           $row = mysqli_fetch_assoc($result);
           $_SESSION['UserID'] = $row['UserID'];
           header("Location: index.php");
           exit;
       } else {
           // Authentication failed
           $error_message = "Invalid username or password";
       }
   }
   
   mysqli_close($conn); 



?>



<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login Admin</title>
    <link rel="stylesheet" href="css/style_login.css" />
    <script src="../custom-scripts.js" defer></script>
  </head>
  <body>
    <section class="wrapper active">
      
    <div class="form signup">
        <header>Admin Sign Up</header>
        <form action="">
          <input type="text" placeholder="User name" required />
          <input style="display: none;" type="text" value="Admin" name="role" required />
          <input type="password" placeholder="Password" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" />
            <label for="signupCheck">I accept all terms & conditions</label>
          </div>
          <input type="submit" value="Signup" />
        </form>
      </div>
      <div class="form login">
        <header>Admin Login</header>
        <form action="" method="POST">
          <input type="text" placeholder="Username" name="Username" required />
          <input style="display: none;" type="text" value="Admin" name="role" required />
          <input type="password" placeholder="Password" name="Password" required />
          <input type="submit" value="Login" />
        </form>
      </div>
      <?php
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>

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
      </script>
  </body>
</html>
