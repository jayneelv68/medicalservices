<html>
<?php
session_start();
if($_GET){

if(isset($_GET["a"])){a();}
if(isset($_GET["d"])){d();}
if(isset($_GET["l"])){l();}

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

function a()
{
}


?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

  <button type="submit" name="d">Display</button>
  
<button type="submit" name="l">Logout</button>
</form>

</html>
