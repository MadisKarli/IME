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
        <p id = "login">Logi sisse: valik1, valik2, valik3</p>
      </div>
      <div id = "raam2">
         <p>
          <?php
            include_once  'funktsioonid.php';
            kandideeri($_POST["eesnimi"], $_POST["perenimi"], $_POST["piirkond"], $_POST["partei"]);
          ?>
         </p>
      </div>
    </body>
</html>