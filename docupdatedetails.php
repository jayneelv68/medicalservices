<html>
<?php
    session_start();
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
$uname=$_SESSION['login_user'];
    echo $_SESSION['login_user'];
if($_GET){

if(isset($_GET["d"])){updatee();}
    
}
    
    
    function updatee()
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
