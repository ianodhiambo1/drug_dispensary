


<nav class="nav">
   <div class="contain">
   <img src="images/logo.svg" alt="Logo" class="siteLogo">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_info` 
      WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>
   <div class="userInfo">
      <a href="shop.php"><button>Shop</button></a>
      <a href="prescriptions.php"><button>Your Prescriptions</button></a>
      <a href=
      "index2.php?logout=<?php echo $user_id; ?>" 
         onclick="return 
         confirm('are your sure you want to logout?');" 
         class="logOut">Log out</a>
      <span><?php echo $fetch_user['username']; ?></span>
   </div>
   </div>
   
</nav>