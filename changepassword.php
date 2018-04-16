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
if($_GET)
{

if(isset($_GET["v"]))
{
	$op=$_GET["o"];
    
	verify($_SESSION['login_user'],$op);
}

}


$flag=0;
function verify($arg1,$arg2)
{
	global $conn,$op,$flag;
    //query that authenticates old password
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db="lamp";
    // Create connection
    $conn=mysqli_connect($servername, $username, $password,$db);
    $f1="";
    $sql="SELECT * from patientdetail where uname = '$arg1' AND p_password='$arg2'";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0)
    {
		echo "verified";
		header("Location:changepassword1.php");
	}
	else
	{
        print_r($result);
		echo "Wrong";
	}
}


?>
<?php
    if($_GET){
        
        if(isset($_GET["c"])){c();}
        if(isset($_GET["d"])){d();}
        if(isset($_GET["l"])){l();}
        
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
        
        header("Location: changepassword1.php");
    }
    
    
    ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

<button type="submit" name="d">Display</button>
<button type="submit" name="c">Change Password</button>
<button type="submit" name="l">Logout</button>
</form>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  <b>Old Password:<b><input type="text" name="o">
  <button type="submit" name="v">Verify</button><br>
  
  
</form>

</html>
