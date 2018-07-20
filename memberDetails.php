<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Bravo Hospital | Member Details</title>
<link rel="shortcut icon" href="HospLogo.png" type="image/icon">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include("db_connect.php");
	$username = $_SESSION['username'];
	$view_sql = "SELECT * FROM bravoUserInformation WHERE email = '$username'";
	$view_query = mysql_query($view_sql);
	$row = mysql_fetch_assoc($view_query);
?>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body class="BackgroundColor">

<div id="wrapper">
<div id="Menu">
	<?php
    	if($_SESSION['login'] == true){
			echo '<a href="memberDetails.php">'.$_SESSION['username'].'</a> | <a href="logout.php">Logout</a>';
		}
		else{
		echo '<a href="login.php">Login</a> | <a href="signup.php">Register</a>';
		}
    ?>
</div>
<div class="logobackground">
</div>
<div class="logo">
<img src="HospLogo.png" width="137" height="121" alt="HospLogo" /></div>

<div id="navbar">
<div id="holder">

<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="payment.php">Payment</a></li>
<li><a href="appointment.php">Appointment</a></li>
<li><a href="contact.php">Contact</a></li>

</ul>

</div><!-- end of holder div -->

</div><!-- end of navbar div -->
<div class="memberDetailsbackground">
</div>
<div class="horizontalLineAppt"></div>
<div class="horizontalLineAppt2"></div>
<div id="searchBar">
  <form id="tfnewsearch" method="get" action="http://www.google.com">
          <input type="text" class="tftextinput" size="25" maxlength="100"><input type="submit" value="search" class="tfbutton">
</form></div>
<div id="bottomMenuMember"><div id="footerTextMember">Copyright(c) 2014-Bravo Hospital. All rights reserved.</div></div>

<div id="addressBox">Bravo Hospital </br>600 Upper Thomson Rd</br> Singapore 574421</div>

</div><!-- end of wrapper div -->

<?php
	if($_SESSION['admin'] == true){
		echo'<div id="navbarTop">';
	} else{
		echo'<div id="navbarTop" style="left:739px;">';
	}
?>
<div id="holderTop">

<ul>
<?php
	if($_SESSION['admin'] == true){
		echo '<li><a href="adminPage.php">Admin Function</a></li>';
	}
?>
<li><a href="drdirectory.php">Doctor Directory</a></li>
<li><a href="services.php">Services</a></li>

</ul>

</div><!-- end of holderTop div -->

</div><!-- end of navbarTop div -->

<div class="memberDetails">
<h1> Member Details </h1>
<form action="changeDetails.php" method='post'>
<table width="400" border="0">
<div id="arial">
  <tr>
    <td>Last Name:</td>
    <?php echo"<td>: ".$row['l_name']."</td>"
    ?>
  </tr>
    <tr>
    <td>First Name:</td>
    <?php echo"<td>: ".$row['f_name']."</td>"
    ?>
  </tr>
    <tr>
    <td>E-mail:</td>
        <?php echo"<td>: ".$row['email']."</td>"
    ?>
  </tr>
    <tr>
    <td>Sex:</td>
        <?php echo"<td>: <span style='text-transform: uppercase' type='text'>".$row['gender']."</span></td>"
    ?>
  </tr>
    <tr>
    <td>Contact Number:</td>
        <?php echo"<td>: ".$row['contact']."</td>"
    ?>
  </tr>
    <tr>
    <td>Total Charge:</td>
        <?php echo"<td>: $".$row['cost']."</td>"
    ?>
  </tr>
  </div>
</table>
<br />
<input type="submit" name="transiting" value="Edit Details" />
</form>
<br /><br />

</div>


</body>
</html>
