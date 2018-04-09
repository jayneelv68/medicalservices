<html>
<?php
session_start();
    
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
        $sql="UPDATE doctors SET $col='$val' WHERE uname='$uname';";
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
                <option  value = "fname">First Name</option>
                <option  value = "lname">Last Name</option>
                <option  value = "mobile">Mobile</option>
                <option  value = "did">Doctor ID</option>
                <option  value = "email">Email</option>
</select>
Value:<input type="text" name="tex">

<button type="submit" name="d">Update</button>
</html>
