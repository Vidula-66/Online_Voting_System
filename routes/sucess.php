<?php
session_start();
if(!isset($_SESSION['userdata']))
{
 header("location.../");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Vote Success-Online Voting System</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<center>
<div id="headerSection">
<h1>Thank You for Voting!</h1>
<hr>
<p style="font-size:20px;color:green;"><b>Your vote has been recorded successfully.</b></p>
<br>
<a href="dashboard.php"><button style="padding:10px;font-size:18px;background-color:blue;color:white;border-radius:5px;">Go to Dashboard</button></a>
</div>
</center>
</body>
</html>