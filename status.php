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
    
    $servername=$username=$password=$conn=$db="";
$uname=$_SESSION['login_user'];
    echo $_SESSION['login_user'];
	echo "<br>";
	
	



Global $servername,$username,$password,$conn,$db;
$servername = "localhost";
$username = "root";
$password = "";
$db="lamp";
// Create connection
$conn=mysqli_connect($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";




$sql = "SELECT ctime FROM appointment where uname='$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) 
	{
		$status=$row["ctime"];
	 
    }
}
if(!empty($status))
{
	echo "Your time is confirmed by the Doctor";
	echo "<br>";
	echo $status;
}	
else 
{
    echo "Your time has not been confirmed by Doctor yet.";
}




?>
</html>
