<html>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Suitable Date1:<input type="date" name="d1"><br>
Suitable Date2:<input type="date" name="d2"><br>
<input type="submit" value="submit" name="s">
</form>


<?php

session_start();
    
    $servername=$username=$password=$conn=$db="";
$uname=$_SESSION['login_user'];
    echo $_SESSION['login_user'];
	echo "<br>";
	
	

date_default_timezone_set('Asia/Kolkata');
$currentdate = date('d-m-Y');
//echo $currentdate;
// DATABASE CONNECTIVITY.


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


$sql = "SELECT hospital FROM appointment where uname='$uname'";
	//echo "sdf";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
	{
    
 
    while($row = mysqli_fetch_assoc($result))
	{
		echo "Appropriate Hospital is:";
		echo "<br>";
		$hospital=$row["hospital"];
	}
	echo $hospital;
	echo "<br>";

	}
$date1=$date2="";
if($_POST)
{
	if(isset($_POST['d1']))
	{
		$date1=$_POST['d1'];
	}
	if(isset($_POST['d2']))
	{
		$date2=$_POST['d2'];
	}
	if(isset($_POST['s']))
	{
		if(strtotime($date1)<strtotime($currentdate))
		{
			echo "date is not accepted";
		}
		else
		{
			//echo "date1 accepted";
			if(strtotime($date2)<strtotime($date1))
			{
				echo "date2 is not accepted";
			}
			else
			{
				
				$diff = abs(strtotime($date2) - strtotime($date1));
				$years = floor($diff / (365*60*60*24));
				$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				if($days>7)
				{
					echo "Difference not more than 7 days from current time";
				}
				else
				{
					//echo "date2 is accepted";
					$sql = "UPDATE appointment SET time1='$date1',time2='$date2' WHERE uname='$uname'";

				if ($conn->query($sql) === TRUE) 
				{
					echo "Record updated successfully";
					header("Location:patient.php");
				} 
				else 
				{
					echo "Error updating record: " . $conn->error;
				}

				}
				
				
			}
		}
	}
}





?>

</html>