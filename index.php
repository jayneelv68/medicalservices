<html>
<?php
if($_GET){

if(isset($_GET["a"])){a();}
if(isset($_GET["p"])){a();}
if(isset($_GET["d"])){a();}

}

function p()
{
header("Location:patient.html");
die();
}

function d()
{
header("Location:doctor.html");
die();
}

function a()
{
header("Location:admin.html");
die();
}


?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  <button type="submit" name="p">Patient</button>
  <button type="submit" name="d">Doctor</button>
<button type="submit" name="a">Admin</button>
</form>

</html>
