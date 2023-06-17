<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Playverse - Login</title>
  <link rel="stylesheet" href="pv.css">
</head>
<body>

  <header>
    <div class="header-container">
      <div class="left-section">
        <a href="index.php"><img src="pv_logo.png" alt="Playverse Logo"></a>
      </div>
        <form action="search_result.php" method="POST">
          <div class="search-bar">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit"><img src="placeholder.png" alt="Search"></button>
          </div>
        </form>
    </div>
    <div class="playcoins">
  <div class="playcoin-button">
    <span class="playcoin-letter">Playcoins: <?php echo (isset($_SESSION['email'])) ? $_SESSION['playcoins'] : '0'; ?></span>
  </div>
  <div class="playcoin-button">
    <span class="playcoin-letter">Playgems: <?php echo (isset($_SESSION['email'])) ? $_SESSION['playgems'] : '0'; ?></span>
  </div>
</div>
    <nav>
    <ul id="login_register">
        <?php
          if (isset($_SESSION['email'])) {
              echo '<li><a href="profile.php"><img src="placeholder.png" alt="Profile">Profile</a></li>';
              echo '<li><a href="logout.php"><img src="placeholder.png" alt="Logout">Logout</a></li>';
          } else {
              echo '<li><a href="register.php"><img src="placeholder.png" alt="Register">Register</a></li>';
              echo '<li><a href="login.php"><img src="placeholder.png" alt="Login">Login</a></li>';
          }
        ?>
    </ul>
    </nav>
  </header>

  <main>
    <form class="register_login" action="login_entry.php" method="POST">
      <h1>Login</h1>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      
      <button class="input" type="submit">Login</button>
    </form>
  </main>

  <footer>
    <div id="footer">
      <p>&copy; 2023 Playverse. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
