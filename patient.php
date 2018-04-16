<html>
<?php
session_start();
if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) 
	{
		;
	}

	else
	{
		echo "<script type='text/javascript'>window.open('index.php');</script>";
	}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lamp";



// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_GET)
{

if(isset($_GET["s"]))
{
	header("Location:symptoms.php");
}
if(isset($_GET["c"]))
{
	header("Location:changepassword.php");
}
if(isset($_GET["u"]))
{
	header("Location:updatedetails.php");
}
if(isset($_GET["g"]))
{
	header("Location:feedback.php");
}
if(isset($_GET["a"]))
{
	header("Location: status.php");
}
if(isset($_GET["l"]))
{
	if(session_destroy()) {
header("Location: main.php"); 
}
}
}




?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  <button type="submit" name="s">Give Symptoms</button>
  <button type="submit" name="c">Change Password</button>
  <button type="submit" name="u">Update Details</button>
  <button type="submit" name="g">Give Feedback</button>
  <button type="submit" name="a">Check appointment status</button>
  <button type="submit" name="l">Logout</button>
</form>
</html>