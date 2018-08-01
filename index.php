
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
    <h2 class="active">Sign In </h2>
    <div class="fadeIn first">
      <img src="img/icon.svg" id="icon" alt="User Icon" />
    </div>
    <?php include 'login.php'; ?> 
    <form method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" autofocus placeholder="username">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" name="login" value="Log In">
    </form>
    <div id="formFooter">
      <a class="underlineHover" href="index2.php">Forgot Password?</a>
    </div>
  </div>
</div>
</body>
</html>