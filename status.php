<html>
<?php
session_start();
    
    $servername=$username=$password=$conn=$db="";
$uname=$_SESSION['login_user'];
    echo $_SESSION['login_user'];
	echo "<br>";
	
	



Global $servername,$username,$password,$conn,$db;
$servername = "localhost";
$username = "root";
$password = "";
$db="lampt";
// Create connection
$conn=mysqli_connect($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";




$sql = "SELECT confirm_time FROM appointment where uname='$uname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) 
	{
		$status=$row["confirm_time"];
	 
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