<?php
session_start();

//This Project is done by

//Chaithanya Krishna G  ZID:Z1815642

//Rajarshi Sen  ZID:Z1816768

//Sumanth Datta Nanduri  ZID:Z1811126

//CSCI 566 -Databases.

//Section-2 Instructor:Georgia Brown

//Including the header file required

include 'top.php';
?>
<html>
<head>

<!--Style tag to make the elements look good-->

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

input[type=submit]:hover {
background-color: #45a049;
}


</style>
</head>
</html>

<!--Php code to connect to Databases and Perform Validations-->

<?php
echo "<center>";
echo "<h1>Hello,We need Some Basic Information.You are 2 Steps away.</h1>";
echo "<h1> Step 1</h1>";
echo "<div style= 'border-radius: 5px;background-color: #f2f2f2;padding: 20px;width:700px'>";

//Form that helps to enter the text fields

echo "<form action='Register.php' method='post'>";
echo "<table>";
echo "<tr>";
echo "<td><h2>Enter Group  name</h2></td>";
echo "<td><input type='text' name='t1' placeholder='NAME'></td>";
echo "</tr>";
echo "<br>";
echo "<tr>";
echo "<td><h2>Enter Genre Type</h2></td>";
echo "<td><input type='text' name='t2' placeholder='GENRE'></td>";
echo "</tr>";
echo "<br>";
echo "<tr>";
echo "<td><h2>Select Members</h2></td>";
echo "<td><select name='member'>";
echo "<option value='0'>Select</option>";
echo "<option value='1'>1</option>";
echo "<option value='2'>2</option>";
echo "<option value='3'>3</option>";
echo "<option value='4'>4</option>";
echo "</select></td>";
echo "</tr>";
echo "<br>";
echo "<tr>";
echo "<td><h2>Select Date</h2></td>";
echo "<td><input type='date' min='2017-05-01' max='2017-05-31' name='t4'></td>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td>";
echo "<input type='submit' name='submit' value='register'>";
echo "</td></tr></table>"; 
echo "</form>";
echo "</div>";

//If the submit Button is clicked then perform the following

if(isset($_POST['submit']))
{

//If the Group name is not entered ,print the error message

if($_POST['t1']=="")
echo "<h1>Please Enter Your Group Name</h1>";

//If the Genre type is not entered ,Print the error message

else if($_POST['t2']=="")
echo "<h1>Please enter Genre Type</h1>";

//If the number of people is not selected ,Print the error Message

else if($_POST['member']==0)
echo "<h1> Must Select the number of people in Your Team</h1>";

//If the date is not selected,Then print the error message

else if($_POST['t4']=="")
echo "<h1>Please Select date</h1>";

//If every thing is entered,Then create a connection and send the data entered into tables

else
{
 try
    {
       $dsn="mysql:host=courses;dbname=z1815642";
       $user="z1815642";
       $pwd="1994Nov16";
       $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

//Creating new Connection by Calling the PDO COnstrcutor

   	   $pdo=new PDO($dsn,$user,$pwd);


        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

   $insertq1=" insert into groups(group_name,group_genre,number_of_people,pdate) values(?,?,?,?);";

//Getting the For variables into the local variables

   $x=$_POST['t1'];
      $y=$_POST['t2'];
         $z=$_POST['member'];
	 $p=$_POST['t4'];
	 $_SESSION['people']=$z;
	 $_SESSION['per_date']=$p;

//Preparing and executing the queries by passing the values into associative array

   $stmt=$pdo->prepare($insertq1);
      $res=$stmt->execute(array($x,$y,$z,$p));
      $q2="select max(group_id) from groups";

//Setting the SESSION variables

    foreach($pdo->query($q2) as $row)
    {
    $_SESSION['pid']=$row['max(group_id)'];
    }
      }

//Catching the Exception If any generated above

   catch(PDOException $e)
      {
         echo "Connection is not established".$e->getMessage();
	    }
	    

//Java Script to navigate to other page

echo "<script type='text/javascript'>location.href ='Schedule.php'</script>";
}
}
echo "</center>";
?>
