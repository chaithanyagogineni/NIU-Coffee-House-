<?php
session_start();

//This assignment is done by Chaithanya Krishna G  ZID:Z1815642

//Rajarshi Sen  ZID:Z1816768

//Sumanth Datta Nanduri  ZID:Z1811126

//CSCI 566 SEC:2 Instructor:Georgia Brown

//Including the header file required

include "top.php";
echo "<center>";
echo "<br>";

//creating the connection to retrieve the details of the groups that are registered.

try
{
$dsn="mysql:host=courses;dbname=z1815642";
$user="z1815642";
$pwd="1994Nov16";

//Creating the Connection with the help of PDO Constructor

$conn=new PDO($dsn,$user,$pwd);

//Setting the Attributes of PDO

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//Query to get the group Details from table

$query1="select * from groups";
$res=$conn->query($query1);

//If there are no columns then print Error Message

if($res->fetchColumn()==0)
 {
 echo "<h1>No One Registered For the Performance</h1>";
 }
else
{
echo "<table border=1>";
echo "<tr>";
echo "<th>Group Id</th>";
echo "<th>Name</th>";
echo "<th>Genre</th>";
echo "<th>People</th>";
echo "<th>Members</th>";
echo "<th>Email</th>";
echo "<th>Mobile</th>";
echo "<th>Date</th>";
echo "<th>Time</th>";
echo "</tr>";
foreach($conn->query($query1) as $row)
     {
     echo "<tr>";
     echo "<td>";
     echo $row['group_id'];
     echo "</td>";
     echo "<td>";
     echo $row['group_name'];
     echo "</td>";
     echo "<td>";
     echo $row['group_genre'];
     echo "</td>";
     echo "<td>";
     echo $row['number_of_people'];
     echo "</td>";
     echo "<td>";
     $query2="select member_name from member where group_id='$row[group_id]'";
     foreach($conn->query($query2) as $row1)
     {
     echo $row1['member_name'];
     echo "<br>";
     }
     echo "</td>";
      $query2="select distinct(email) from member where group_id='$row[group_id]'";
     
     echo "<td>";
     foreach($conn->query($query2) as $row2)
     {
     echo $row2['email'];
     }
     echo "</td>";
     $query3="select distinct(mobile_no) from member where group_id='$row[group_id]'";
     echo "<td>";
     foreach($conn->query($query3) as $row3)
     {
     echo $row3['mobile_no'];
     }
     echo "</td>";
     echo "<td>";
     echo $row['pdate'];
     echo "</td>";
     $query4="select distinct(ptime) from member where group_id='$row[group_id]'";
     echo "<td>";
     foreach($conn->query($query4) as $row4)
     {
     echo $row4['ptime'];
     }
     echo "</td>";
     echo "</tr>";
}
echo "</table>";
}
}

//Catching any Exceptions generated above

catch(PDOException $e)
{
echo "Unable to establish Connection".$e->getMessage();
}

?>
