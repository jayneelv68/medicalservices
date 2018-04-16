<html>
<body>
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
if($_GET){

if(isset($_GET["d"])){update();}
    
}
    
    
    function update()
    {
        global $uname;
        Global $servername,$username,$password,$conn,$db;
databaseconn();

    $col=$_GET['col'];
    $val=$_GET['tex'];
        $sql="UPDATE patientdetail SET $col='$val' WHERE uname='$uname';";
        echo $sql;
$result = $conn->query($sql);
if(mysqli_affected_rows($conn) > 0)
    {
     Echo"updated";
}
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

<select name='col' size="1">
                <option  value = "p_name">Name</option>
                <option  value = "p_contact">Contact</option>
                <option  value = "p_email">email</option>
                <option  value = "p_medicine1">Any_Disease1</option>
                <option  value = "p_medicine2">Any_Disease2</option>
				<option  value = "p_address">Address</option>
				
</select>
Value:<input type="text" name="tex">

<button type="submit" name="d">Update</button>
</body>

</html>