<!DOCTYPE html> 
<html>
    <head>
      <meta charset="utf-8">
      <title>Kandideerimine</title>
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
      <div id = "plakatid">
          <script src="kasautentitud.js"></script>
          <?php
              include_once  'funktsioonid.php';
              $conn = connectAndBegin();
          ?>
         <form action="kandideeriserver.php" method="post">
            Eesnimi: <input type="text" name="eesnimi"><br>
            Perenimi: <input type="text" name="perenimi"><br>

            Piirkond: <select id="piirkond" name="piirkond">
                        <?php
                            getPiirkond($conn);
                        ?>
                      </select><br>
            Erakond: <select id="partei" name="partei">
                        <?php
                            getErakond($conn);
                        ?>
                    </select><br>
            <input type="submit" value="Kandideeri!">
        </form>
      </div>
    </body>
</html>