<?php session_start();?>

<!--This Project is Done by
Chaithanya Krishna G ZID:Z1815642
Rajarshi Sen  ZID:Z1816768
Sumanth Datta Nanduri ZID:Z1811126

CSCI 566:Data bases

SECTION:2

TIME:11:00 to 12:15

Instructor:Georgia Brown
-->

<html>
<head>
<center>
<center><h1>CSCI 566 Databases</h1></center>
<center><h2>Spring 2017</h2></center>
<center><h2>NIU COFFEE HOUSE</h2></center>
<hr>

<!--using the style tag to make the elements look good-->

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

input[type=password] {
width: 160%;
padding: 12px 20px;
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
<body bgcolor="saddlebrown">
  <br>
  <center>
  <br>
  <br>
  <div style= 'border-radius: 5px;background-color: #f2f2f2;padding: 20px;width:400px'>

<!--Creating the Form to display the Fields for USER ID and PASSWORD-->

  <form method="post" action="index.php">
  &nbsp;
<table>
  <tr>
   <td style="width:50px"><label for="id">User ID:</label></td>
   <td style="width:100px"><input type="text" id="id" name="t1" placeholder="USER ID"></td>
  </tr>
  <tr>
   <td style="width:50px"><label for="password">Password:</label></td>
   <td style="width:100px"><input type="password" id="pwd" name="t2" placeholder="Password"></td>
  </tr>
  <tr>
   <td ></td><td><input type="submit" value="Login" name="submit"></td>
  </tr>
  <tr>
   <td></td>
   <td> <a href="signup.php">new user sign_up</a></td>
  </tr>
</table>
</form>
     
</div>
</center>
</body>
</html>

<!--PHP code to connect to database and Perform Validations--> 
<?php

//If the submit Button is Clicked then perform the following

     if(isset($_POST["submit"]))
     {
     $host='courses';
     $user='z1815642';
     $pass='1994Nov16';
     $db='z1815642';

//Creating the connection

     $con=mysqli_connect($host,$user,$pass,$db);
     $res=mysqli_query($con,"select * from credentials where user_id='$_POST[t1]' and pwd='$_POST[t2]' ");

//Creating the SESSION variables

     $_SESSION['user']=$_POST['t1'];

//If there exists a row in CREDENTAILS table with usename and password as entered,Then Perform Following

     if($res->num_rows>=1)
  {
  $row = mysqli_fetch_array($res);
  echo "<script type='text/javascript'>";
  echo "window.location='Welcome.php'" ;
  echo "</script>";
  }
  //If the User Id is empty,Then print the error Message
  
  else if($_POST['t1']=="")
  echo "<h1>Please Enter User ID</h1>";

//If the Password is Empty,Then Print the error Message

  else if($_POST['t2']=="")
  echo "<h1>Please enter password</h1>";

  //If there are no rows with user name and password in credentials table.Then print error Message

else
  {
  echo "<h1>Invalid Credentials Try again</h1>";
  }
  }
  ?>


