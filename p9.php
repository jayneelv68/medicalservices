

<?php
    $rollErr=$contactErr = $emailErr="";
    $email=$contact=$roll="";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($_POST['roll'])
        {
            $r=$_POST['roll'];
            if(preg_match("/^\d{2}[A-Z]{3}\d{3}/", $r))
            {
                echo "rollno accepted";
                if($_POST['email'])
                {
                    $e=$_POST['email'];
                    if(preg_match('/^[a-zA-Z]{1}[a-zA-Z0-9_.+-]*[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $e))
                    {
                        echo "email accepted";
                        if($_POST['contact'])
                        {
                            $c=$_POST['contact'];
                            if(preg_match('/[+]\d{2,3}[-]\d{10}/', $c))
                            {
                                echo "contact accepted";
                            }
                            else
                            {
                                $contactErr="Not as per validation";
                            }
                         }
                    }
                    else
                    {
                        $emailErr="Not as per validation";
                    }
                }
            }
            else
            {
                $rollErr="Not as per validation";
            }
          
        
        }
    }
    ?>
<html>
<head>
<title>Regex</title>

</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table border="1" width="500" align="center">
<tr>
<td>Roll no</td>
<td>
<input type="text" name="roll">
<span class="error">*  <?php echo $rollErr;?></span>
<br><br>
</td>
</tr>

<tr>
<td>Contact no</td>
<td><input type="text" name="contact">
<span class="error">*  <?php echo $contactErr;?></span>
<br><br></td>
</tr>
<tr>
<tr>
<td>Email</td>
<td><input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br></td>
</tr>
<tr>



<tr><td><p><span class="error">* required field.</span></p></td></tr>
<tr><td>
<input type="submit" name="submit" value="Submit"><Td></tr>
</table>
</form>
</body>
</html>
