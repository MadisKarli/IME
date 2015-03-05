<?php
function connectAndBegin()
{
         $connectionInfo = array("UID" => "login@p1v3drpkfn", "pwd" => "Tiivad123", "Database" => "andmed", "LoginTimeout" => 30, "Encrypt" => 1,
                                        "CharacterSet"  => 'UTF-8');
         $serverName = "tcp:p1v3drpkfn.database.windows.net,1433";
         $conn = sqlsrv_connect($serverName, $connectionInfo);
         if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
            }
        if ( sqlsrv_begin_transaction( $conn ) === false ) {
         die( print_r( sqlsrv_errors(), true ));
       } 
        return $conn;
}
function getStatistics($conn){
//leiame kandidatuurid
//JOIN
        $sql = "SELECT eesnimi, perenimi, haali, partei.nimi, piirkond.pnimi FROM kandidaat JOIN partei ON kandidaat.erakond = partei.id JOIN piirkond ON piirkond.id = kandidaat.piirkond ORDER BY perenimi, eesnimi asc";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          echo "nimi: ".$row['perenimi'].", ".$row['eesnimi']." | hääli: ".$row['haali']." | erakond: ".$row['nimi']." | piirkond: ".$row['pnimi']."<br>";
        }
        sqlsrv_free_stmt( $stmt);
//GROUP BY      
        echo "<br>"."Erakondade kandidaatide arv"."<br>"."<br>";

        $sql = "SELECT partei.nimi, COUNT(erakond) AS kandidaate FROM kandidaat join partei on kandidaat.erakond = partei.id
GROUP BY partei.nimi, partei.nimi ORDER BY kandidaate desc";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          echo "erakond: ".$row['nimi']." |   kandidaate: ".$row['kandidaate']."<br>";
        }
        sqlsrv_free_stmt( $stmt);
}
function getPiirkond($conn){
    $sql = "SELECT pnimi FROM piirkond order by id asc";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
          }
          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $piirkond = $row['pnimi'];
            echo "<option>$piirkond</option>";
            }
          sqlsrv_free_stmt( $stmt);
}
function getErakond($conn){
    $sql = "SELECT nimi FROM partei";
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
          die( print_r( sqlsrv_errors(), true) );
        }
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
          $erakond = $row['nimi'];
          echo "<option>$erakond</option>";
        }
        sqlsrv_free_stmt( $stmt);
}
function kandideeri($eesnimi, $perenimi, $piirkonnanimi, $parteinimi){
          $conn = connectAndBegin();
//parteiID
          $sql = "SELECT id FROM partei where nimi = '{$parteinimi}'";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
            }
          $lst1 = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
          $erakonnaID = $lst1["id"];

          
//piirkonnaID
          $sql = "SELECT id FROM piirkond where pnimi = '{$piirkonnanimi}'";
          $stmt = sqlsrv_query( $conn, $sql );
          if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
            }
          $lst2 = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
          $piirkonnaID = $lst2["id"];


//commit
          $sql = "INSERT INTO kandidaat VALUES (?, ?, ?, ?, ?)";
          $params = array( $eesnimi, $perenimi, 0, $erakonnaID, $piirkonnaID);
          $stmt = sqlsrv_query( $conn, $sql, $params );
          if( $stmt) {
            sqlsrv_commit( $conn );
            echo "Kandideeritud!<br />";
          } else {
            sqlsrv_rollback( $conn );
            echo "Midagi läks valesti :(<br />";
        }
        $conn->close();
}

?>