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
    if($_GET){
        
        if(isset($_GET["c"])){c();}
        if(isset($_GET["d"])){d();}
        if(isset($_GET["l"])){l();}
        if(isset($_GET["update"])){update();}
        
        if(isset($_GET["chat"])){chat();}
        
        if(isset($_GET["cappoint"])){cappoint();}
        if(isset($_GET["vappoint"])){vappoint();}
    }
    function chat()
    {
        
        header("Location: docsoc.php");
        
    }
    function d()
    {
        echo $_SESSION['login_user'];
    }
    
    function l()
    {
        if(session_destroy()) {
            header("Location: index.php");
        }
    }
    
    function c()
    {
        
        header("Location: docchangepassword.php");
    }
    function update()
    {
        
        header("Location: docupdatedetails.php");
    }
    
    function cappoint()
    {
        header("Location: docappoint.php");
    }
    function vappoint()
    {
        header("Location: docvappoint.php");
    }
    ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

<button type="submit" name="d">Display</button>
<button type="submit" name="c">Change Password</button>

<button type="submit" name="update">Update Details</button>

<button type="submit" name="cappoint">Check Appointments</button>

<button type="submit" name="vappoint">View Appointments</button>

<button type="submit" name="chat">Open Chat app</button>
<button type="submit" name="l">Logout</button>
</form>


<?php
    $servername=$username=$password=$conn=$db="";
    $uname=$pass="";
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
        header("location: docchangepassword1.php");
    }

}

function confirmpass($arg1)
{
    global $uname;
    $sql = "UPDATE doctors SET password='$arg1' where uname='$uname';";
	global $conn;
    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
    }
	else
	{
		//error
		echo "confirm password doesn't match";
	}
	
    header("location: ddash.php");
}
    // DATABASE CONNECTIVITY.
    
    Function databaseconn(){
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
        echo "Connected successfully";
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  <b>New Password:<b><input type="text" name="new">
  <b>Confirm Password:<b><input type="text" name="confirm">
  <button type="submit" name="change">Submit</button>
  
</form>
</html>
