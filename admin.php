<html>


<?php
    session_start();
databaseconn();
if($_POST){

if(isset($_POST["login"])){login();}
if(isset($_POST["register"])){register();}
if(isset($_POST["d"])){d();}

}
$servername=$username=$password=$conn=$db="";
    $uname=$pass="";
    $fname=$lname=$dif=$email=$psw=$pswrep=$uname="";
    $mob=0;


Function login()
{
Global $servername,$username,$password,$conn,$db,$uname,$pass;

$uname=$_POST["uname"];
$pass=$_POST["psw"];
$remember=$_POST["remember"];

If($remember=="on"){ echo" save session or cookie.";}

Echo" check in database";
$flag=logincheck($uname,$pass);
Echo $flag;
if($flag==1){ echo" login successful, save cookie and direct to dashboard";
setscookie();
dashboard();
}
Else { echo" login unsuccessful.";  echo "Error: "  . "<br>" . $conn->error;}
}


Function logincheck($arg1,$arg2)
{
 Global $servername,$username,$password,$conn,$db,$uname,$pass;
 $sql="SELECT * from admin where uname = '$arg1' AND pass='$arg2';";
Echo $sql;
$result = $conn->query($sql);

 $flag=0;
 if(mysqli_num_rows($result) > 0)
    {
     $flag=1;
        $_SESSION['login_user']=$uname;
        header("location: adash.php");
    }

Echo"flag".$flag;
Return $flag;
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



// html script starts
<body>
LOGIN
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
<br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
<br>
    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

    <span class="psw">Forgot <a href="docfpass.php">password?</a></span>
 
</form>



</body>
</html>
