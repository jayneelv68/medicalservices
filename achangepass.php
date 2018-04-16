<html>
<html>
<?php
    session_start();
    
    if($_GET){
        
        if(isset($_GET["c"])){c();}
        if(isset($_GET["d"])){d();}
        if(isset($_GET["l"])){l();}
        if(isset($_GET["update"])){update();}
        
        if(isset($_GET["cappoint"])){cappoint();}
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
        
        header("Location: achangepass.php");
    }
    function update()
    {
        
        header("Location: addsymp.php");
    }
    
    function cappoint()
    {
        header("Location: aappoint.php");
    }
    ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

<button type="submit" name="d">Display</button>
<button type="submit" name="c">Change Password</button>

<button type="submit" name="update">Add Disease Values</button>

<button type="submit" name="cappoint">Check Appointments</button>

<button type="submit" name="l">Logout</button>
</form>

</html>


<?php
    
    if(isset($_GET["lo"]))
    {
        $uname=$_GET["uname"];
        $pass=$_GET["pass"];
        if(isset($_GET["gender"]) )$val=$_GET["gender"];
           else $val="";
        
        
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@',$pass);
        
        if(!$uppercase || !$lowercase || !$number || strlen($pass) < 8)
        {
            echo "wrong";
        }
        else
        {
            $sql="";
            echo $val;
            if($val=="p"){
                $sql="UPDATE patientdetail SET p_password='$pass' WHERE uname='$uname'";
               
            }
            if($val=='d'){
                $sql="UPDATE doctors SET password='$pass' WHERE uname='$uname'";
            }
            
            
            
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db="lamp";
            // Create connection
            $conn=mysqli_connect($servername, $username, $password,$db);
            $result = $conn->query($sql);
            Echo "updated";
        }
        
    }
    
    
    
    ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

<input type="radio" name="gender" value="p"> Patient<br>
<input type="radio" name="gender" value="d"> Doctor<br>

Username:<input type="text" name="uname" required>
Password:<input type="text" name="pass" required>
<button type="submit" name="lo">Update</button>
</form>
</html>
