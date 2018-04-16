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
Appointments:

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<?php
    $servername=$username=$password=$conn=$db="";
    $uname=$_SESSION['login_user']="jay";
    $row=$columnOne=$columnTwo=$columnThree=$columnFour=$columnFive=$up="";
    //echo $_SESSION['login_user'];
    databaseconn();
    $sql="select * from appointment;";
   
    $result = $conn->query($sql);
    // echo $sql;
    if ($result->num_rows > 0) {
        
        echo '<table><tr><td>uname</td><td>Disease Name</td><td>Time1</td><td>Time2</td><td>Confirmed Date</td><td>Doctor ID</td></tr>';
        
        while($row = $result->fetch_assoc()){
            
            $columnOne= $row['uname'];
            $columnTwo = $row['ctime'];
            $columnThree =$row['disease_name'];
            $columnFour =$row['time1'];
            $columnFive =$row['time2'];
$columnSix=$row['hospital'];

            
            $up=$columnOne;
                echo '<tr><td>' . $columnOne . '</td><td>' . $columnThree . '</td><td>'.$columnFour. '</td><td>'.$columnFive. '</td><td>'.$columnTwo.'</td><td>'.$columnSix.'</td></tr>';
        }
        
    }
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
       // echo "Connected successfully";
    }
    
    
