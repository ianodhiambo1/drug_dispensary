<!DOCTYPE html>

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
        <form action="C:/xampp/htdocs/drug_dispensary/app/public/index.php?action=signup" method="POST">
          <input type="text" placeholder="User name" name="Username" required />
          <input style="display: none;" type="text" value="Admin" name="Role" required />
          <input type="password" placeholder="Password" name="Password" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" />
            <label for="signupCheck">I accept all terms & conditions</label>
          </div>
          <input type="submit" value="Signup" />
        </form>
      </div>
      <div class="form login">
        <header>Admin Login</header>
        <form action="../../public/index.php?action=login" method="POST">
          <input type="text" placeholder="Username" name="Username" required />
          <input style="display: none;" type="text" value="Admin" name="Role" required />
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
      </script>
  </body>
</html>
