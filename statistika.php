<!DOCTYPE html> 
<html>
  <head>
      <meta charset="utf-8">
      <title>Statistika</title>
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <div id = "top">
        <p id = "avalehtnupp"><a href = "index.html">avaleht</a></p>
        <p id = "login">Logi sisse: <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
        </fb:login-button></p>
        <a id="logout" onclick="FB.logout(function() { document.location.reload(); });"></a>
        <script src="autentimine.js"></script>
      </div>
      <div id = "raam2">
         <p>
          <?php
            include_once  'funktsioonid.php';
            $conn = connectAndBegin();
            getStatistics($conn);
            $conn->close();
          ?>
         </p>
      </div>
  </body>
</html>