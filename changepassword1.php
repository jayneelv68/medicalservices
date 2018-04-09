<html>
<?php
 session_start();
    $servername=$username=$password=$conn=$db="";
    $uname=$password="";
    databaseconn();
    $uname=$_SESSION['login_user'];
    
if($_GET)
{
if(isset($_GET['new']))
{
		$p=$_GET["new"];

if(isset($_GET['confirm']))
{
	$p1=$_GET["confirm"];

if(isset($_GET["change"]))
   {
	confirmpass($p,$p1);
  }
}
}
}

function validatepass($arg1,$arg2)
{
    if($arg1==$arg2){
   
	//$regex="/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";
	
	
	$uppercase = preg_match('@[A-Z]@', $arg1);
$lowercase = preg_match('@[a-z]@', $arg1);
$number    = preg_match('@[0-9]@',$arg1);

if(!$uppercase || !$lowercase || !$number || strlen($arg1) < 8)
{
  echo "wrong";
}
else
{
	confirmpass($arg1);
}
        
        
    }
    else { echo" both need to be same";
        header("location: changepassword1.php");
    }

}

function confirmpass($arg1)
{
    global $uname;
    $sql = "UPDATE patientdetail SET p_password='$arg1' where uname='$uname';";
	global $conn;
    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
    }
	else
	{
		//error
		echo "confirm password doesn't match";
	}
	
    header("location: patient.php");
}
    // DATABASE CONNECTIVITY.
    
    Function databaseconn(){
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
        echo "Connected successfully";
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  <b>New Password:<b><input type="text" name="new">
  <b>Confirm Password:<b><input type="text" name="confirm">
  <button type="submit" name="change">Submit</button>
  
</form>
</html>
