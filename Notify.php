<?php
session_start();

//This project is done by       Chaithanya Krishna .G    ZID:Z1815642

//Rajarshi Sen   ZID:Z1816768

//Sumanth Datta Nanduri    ZID:Z1811126

//CSCI 566 SEC:2 Time:11:00 to 12:15

//Instructor :Georgia Brown.

//Including the header file

include 'top.php';
echo "<center>";
echo "<h1>Successfully Registered For the Performance.<h1>";
echo "<h1>Your Registration ID is ".$_SESSION['pid'];
echo "</h1>";
echo "<h1>Please Note this For further Uses.</h1>";
echo "</center>";
?>