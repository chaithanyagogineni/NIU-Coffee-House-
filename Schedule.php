<?php
session_start();
include 'top.php';
?>

<!--This Project is done by

Chaithanya Krishna .G  ZID:Z1815642

Rajarshi Sen  ZID:Z1816768

Sumanth Datta Nanduri  ZID:Z1811126

CSCI 566 Databases

SEction-2  Instructor:Georgia Brown
-->
<html>
<head>

<!--Using the style tag to make the elements of HTML look good-->
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
width: 100%;
background-color:red;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;
}
input[type=submit]:hover {
background-color: #45a049;
}
</style>
</head>
</html>

<!--PHP code to insert data into the Database and perform some validations-->

<?php
//Getting the Connection
try
{
$dsn="mysql:host=courses;dbname=z1815642";
$user="z1815642";
$pwd="1994Nov16";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
$pdo=new PDO($dsn,$user,$pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$get_times="select ptime from slot where pdate='$_SESSION[per_date]'";
}
catch(PDOException $e)
{
echo "Cannot establish the connection".$e->getMessage();
}
echo "<center>";
echo "<h1> Almost done.Please enter the Following Details</h1>";
echo "<h1>Step 2</h1>";
echo "<div style= 'border-radius: 5px;background-color: #f2f2f2;padding: 20px;width:700px'>";

//creating the Form that helps to store the member details of teh group

echo "<form action='Schedule.php' method='post'>";
echo "<table>";

//If the number of people in the group is 1.Perform the following

if($_SESSION['people']==1)
{
echo "<tr>";
echo "<td>Enter Name: Name:</td>";
echo "<td><input type='text' name='mem1'></td>";
echo  "</tr>";
}

//If the number of people in the group is 2.Perform the following

else if($_SESSION['people']==2)
{
echo "<tr>";
echo "<td>Enter Member:1 Name:</td>";
echo "<td><input type='text' name='mem1'></td>";
echo  "</tr>";
echo "<tr>";
echo "<td>Enter Member:2 Name:</td>";
echo "<td><input type='text' name='mem2'></td>";
echo  "</tr>";
}

//If the number of people in the group is 3.Perform the following

else if($_SESSION['people']==3)
{
echo "<tr>";
echo "<td>Enter Member:1 Name:</td>";
echo "<td><input type='text' name='mem1'></td>";
echo  "</tr>";
echo "<tr>";
echo "<td>Enter Member:2 Name:</td>";
echo "<td><input type='text' name='mem2'></td>";
echo  "</tr>";
echo "<tr>";
echo "<td>Enter Member:3 Name:</td>";
echo "<td><input type='text' name='mem3'></td>";
echo  "</tr>";
}

//If the number of people in the group is 4.Perform the following

else if($_SESSION['people']==4)
{
echo "<tr>";
echo "<td>Enter Member:1 Name:</td>";
echo "<td><input type='text' name='mem1'></td>";
echo  "</tr>";
echo "<tr>";
echo "<td>Enter Member:2 Name:</td>";
echo "<td><input type='text' name='mem2'></td>";
echo  "</tr>";
echo "<tr>";
echo "<td>Enter Member:3 Name:</td>";
echo "<td><input type='text' name='mem3'></td>";
echo  "</tr>";
echo "<tr>";
echo "<td>Enter Member:4 Name:</td>";
echo "<td><input type='text' name='mem4'></td>";
echo  "</tr>";
}

//After member details add some columns like email,mobile and allow the user to select the time

echo "<tr>";
echo "<td>Enter Email:: </td>";
echo "<td><input type='text' name='mail' ></td>";
echo  "</tr>";
echo "<tr>";
echo "<td>Enter Mobile :+1</td>";

//Since the mobile has 10 digits.set the minimum and maximum

echo "<td><input type='number' name='mobile' min='1000000000' max='9999999999'>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Available Times</td>";

$res=$pdo->query($get_times);
if($res->fetchColumn()==0)
{
echo "<h1>No slots avialable on this date.select other date</h1>";
}
else
{
echo "<td>";
echo "<select name='avail_time'>";
echo "<option value='0'>Select</option>";

//Get the drop down values for the available times


foreach($pdo->query($get_times) as $row)
     {
      echo "<option value='$row[ptime]'>SLOT : $row[ptime]</option>";
     }

echo "</select></td>";
}
echo "</tr>";
echo "<tr>";
echo "<td><input type='submit' name='cancel' value='go back'></td>";
echo "<td><input type='submit' name='submit' value='submit'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo "</div>";

if(isset($_POST['cancel']))
{
try
{
$dsn="mysql:host=courses;dbname=z1815642";
$user="z1815642";
$pwd="1994Nov16";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
$pdo=new PDO($dsn,$user,$pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);	
$delquery="delete from groups where group_id='$_SESSION[pid]'";
$res=$pdo->query($delquery);
}
catch(PDOException $e)
{
echo "unable to establish the connection";
}
}

//If the above created form is submitted and number of people in group is 1.Perform the following

if(isset($_POST['submit'])&&$_SESSION['people']==1)
{
if($_POST['mem1']=="")
echo "<h1>Please enter Member Name</h1>";
else if($_POST['mail']=="")
echo "<h1>Please Enter Mail Address</h1>";
else if($_POST['mobile']=="")
echo "<h1>Please Enter Mobile number of 10 digits</h1>";
else if($_POST['avail_time']==0)
echo "<h1>Must Select The Time</h1>";
else
{

//Getting the connection

try
{
$dsn="mysql:host=courses;dbname=z1815642";
$user="z1815642";
$pwd="1994Nov16";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
$pdo=new PDO($dsn,$user,$pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);	
$insertq1=" insert into member(group_id,member_name,email,mobile_no,ptime) values(?,?,?,?,?);";
$a=$_SESSION['pid'];
$b=$_POST['mem1'];
$c=$_POST['mail'];
$d=$_POST['mobile'];
$e=$_POST['avail_time'];

//Preparing and executing the insert query

$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$b,$c,$d,$e));

//deleted the row with selected date and time,so that it will not show up again for the next group when selecting slot

$delete_query="delete from slot where pdate='$_SESSION[per_date]' and ptime='$e'";
$del_res=$pdo->query($delete_query);
echo "<script type='text/javascript'>";
echo "window.location='Notify.php'";
echo "</script>";
}

//Catching any exceptions generated above

catch(PDOException $e)
{
echo "<h1>Connection is not established</h1>";
}
}
}

