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
  <div id = "plakatid">
      Nimi: 
      <br>Katsealune nr1<br>
      Piirkond:
      <form method="get" action="http://www.yourwebskills.com/files/examples/process.php">
        <select id="piirkond" name="piirkond">
        <?php
            include_once  'funktsioonid.php';
            $conn = connectAndBegin();
            getPiirkond($conn);
        ?>
        </select>
      </form>

    Partei:
    <form method="get" action="http://www.yourwebskills.com/files/examples/process.php">
      <select id="partei" name="partei">
      <?php
        getErakond($conn);
        $conn->close();
      ?>
      </select>
    </form>
  </div>
</body>
</html>