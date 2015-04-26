<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
    <table id="myTable" cellpadding="2" cellspacing="2" border="1" onclick="tester()">

    </table>
<script>
var student;
for(var j=0;j<10;j++)
    {
 student = {
            name : "Name"+j,
            rank: "Rank"+j,
            stuclass:"Class"+j,
           }; 
 var table = document.getElementById("myTable");
 var row = table.insertRow(j);
 var cell1 = row.insertCell(0);
 var cell2 = row.insertCell(1); 
 var cell3 = row.insertCell(2);

cell1.innerHTML =student.name,
cell2.innerHTML =student.rank,
cell3.innerHTML=student.stuclass;
    }
</script>
   <p>
         <?php
            include_once  'funktsioonid.php';
            $conn = connectAndBegin();
            getStatistics($conn);
            $conn->close();
          ?>
         </p>

</body>
</html>