<html>
Appointments:

<?php
session_start();
    
    $servername=$username=$password=$conn=$db="";
$uname=$_SESSION['login_user']="jay";
    echo $_SESSION['login_user'];
databaseconn();

//$sql1="select did from doctors where uname='$uname'";
//$result = $conn->query($sql1);
//$did=mysqli_fetch_assoc($result);
    $sql="select * from appointment WHERE hospital=(select did from doctors where uname='$uname');";
$result = $conn->query($sql);
    // echo $sql;
    if ($result->num_rows > 0) {
        
        echo '<table><tr><td>uname</td><td>Disease Name</td><td>Time1</td><td>Time2</td>';
        while($row = $result->fetch_assoc()){
            $columnOne= $row['uname'];
            $columnTwo = $row['ctime'];
            $columnThree =$row['disease_name'];
            $columnFour =$row['time1'];
            $columnFive =$row['time2'];
            $columnSix =$row['ctime'];
            
            if($columnTwo == '0000-00-00')
            {$i=0;
            echo '<tr><td>' . $columnOne . '</td><td>' . $columnThree . '</td><td>' . '
                <button type="submit" >'.$columnFour.'</button>' . '</td>
                <td>' . '
                <button type="submit" >'.$columnFive.'</button>' . '</td></td></tr>';
            }
        }
      //  header("location: docappoint.php");
    }
    echo '</table>';

   //echo gettype($row), "\n";
        
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

</html>
