<html>
  <head>
  <meta charset="utf-8">
    <title>Statistika</title>
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
          $eesnimi = $_GET["eesnimi"];
          $perenimi = $_GET["perenimi"];
          $piirkonnanimi = $_GET["piirkond"];
          $parteinimi = $_GET["partei"];
          echo "Eesnimi: ".$eesnimi."<br>";
          echo "Perenimi: ".$perenimi."<br>";
          echo "Piirkond: ".$piirkonnanimi."<br>";
          echo "Partei:".$parteinimi."<br><br><br>";
          kandideeri($eesnimi, $perenimi, $piirkonnanimi, $parteinimi);
      ?>
     </p>
  </div>
  </body>
</html>