//If the above created form is submitted and number of people in group is 2.Perform the following

else if(isset($_POST['submit'])&&$_SESSION['people']==2)
{
if($_POST['mem1']=="")
echo "<h1>Please enter Member Name</h1>";
else if($_POST['mem2']=="")
echo "<h1>Please Enter Member Name</h1>";
else if($_POST['mail']=="")
echo "<h1>Please Enter Mail Address</h1>";
else if($_POST['mobile']=="")
echo "<h1>Please Enter Mobile number of 10 digits</h1>";
else if($_POST['avail_time']==0)
echo "<h1>Must Select The Time</h1>";
else
{

//Getting the Connection

try
{
$dsn="mysql:host=courses;dbname=z1815642";
$user="z1815642";
$pwd="1994Nov16";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
$pdo=new PDO($dsn,$user,$pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);	
$insertq1=" insert into member(group_id,member_name,email,mobile_no,ptime) values(?,?,?,?,?);";
$a=$_SESSION['pid'];
$b=$_POST['mem1'];
$c=$_POST['mail'];
$d=$_POST['mobile'];
$e=$_POST['avail_time'];
$f=$_POST['mem2'];

//Prepare and execute the insert query

$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$b,$c,$d,$e));
$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$f,$c,$d,$e));

//Delete the row with selected date and time.since that row is already booked by group.it will not show up for others.

$delete_query="delete from slot where pdate='$_SESSION[per_date]' and ptime='$e'";
$del_res=$pdo->query($delete_query);
echo "<script type='text/javascript'>";
echo "window.location='Notify.php'";
echo "</script>";
}

//Catching any exceptions generated above

