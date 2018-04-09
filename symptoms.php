<!DOCTYPE HTML>  
<html>
<head>
<script>
function setproblem(valueToSet)
{

	var selectObj = document.getElementById("problem");
	for (var i = 0; i < selectObj.options.length; i++) 
	{
        if (selectObj.options[i].value== valueToSet) 
		{
            selectObj.options[i].selected = true;
            return;
        }
    }
}
function setsymptom1(valueToSet)
{
	
	var selectObj = document.getElementById("symptom1");
	
	for (var i = 0; i < selectObj.options.length; i++) {
        if (selectObj.options[i].value== valueToSet) {
            selectObj.options[i].selected = true;
            return;
        }
    }
}

function setsymptom2(valueToSet)
{
	var selectObj = document.getElementById("symptom2");

	for (var i = 0; i < selectObj.options.length; i++) 
	{
        if (selectObj.options[i].value== valueToSet) 
		{
            selectObj.options[i].selected = true;
            return;
        }
    }
}

function setsymptom3(valueToSet){
	//Get select object
	var selectObj = document.getElementById("symptom3");
	//alert("hi");
	for (var i = 0; i < selectObj.options.length; i++) {
        if (selectObj.options[i].value== valueToSet) {
            selectObj.options[i].selected = true;
            return;
        }
    }
}
</script
</head>
<body>
<?php
session_start();
    
    $servername=$username=$password=$conn=$db="";
$uname=$_SESSION['login_user'];
    echo $_SESSION['login_user'];
?> 
<?php
	//prompt function
    function alertmsg($alt_msg){
        echo("<script type='text/javascript'> 
			alert('".$alt_msg."'); </script>");
    }
?>
<?php
	$sql="";
	$Problem=$Symptom2=$Symptom1=$Symptom3="";
	$flag=0;

$servername = "localhost";
$username = "root";
$password = "";
$db="lampt";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	problem:
	<select name="problem" id="problem" oninput="this.form.submit()">
		<option value="Select One">Select one </option>
<?php
	$Problem=$_POST['problem'];
	echo "asfakdngklnsd";
	echo $Problem;
	if(!isset($_POST["problem"])) {
	$sql = "SELECT DISTINCT problem FROM symptom";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<option value=". $row["problem"] .">" . 
					$row["problem"] ."</option>";
		}
		
	}
	}
	if(isset($_POST["problem"])) {
		if(!empty($_POST["problem"])) {
		
		$Problem=$_POST["problem"];
		echo "aa".$Problem;
		$sql = "SELECT DISTINCT problem FROM symptom";
		$result = mysqli_query($conn, $sql);	
		if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<option value=". $row["problem"] .">" . 
					$row["problem"] ."</option>";
			}
		}
		echo("<script type='text/javascript'>
				setproblem('".$Problem."'); </script>");
		
		} 
	
	}
?>  
	</select>
	<br/>
	symptom1: <select name="symptom1" id="symptom1" onchange="this.form.submit()">
		<option value="Select One">Select one </option>
<?php 
	if(isset($_POST["problem"])) {
		echo "dqwdqwd";
		if(!empty($_POST["problem"]) ) {
		$Problem=$_POST["problem"];
		
		$sql = "SELECT DISTINCT symptom1 FROM symptom where problem='$Problem'";
		$result = mysqli_query($conn, $sql);
		  //echo "<option value=\"Select One\">Select one </option>";
		if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<option value=". $row["symptom1"] .">" . 
					$row["symptom1"] ."</option>";
			}
			
		}
		else {
		echo "dqwdqwd";	
				echo "<option value=\"No symptom1\">No symptom1 available...</option>";
				unset($_POST["symptom1"]);				
				$flag=0;				
			}
		echo("<script type='text/javascript'>setproblem('".$Problem."'); </script>");
		} 
	}
?>	
	</select>
	<br/>
	
	symptom2: <select name="symptom2" id="symptom2" onchange="this.form.submit()">
		<option value="Select One">Select one </option>
<?php 

		echo "dqwdqwd";
	if(isset($_POST["problem"]) and isset($_POST["symptom1"])) {
		if(!empty($_POST["problem"]) and !empty($_POST["symptom1"]) ) {
		$Symptom1=$_POST["symptom1"];
		
		$sql = "SELECT DISTINCT symptom2 FROM symptom where problem='$Problem' and symptom1='$Symptom1'";
		$result = mysqli_query($conn, $sql);
		  //echo "<option value=\"Select One\">Select one </option>";
		if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<option value=". $row["symptom2"] .">" . 
					$row["symptom2"] ."</option>";
			}
			
		}
		else {
				echo "<option value=\"No symptom2\">No symptom2 available...</option>";
				unset($_POST["symptom2"]);				
				$flag=0;				
			}
		echo("<script type='text/javascript'>setproblem('".$Problem."'); </script>");
		echo("<script type='text/javascript'>setsymptom1('".$Symptom1."'); </script>");
		} 
	}
?>	
</select>
	<br>
	
	Symptom3: <select name="symptom3" id="symptom3" onchange="this.form.submit()">
		<option value="Select One">Select one </option>
	<?php
		
		
		if(isset($_POST["problem"]) and isset($_POST["symptom1"]) and isset($_POST["symptom2"])) {
		if(!empty($_POST["problem"]) and !empty($_POST["symptom1"]) and !empty($_POST["symptom2"])) {
			$Symptom2=$_POST["symptom2"];
			$Symptom3=$_POST["symptom3"];
			//echo $state;
			$sql = "SELECT  DISTINCT symptom3 FROM symptom where problem='$Problem' and symptom1='$Symptom1' and symptom2='$Symptom2'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				
				echo "<option value=". $row["symptom3"] .">" . $row["symptom3"] ."</option>";
				}
			}
			else {
				echo "<option value=\"No symptom3\">No symptom3 available...</option>";
				
				
			}
		//echo "<script> $(\"#Country\").val(\"$Country\");</script>";
		echo("<script type='text/javascript'>setproblem('".$Problem."'); </script>");
		echo("<script type='text/javascript'>setsymptom1('".$Symptom1."'); </script>");
		echo("<script type='text/javascript'>setsymptom2('".$Symptom2."'); </script>");
		echo("<script type='text/javascript'>setsymptom3('".$Symptom3."'); </script>");
		}
	else{
		echo "not selected";
	}		
	
	}
	
		echo "</select>";
		
	?>
	<br>
	<input type="submit" value="submit" name="s">
	<?php

if(isset($_POST['s']))
{
	global $Problem,$Symptom1,$Symptom2,$Symptom3,$uname,$conn,$sql;
$disease_name=$medicine=$hospital="";
$sql = "SELECT * FROM symptom where problem='$Problem' AND symptom1='$Symptom1' AND symptom2='$Symptom2' AND symptom3='$Symptom3'";
	//echo "sdf";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
	{
    
 
    while($row = mysqli_fetch_assoc($result))
	{
      $disease_name=$row["dieasease_name"];
	  $medicine=$row["medicine"];
	  $hospital=$row["hospital"];
	  //echo "sdfds";
	  
	  
	  echo $hospital;
	  if(empty($hospital))
	  {
		  echo $medicine;
	  }
	  if(empty($medicine))
	  {
		  $sql = "INSERT INTO appointment (uname,disease_name,hospital) VALUES ('$uname', '$disease_name', '$hospital')";

		if (mysqli_query($conn, $sql)) 
		{
			echo "New record created successfully";
		}	 
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		  header("Location:showhospital.php");
	  }
	  
    }
	
	
	}
	else
	{
		echo "0 rows selected";
	}
	
	
}
?>
	
	
</form>





<br>







</body>