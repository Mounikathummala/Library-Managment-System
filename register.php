<?php
$insert=false;
if(isset($_POST['name'])){
    $servername="localhost";
    $username="root";
    $password="";
    $database="lms";
    $con=new mysqli($servername,$username,$password,$database);
if(!$con)
{
    die("connectin to this database failed due to".mysqli_connect_error());
}
//echo"success connecting to the db";
function validate($data)
{$data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$name=validate($_POST['name']);
$rollno=validate($_POST['rollno']);
$email=validate($_POST['email']);
$phone=validate($_POST['phone']);
$pswd=validate($_POST['pswd']);
if(empty($name))
{echo "Username is required";
}
else if(empty($rollno))
{echo "rollno is required";
    //header("Location:student.html?error=password is required");
}
else if(empty($email))
{echo "email is required";
    //header("Location:student.html?error=password is required");
}
else if(empty($phone))
{echo "phone number is required";
    //header("Location:student.html?error=password is required");
}
else if(empty($pswd))
{echo "password is required";
    //header("Location:student.html?error=password is required");
}
else{
$sql="select * from users where ( email='$email' or rollno='$rollno');";

      $res=mysqli_query($con,$sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        
        if($email==isset($row['email']))
        {
            	echo "email already exists"." ";
        }
		if($rollno==isset($row['rollno']))
		{
			echo "rollno  already exists";
		}
		}
else{
$sql="INSERT INTO `users` ( `username`, `rollno`,  `email`, `phone`, `pswd`) VALUES ('$name', '$rollno',  '$email', '$phone', '$pswd')";
//echo $sql;
if($con->query($sql)==true){
    
    $insert=true;
    echo "successfully registered ";
    
}
else{
    echo "ERROR: $sql<br> $con->error";

}
}
$con->close();
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>  
    <style>
    input
{
    width:60%;
    margin:11PX;
    padding:7px;
    font-size:16px;
    border-radius: 10px;
    justify-content:center;
}    
.btn
{
    margin:auto;
    color:white;
    background:violet;
    font-size:20px;
    border-radius:14px;
    justify-content:center;
}
.container
{
    max-width:80%;
    background-color:violet;
padding:34px;
margin :auto;
}
</style>
</head>
<body align="center" >
    
    <div class="container">
    <h1>STUDENT REGISTRATION FORM</h1>
    <br>
    
    
    <form action="register.php" method="post">

    <input type="text" name="name" id="name" placeholder="enter your name"><br>
    <input type="text" name="rollno" id="rollno" placeholder="enter your rollno"><br>
    <input type="email" name="email" id="email" placeholder="enter your email"><br>
    <input type="phone" name="phone" id="phone" placeholder="enter your phone"><br>
    <input type="password" name="pswd" id="pswd" placeholder="give a password"><br>
    <button class="btn" onclick="return func()">submit</button>
    
</form>
</div>
<script  src="exjs.js">
</script>   
</body>
</html>