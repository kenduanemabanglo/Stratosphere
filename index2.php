<!DOCTYPE html>
<html style="background-color: #56baed;">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stratosphere 2018</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>
<body>
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <h2 class="active">Forgot Password</h2>
    <div class="fadeIn first">
      <img src="img/icon.svg" id="icon" alt="User Icon" />
    </div>
    <form method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="enter your username">
      <?php include 'database.php';
      if(isset($_POST['lookup'])) {
          $username = $_POST['username'];
          
          $query = "SELECT password FROM login WHERE username = '$username';";
          $get_query = $db->query($query);
          if($get_query->num_rows > 0) {
          while($row = mysqli_fetch_assoc($get_query)) {
            $password = $row['password'];
            echo '<input type="text" id="login" class="fadeIn second" value='.$username.'>';
            echo '<input type="text" id="password" class="fadeIn third" value='.$password.'>';
          }
        }else{
          echo '<div class="alert">';
          echo 'Oops! No matching records found.';
          echo '</div>'; 
        }
      }
    ?>
      
      <input type="submit" class="fadeIn fourth" name="lookup" value="lookup">
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="index.php">Login?</a>
    </div>
  </div>
</div>
</body>
</html>