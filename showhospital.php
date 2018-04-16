
<html>



<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

Suitable Date1:<input type="date" name="d1"><br>

Suitable Date2:<input type="date" name="d2"><br>

<input type="submit" value="submit" name="s">

<input type="submit" value="talk to doctor" name="t">

</form>



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

    

    $servername=$username=$password=$conn=$db="";

    $uname=$_SESSION['login_user'];

    echo $_SESSION['login_user'];

    echo "<br>";

    

    

    

    date_default_timezone_set('Asia/Kolkata');

    $currentdate = date('d-m-Y');

    //echo $currentdate;

    // DATABASE CONNECTIVITY.

    

    

    Global $servername,$username,$password,$conn,$db,$hospital;

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

    //echo "Connected successfully";

    

    

    $sql = "SELECT hospital FROM appointment where uname='$uname';";

    //echo "sdf";

    $result = mysqli_query($conn, $sql);

    

    if (mysqli_num_rows($result) > 0)

    {

        

        

        while($row = mysqli_fetch_assoc($result))

        {

            echo "Appropriate Hospital is:";

            echo "<br>";

            $hospital=$row["hospital"];

        }

        $sql="SELECT hospital FROM hospital_name where d_id='$hospital';";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
            while($row = $result->fetch_assoc()) {
                $hospital1=$row["hospital"];
                echo $hospital1;
            }
					}


        echo "<br>";

        

    }

    

    if(isset($_POST['t'])){

        talk($hospital);

    }

    

    $date1=$date2="";

    if($_POST)

    {

        if(isset($_POST['d1']))

        {

            $date1=$_POST['d1'];

        }

        if(isset($_POST['d2']))

        {

            $date2=$_POST['d2'];

        }

        if(isset($_POST['s']))

        {

            if(strtotime($date1)<strtotime($currentdate))

            {

                echo "date is not accepted";

            }

            else

            {

                //echo "date1 accepted";

                if(strtotime($date2)<strtotime($date1))

                {

                    echo "date2 is not accepted";

                }

                else

                {

                    

                    $diff = abs(strtotime($date2) - strtotime($date1));

                    $years = floor($diff / (365*60*60*24));

                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                    if($days>7)

                    {

                        echo "Difference not more than 7 days from current time";

                    }

                    else

                    {
                        $did=$hospital;
                        $diseasename="abc";
            
                        
                        $sql= "INSERT INTO appointment VALUES('$uname','$diseasename',$did,'$date1','$date2','0000-00-00');";
                        

                        if ($conn->query($sql) === TRUE)

                        {

                            echo "Record updated successfully";

                            header("Location:patient.php");

                        }

                        else

                        {

                            echo "Error updating record: " . $conn->error;

                        }

                        

                    }

                    

                    

                }

            }

        }

    }

    function talk($arg1)

    {

        $file="doc".$arg1.".html";

        echo "<script type='text/javascript'>window.open('$file');</script>";

    }

    

    

    

    

    ?>


</html>
