<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Playverse</title>
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
  <div class="left-column">
<nav>
  <h2>Categories</h2>
  <label class="popup">
    <input type="checkbox">
    <div class="burger" tabindex="0">
      <span></span>
      <span></span>
      <span></span>
    </div>
</label>

      <?php
        include("db_connection.php");

        $query = "SELECT * FROM GENRE";
        $result = mysqli_query($con, $query);

        echo '<ul id="genre">';
        while ($row = mysqli_fetch_assoc($result)) {
            $genreId = $row['ID_GENRE'];
            $genreName = $row['GENRE_NAME'];
            $genreImage = $row['GENRE_IMAGE'];
        echo '<li><a href="search_result.php?genre_id=' . $genreId . '"class="myButton"><img src="' . $genreImage . '">' . $genreName . '</a></li>';
        }
        echo '</ul>';

        mysqli_close($con);
      ?>
    </nav>
  </div>

  <main>

    <?php
      include("db_connection.php");

        $query = "SELECT * FROM game_data";
        $result = mysqli_query($con, $query);

      echo '<ul id="games">';
        while ($row = mysqli_fetch_assoc($result)) {
            $gameId = $row['ID_GAME'];
            $gameData = $row['GAME_DATA'];
            $gameImage = $row['GAME_IMAGE'];
            echo '<li><a href="' . $gameData . '"><img src="' . $gameImage . '"alt="placeholder.png"></a></li>';
        }
      echo '</ul>';

      mysqli_close($con);
    ?>
  </main>
  <footer>
    <div id="footer">
      <p>&copy; 2023 Playverse. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
