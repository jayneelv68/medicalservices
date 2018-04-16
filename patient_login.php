<html>


<?php
    session_start();



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



if($_POST){

if(isset($_POST["login"])){login();}
if(isset($_POST["register"])){register();}
if(isset($_POST["d"])){d();}

}
$servername=$username=$password=$conn=$db="";
    $uname=$pass="";
    $name=$email=$psw=$pswrep=$uname=$city="";
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
 $sql="SELECT * from patientdetail where uname = '$arg1' AND p_password='$arg2';";
Echo $sql;
$result = $conn->query($sql);

 $flag=0;
 if(mysqli_num_rows($result) > 0)
    {
     $flag=1;
        $_SESSION['login_user']=$uname;
        header("location: patient.php");
    }

Echo"flag".$flag;
Return $flag;
}




  
Function register()
{
	
	
  
  
Global $servername,$username,$password,$conn,$db,$uname,$pass;
$nameerr=$passerr1=$passerr2=$cityerr="";
 

$name=$_POST["name"];
if(empty($name))
{
	$nameerr="Name is empty";
	echo "Name is not filled";
	//echo $nameerr;
}


$email=$_POST["email"];
$pattern1="/^[a-zA-Z0-9]{2}[a-zA-Z0-9_.+-]*[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
if(!preg_match($pattern1,$email))
{
	$emailerr="Entered email address is not proper";
	echo "Entered email address is not proper" ;
}

$psw=$_POST["psw"];
$uppercase = preg_match('@[A-Z]@', $psw);
$lowercase = preg_match('@[a-z]@', $psw);
$number    = preg_match('@[0-9]@',$psw);

if(!$uppercase || !$lowercase || !$number || strlen($psw) < 8)
{
  $passerr1="Wrong password";
  echo "Wrong password";
}
else
{
	$passvalue1=$psw;
}

$pswrep=$_POST["psw-repeat"];
if($passvalue1==$pswrep)
{
	echo "Password accepted";
}
else
{
	$passerr2="Password doesn't match";
	echo "Password doesn't match";
}
$city=$_POST["city"];
if(empty($city))
{
	$cityerr="Address can't be empty";
	echo "Address can't be empty";
}

$remember=$_POST["remember"];
$uname=$_POST["uname"];
Echo "validation of fields left.";


if($nameerr=="" && $cityerr=="" && $passerr1=="" && $passerr2=="")
{
	
    $sql = "INSERT INTO patientdetail(uname,p_name,p_contact,p_email,p_address,p_password) VALUES('$uname','$name','$mob','$email','$city','$psw');";
    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";
        
        logincheck($uname,$psw);
    }
    else{
        header("location: patient.php");
    }
   
}

}
    
   







?>



// html script starts
<body>
<table>
<tr>
<td>
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

</form>

</td>

<td>
REGISTER
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

<br>
<label for="uname"><b>Username</b></label>
    <input type="text" placeholder="JP9" name="uname" required>

<br>
<label for="fname"><b>Name</b></label>
    <input type="text" placeholder="James " name="name" required>
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
	<label for="city"><b>City</b></label>
    <input type="text" placeholder="ahmedabad" name="city" required>
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
