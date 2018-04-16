
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

<?php
if(isset($_GET["cappoint1"])){submit();}

Function submit()
{
$c1=$_GET["c1"];
$c2=$_GET["c2"];
$c3=$_GET["c3"];
$c4=$_GET["c4"];
$c5=$_GET["c5"];
$c6=$_GET["c6"];
$c7=$_GET["c7"];
$c8=$_GET["c8"];
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


$sql=" Insert into symptoms VALUES('$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8');";
$result = $conn->query($sql);
Echo "Added";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

<br>
<label for="prob"><b>Problem</b></label>
    <input type="text" name="c1" required>
<br>
<label for="prob"><b>Symptom 1</b></label>
    <input type="text" name="c2" required>
<br>
<label for="prob"><b>Symptom 2</b></label>
    <input type="text" name="c3" required>
<br>
<label for="prob"><b>Symptom 3</b></label>
    <input type="text" name="c4" required>
<br>
<label for="name"><b>Disease Name</b></label>
    <input type="text" name="c5" required>
<br>
<label for="rf"><b>riskfactor</b></label>
    <input type="text" name="c6" required>
<br>
<label for="hosp"><b>Hospital</b></label>
    <input type="text" name="c7" required>
<br>
<label for="med"><b>Medicine</b></label>
    <input type="text" name="c8" required>

<button type="submit" name="cappoint1">Add symptoms</button>
