<html>



<?php
    session_start();
	if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) 
	{
		;
	}

	else
	{
		echo "<script type='text/javascript'>window.open('index.php');</script>";
	}
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



Appointments:

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<?php
    $servername=$username=$password=$conn=$db="";
    $uname=$_SESSION['login_user'];
    $row=$columnOne=$columnTwo=$columnThree=$columnFour=$columnFive=$up="";
    echo $_SESSION['login_user'];
    databaseconn();
    $sql="select * from appointment WHERE hospital = (select did from doctors where uname='$uname');";
   
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
            
            if($columnTwo == '0000-00-00')
            {$up=$columnOne;
                echo '<tr><td>' . $columnOne . '</td><td>' . $columnThree . '</td><td>' . '
                <button type="submit" name="c1">'.$columnFour.'</button>' . '</td>
                <td>' . '
                <button type="submit" name= "c2">'.$columnFive.'</button>' . '</td></td></tr>';
            }
        }
        
    }
    else {echo "No new appointments to confirm,";}
    
    
    
    //  header("location: docappoint.php");
    
    echo '</table>';
    
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
    function check1()
    {
        global $conn,$columnTwo,$columnOne,$columnFour,$up;
        echo "<br>".$columnOne;
        $sql="UPDATE appointment SET ctime='$columnFour' WHERE uname='$up';";
        $result = $conn->query($sql);
        
        echo "date 1 added.";
    }
    function check2()
    {
        global $conn,$columnTwo,$columnOne,$columnFive,$up;
        $sql="UPDATE appointment SET ctime='$columnFive' WHERE uname='$up';";
        $result = $conn->query($sql);
        
        echo " date 2 added.";
    }
  

    if($_GET){
        
        if(isset($_GET["c1"])){check1();}
        if(isset($_GET["c2"])){check2();}
    }
   
?>
</form>


</html>
