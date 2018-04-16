<html>
<?php
if($_GET){

if(isset($_GET["a"])){a();}
if(isset($_GET["p"])){p();}
if(isset($_GET["d"])){d();}

}

function p()
{
header("Location:patient_login.php");
die();
}

function d()
{
header("Location:doctor.php");
die();
}

function a()
{
header("Location:admin.php");
die();
}


?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  <button type="submit" name="p">Patient</button>
  <button type="submit" name="d">Doctor</button>
<button type="submit" name="a">Admin</button>
</form>

</html>
