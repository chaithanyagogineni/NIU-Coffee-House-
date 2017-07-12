<!--This Project is done by 

Chaithanya Krishna .G  ZID:Z1815642
Rajarshi Sen ZID:Z1816768
Sumanth Datta Nanduri ZID:Z1811126

CSCI 566
Section:2
time:11:00 to 12:15
Instructor:Georgia Brown
-->
<html>
<head>
<center>
<center><h1>CSCI 566 Databases</h1></center>
<center><h2>Spring 2017</h2></center>
<center><h2>NIU COFFEE HOUSE</h2></center>
<hr>

<!--USing the style tag to make elements look good-->

<style>
input[type=text] {
width: 160%;
padding: 12px 20px;
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
width: 80%;
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
<body bgcolor="Saddlebrown">
<br>
<center>
<br>
<br>
<div style= 'border-radius: 5px;background-color: #f2f2f2;padding: 20px;width:400px'>

  <!--Creating a Form to allow user to enter email,user name,password-->
  
  <form method="post" action="signup.php">
  &nbsp;
  <table>

  <tr>
  
  <td style="width:50px"><label for="email">Email:</label></td>
  <td style="width:100px"><input type="text" id="mail" name="t1" placeholder="EMAIL"></td>
  </tr>
  <tr>
  <tr>
  
  <td style="width:50px"><label for="id">User Id:</label></td>
  <td style="width:100px"><input type="text" id="id" name="t2" placeholder="USER ID"></td>
  </tr>
  <tr>
  
  <td style="width:50px"><label for="password1">Password:</label></td>
  <td style="width:100px"><input type="password" id="pwd" name="t3" placeholder="PASSWORD"></td>
  </tr>
  <tr>
  
  <td style="width:50px"><label for="password2">Re-Enter:Password-</label></td>
  <td style="width:100px"><input type="password" id="pwd" name="t4" placeholder="PASSWORD"></td>
  </tr>
  <tr>
  <td ><input type="submit" value="Cancel" name="cancel"></td><td><input type="submit" value="Sign Up" name="submit"></td>
  </tr>
  </table>
  </form>
  </div>
  </center>
  </body>
  </html>
<!--PHP code to connect to database and perform validations-->
<?php
   
   //If the button clicked is Cancel.Navigate to index page without entering any data into credentials table

   if(isset($_POST["cancel"]))
   {
   echo "<script type='text/javascript'>";
   echo "window.location='index.php'" ;
   echo "</script>";
   }

   //If the button clicked is submit,Perform the Foillowing
   
   if(isset($_POST["submit"]))
   {
   $host='courses';
   $user='z1815642';
   $pass='1994Nov16';
   $db='z1815642';

   //connecting to PHP
   
   $con=mysqli_connect($host,$user,$pass,$db);

   //If the email id is not entered ,Print errror message
   
   if($_POST['t1']=="")
   {
   echo "<h1>Please enter Your Mail id</h1>";
   }

   //If the user name is null,Print error message
   
   else if($_POST['t2']=="")
   {
   echo "<h1>Please enter Your User id</h1>";
   }

   //If the password is not entered,Print the error message
   
   else if($_POST['t3']=="")
   {
   echo "<h1>Password cannot be empty</h1>";
   }

   //If the Passwords match,Then insert the data into credentials and navigate to login page
   
   else if($_POST['t3']==$_POST['t4'])
   {
   $res=mysqli_query($con,"insert into credentials (email_id,user_id,pwd) values('$_POST[t1]','$_POST[t2]','$_POST[t3]')");
   echo "<script type='text/javascript'>";
   echo "window.location='index.php'" ;
   echo "</script>";
   }

   //If the passwords dont match print the error Message
   
   else
   {
   echo "<h1>Passwords Not Matched</h1>";
   }
}
   ?>

