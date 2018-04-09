<html>
Appointments:

<?php
session_start();
    
    $servername=$username=$password=$conn=$db="";
$uname=$_SESSION['login_user']="jay";
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