catch(PDOException $e)
{
echo "Unable to establish connection".$e->getMessage();
}
}
}

//If the above created form is submitted and number of people in group is 3.Perform the following

else if(isset($_POST['submit'])&&$_SESSION['people']==3)
{
if($_POST['mem1']=="")
echo "<h1>Please enter Member Name</h1>";
else if($_POST['mem2']=="")
echo "<h1>Please Enter Member Name</h1>";
else if($_POST['mem3']=="")
echo "<h1>Please Enter Member Name</h1>";
else if($_POST['mail']=="")
echo "<h1>Please Enter Mail Address</h1>";
else if($_POST['mobile']=="")
echo "<h1>Please Enter Mobile number of 10 digits</h1>";
else if($_POST['avail_time']==0)
echo "<h1>Must Select The Time</h1>";
else
{

//Getting the Connection

try
{
$dsn="mysql:host=courses;dbname=z1815642";
$user="z1815642";
$pwd="1994Nov16";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
$pdo=new PDO($dsn,$user,$pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);	
$insertq1=" insert into member(group_id,member_name,email,mobile_no,ptime) values(?,?,?,?,?);";
$a=$_SESSION['pid'];
$b=$_POST['mem1'];
$c=$_POST['mail'];
$d=$_POST['mobile'];
$e=$_POST['avail_time'];
$f=$_POST['mem2'];
$g=$_POST['mem3'];

//Preparing and executing the insert query

$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$b,$c,$d,$e));
$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$f,$c,$d,$e));
$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$g,$c,$d,$e));

//Delete the row form the slot table as the slot is booked already

$delete_query="delete from slot where pdate='$_SESSION[per_date]' and ptime='$e'";
$del_res=$pdo->query($delete_query);
echo "<script type='text/javascript'>";
echo "window.location='Notify.php'";
echo "</script>";
}

//Catching any exceptions generated above

catch(PDOException $e)
{
echo "unable to establish the connection".$e->getMessage();
}
}
}

//If the above created form is submitted and number of people in group is 4.Perform the following

else if(isset($_POST['submit'])&&$_SESSION['people']==4)
{
if($_POST['mem1']=="")
echo "<h1>Please enter Member Name</h1>";
else if($_POST['mem2']=="")
echo "<h1>Please Enter Member Name</h1>";
else if($_POST['mem3']=="")
echo "<h1>Please Enter Member Name</h1>";
else if($_POST['mem4']=="")
echo "<h1>Please Enter Member Name</h1>";
else if($_POST['mail']=="")
echo "<h1>Please Enter Mail Address</h1>";
else if($_POST['mobile']=="")
echo "<h1>Please Enter Mobile number of 10 digits</h1>";
else if($_POST['avail_time']==0)
echo "<h1>Must Select The Time</h1>";
else
{

//Getting the connection
try
{
$dsn="mysql:host=courses;dbname=z1815642";
$user="z1815642";
$pwd="1994Nov16";
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	
$pdo=new PDO($dsn,$user,$pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);	
$insertq1=" insert into member(group_id,member_name,email,mobile_no,ptime) values(?,?,?,?,?);";
$a=$_SESSION['pid'];
$b=$_POST['mem1'];
$c=$_POST['mail'];
$d=$_POST['mobile'];
$e=$_POST['avail_time'];
$f=$_POST['mem2'];
$g=$_POST['mem3'];
$h=$_POST['mem4'];

//Preparing and executing the insert query

$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$b,$c,$d,$e));
$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$f,$c,$d,$e));
$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$g,$c,$d,$e));
$stmt=$pdo->prepare($insertq1);
$res=$stmt->execute(array($a,$h,$c,$d,$e));

//After insert details.delete the row from the slot table as it is already booked.

$delete_query="delete from slot where pdate='$_SESSION[per_date]' and ptime='$e'";
$del_res=$pdo->query($delete_query);
echo "<script type='text/javascript'>";
echo "window.location='Notify.php'";
echo "</script>";
}

//Catching any Exceptions generated

catch(PDOException $e)
{
echo "unable to establish Connection".$e->getMessage();
}
}
}
?>