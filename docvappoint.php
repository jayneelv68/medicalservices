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
    //echo $_SESSION['login_user'];
databaseconn();
if(isset($_GET["cancel"])){cancel();}
    function cancel(){
        global $uname;
        Global $servername,$username,$password,$conn,$db;
        
        $sql="DELETE FROM Appointment WHERE uname='$columnOne';";
        $conn->query($sql);
        echo "deleted";
    }
//$sql1="select did from doctors where uname='$uname'";
//$result = $conn->query($sql1);
//$did=mysqli_fetch_assoc($result);
    $sql="select * from appointment WHERE hospital=(select did from doctors where uname='$uname') AND ctime > '0000-00-00';";
$result = $conn->query($sql);
   // echo $sql;
if ($result->num_rows > 0) {
    
    echo '<table>';
    while($row = $result->fetch_assoc()){
        $columnOne= $row['uname'];
        $columnTwo = $row['ctime'];
        echo '<tr><td>' . $columnOne . '</td><td>' . $columnTwo . '</td></tr>';
        }
}
echo '</table>';










        
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
//echo "Connected successfully";
}


?>

</html>
