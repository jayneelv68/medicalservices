<html>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<b>Give feedback on software:</b><textarea rows="4" cols="15" name="a"></textarea>
<input type="submit" value="Post" name="b" >

</form>
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
    
	$uname=$_SESSION['login_user'];
    echo $_SESSION['login_user'];
	
$servername = "localhost";
$username = "root";
$password = "";
$db="lamp";
// Create connection
$conn=mysqli_connect($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
	
if($_GET)
{
	if(isset($_GET['a']))
	{
		$f=$_GET['a'];
	}
	if(isset($_GET['b']))
	{
		feedback();
	}
}	

function feedback()
{
	global $f,$conn,$uname;
	echo "asd0";
	$sql = "UPDATE patientdetail SET p_feedback='$f' WHERE uname='$uname'";

				if ($conn->query($sql)===TRUE) 
				{
					echo "Record updated successfully";
				} 
				else 
				{
					echo "Error updating record: " . $conn->error;
				}
}
?>

</html>