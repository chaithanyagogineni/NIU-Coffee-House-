<!--This Project is done by 
Chaithanya Krishna G  ZID:Z1815642
Rajarshi Sen  ZID:Z1816768
Sumanth Datta Nanduri  ZID:Z1811126
  -->

<!--CSCI 566 Databases
Section:2
Instructor:Georgia Brown-->


<html>
  <head>
    <center><h1>CSCI 566 Databases</h1>
      <h1>Spring 2017</h1>
      <h1>NIU COFFEE HOUSE </h1>
      <h1 align="right"><?php echo "Welcome ".$_SESSION['user'];?></h1>
    </center>
    <hr>

    <!--Style tag to make elements like lists appear as color,bold so that they resemble naviagtion menu-->
    <style>
      ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color:saddlebrown;
      }
      li {
      float: left;
      }
      li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      }
      li a:hover {
      background-color: #111;
      }
    </style>

  </head>

  <!--Body of the File-->

  <body bgcolor="saddlebrown">


    <!--List to dispaly as navigation Menu-->

    <ul>
      <li><a class="active" href="Welcome.php">Home</a></li>
      <li><a href="Register.php">Register For Performance</a></li>
      <li><a href="getDetails.php">View Performance Details</a></li>
      <li><a href="listAll.php">List all Performances</a></li>
      <li><a href="Exit.html">Exit</a></li>
    </ul>
    <br>
    
  </body>
  </html>
