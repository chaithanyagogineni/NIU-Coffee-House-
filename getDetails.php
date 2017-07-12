<?php
session_start();
include "top.php";
?>

<!--This project is done by

Chaithanya Krishna G  ZID:Z1815642

Rajarshi Sen ZID:Z1816768

Sumanth Datta Nanduri  ZID:Z1811126

CSCI 566 Databases Sec:2

Instructor:Georgia Brown
-->

</html>
<head>

<!--STyle tag used to make the HTML elements look good-->
  <style>
  input[type=text] {
  width: 160%;
  padding:12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
          }
  input[type=submit] {
  width: 120%;
  background-color:red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  }
  </style>
  </head>
  </html>

<!--PHP code used to get the details of the selected group and also helps to performs the validations-->

<?php
echo "<center>";
echo "<br>";
echo "<div style= 'border-radius: 5px;background-color: #f2f2f2;padding: 20px;width:700px'>";

//Creating a form that helps users to enter their registration id

echo "<form action='getDetails.php' method='post'>";
echo "<table>";
echo "<tr>";
echo "<td><h1>Enter Your Registration ID:</h1></td>";
echo "<td><Input type='number' name='t1' min='1'></td>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td><input type='submit' name='submit' value='Get Details'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo "</div>";

//If the Form created above is submitted.Then Perform the following

if(isset($_POST['submit']))
{

//If the text field in the form is not entered .Then perform the following

if($_POST['t1']=="")
{
echo "<h1>Please enter a Registration ID</h1>";
}
else
{

//Creating the COnnection

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

//Query to get the detaisl of specific group

$query1="select * from groups where group_id='$_POST[t1]'";
$res=$conn->query($query1);

//If there are no rows with mentioned id .then print the error message

 if($res->fetchColumn()==0)
  {
  echo "<h1>Sorry.No details Found.Make sure You entered the correct Registartion ID</h1>";
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
}
echo "</table>";
}

//Catching any Exceptions generated above

catch(PDOException $e)
{
echo "Unable to establish Connection".$e->getMessage();
}

}
}
?>