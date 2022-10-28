<!DOCTYPE html>
<html>

<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

td, th {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 6px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>


<?php
include("database.php");
echo"<p><br><br><br><p>";
$db=$conn;

function fetch_data5(){
  global $db;
   $query="SELECT * from waterrecords ORDER BY Timein DESC limit 5";
   $exec=mysqli_query($db, $query);
   if(mysqli_num_rows($exec)>0){
     $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
     return $row;  
         
   }else{
     return $row=[];
   }
 }
 $fetchData= fetch_data5();
 show_data($fetchData);
 
 function show_data($fetchData){
  echo '<table border="1">
         <tr>
             <th>RecordID</th>
             <th>TankID</th>
             <th>Current Water Level</th>
             <th>Tank Location</th>
             <th>Tank Owner</th>
             <th>Time inserted</th>
         </tr>';
 
  if(count($fetchData)>0){
       $sn=1;
       foreach($fetchData as $data){ 
 
   echo "<tr>
           <td>".$data['RecordID']."</td>
           <td>".$data['TankID']."</td>
           <td>".$data['WaterLevel']."</td>
           <td>".$data['TankLocation']."</td>
           <td>".$data['TankOwner']."</td>
           <td>".$data['Timein']."</td>
 
    </tr>";
        
   $sn++; 
      }
 }else{
      
   echo "<tr>
         <td colspan='7'>No Data Found</td>
        </tr>"; 
    }
   echo "</table>";
 }

?>

</table>


</body>
</html>
 