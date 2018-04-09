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
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  <button type="submit" name="d">Display</button>
<button type="submit" name="c">Change Password</button>

<button type="submit" name="update">Update Details</button>

<button type="submit" name="cappoint">Check Appointments</button>

<button type="submit" name="l">Logout</button>
</form>

</html>
