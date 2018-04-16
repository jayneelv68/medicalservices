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
        $nameerr1=$nameerr2=$contacterr=$iderr=$emailerr=$passerr1=$passerr2=$uname="";
        $mob;
        $fname=$_GET["uname"];
        if(empty($fname))
        {
            $nameerr1="Name is empty";
            echo("Name is not filled");
            //echo $nameerr;
        }
        $lname=$_GET["fname"];
        if(empty($lname))
        {
            $nameerr2="Name is empty";
            echo("Name is not filled");
            //echo $nameerr;
        }
        
        $dif=$_GET["dif"];
        if(empty($dif))
        {
            $iderr="ID is empty";
            echo("ID is not filled");
            //echo $nameerr;
        }
        $email=$_GET["email"];
        $pattern1="/^[a-zA-Z0-9]{2}[a-zA-Z0-9_.+-]*[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
        if(!preg_match($pattern1,$email))
        {
            $emailerr="Entered email address is not proper";
            echo("Entered email address is not proper") ;
        }
        
        $psw=$_GET["psw"];
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
        
        $pswrep=$_GET["psw-repeat"];
        if($passvalue1==$pswrep)
        {
            echo "Password accepted";
        }
        else
        {
            $passerr2="Password doesn't match";
            echo "Password doesn't match";
        }
        $remember=$_GET["remember"];
        $uname=$_GET["uname"];
        if(empty($uname))
        {
            $unameerr1="uname is empty";
            echo("uname is not filled");
            //echo $nameerr;
        }
       // $mob=$_GET["mob"];
        //$pattern="/d{10}/";
        //if(!preg_match($pattern,$mob))
        //{
         //   $contacterr="Entered contact is not proper";
          //  echo("Entered contact is not proper");
            
        //}
        //echo $namerr1.$namerr2.$iderr.$contacterr.$cityerr.$passerr1.$passerr2.$uname.$unamerr1;
        //Echo "validation of fields left.";
        $mob=9978996060;
        if($nameerr1=="" && $nameerr2=="" && $iderr=="" && $contacterr=="" && $cityerr=="" && $passerr1=="" && $passerr2=="" && $unameerr1=="")
        {
            $sql = "INSERT INTO doctors VALUES('$fname','$lname','$mob','$dif','$email','$psw','$uname');";
            if ($conn->query($sql) == TRUE) {
                echo "New record created successfully";
                
                logincheck($uname,$psw);
            }
            else{
                header("location: doctor.php");
            }
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
            echo("Connection failed: " . $conn->connect_error);
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
