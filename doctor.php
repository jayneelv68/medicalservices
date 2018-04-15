<html>


<?php
    session_start();
databaseconn();
if($_GET){

if(isset($_GET["login"])){login();}
if(isset($_GET["register"])){register();}
if(isset($_GET["d"])){d();}

}
$servername=$username=$password=$conn=$db="";
    $uname=$pass="";
    $fname=$lname=$dif=$email=$psw=$pswrep=$uname="";
    $mob=0;


Function login()
{
Global $servername,$username,$password,$conn,$db,$uname,$pass;

$uname=$_GET["uname"];
$pass=$_GET["psw"];
$remember=$_GET["remember"];

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
 $sql="SELECT * from doctors where uname = '$arg1' AND password='$arg2';";
Echo $sql;
$result = $conn->query($sql);

 $flag=0;
 if(mysqli_num_rows($result) > 0)
    {
     $flag=1;
        $_SESSION['login_user']=$uname;
        header("location: ddash.php");
    }

Echo"flag".$flag;
Return $flag;
}


  
Function register()
{
Global $servername,$username,$password,$conn,$db,$uname,$pass;
    $mob=0;
$fname=$_GET["uname"];
$lname=$_GET["fname"];
$mob=$_GET["mob"];
$dif=$_GET["dif"];
$email=$_GET["email"];
$psw=$_GET["psw"];
$pswrep=$_GET["psw-repeat"];
$remember=$_GET["remember"];
$uname=$_GET["uname"];
Echo "validation of fields left.";
    $sql = "INSERT INTO doctors VALUES('$fname','$lname','$mob','$dif','$email','$psw','$uname');";
    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
        
        logincheck($uname,$psw);
    }
    else{
        header("location: doctor.php");
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



// html script starts
<body>
<table>
<tr>
<td>
LOGIN
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
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

</td>

<td>
REGISTER
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

<br>
<label for="uname"><b>Username Name</b></label>
    <input type="text" placeholder="James" name="uname" required>

<br>
<label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Jayneel " name="fname" required>
<br>
<label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Vora" name="lname" required>
<br>
<label for="mobile"><b>Mobile Number</b></label>
    <input type="text" placeholder="9978996060 " name="mob" required>
<br>

<label for="dif"><b>Doctor ID</b></label>
    <input type="text" placeholder="13141" name="dif" required>
<br>



        <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
<br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
<br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
<br>
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
<br>
      <button type="submit" name="register">Sign Up</button>
    </div>
  </div>
</form>

</td>
</tr>




</body>
</html>
