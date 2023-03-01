<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$server="localhost";
$username="root";
$password="";
$database="lms";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn)
{
    die("ERROR:".mysqli_connect_error());
}
function validate($data)
{$data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

$name=validate($_POST['name']);
$pswd=validate($_POST['pswd']);
if(empty($name))
{echo "Username is required";
}
else if(empty($pswd))
{echo "password is required";
    //header("Location:student.html?error=password is required");
}
else{
$sql="SELECT  * from `users` WHERE username='$name' && pswd='$pswd';";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1)
{
    $_SESSION['name']=$name;
    echo "<script>window.open('studentlink.php')</script>";

}
else{
    echo "invalid user or password";
}}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <style>
        .container
{
    max-width:70%;
    background-color:lightblue;
padding:34px;
margin :auto;
}
input
{
    width:80%;
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
    background:blue;
    font-size:20px;
    border-radius:14px;
    justify-content:center;
}
.error{
    background:#F2DEDE;
    color:#A94442;
    padding:10px;
    width:95%;
    border-radius:5px;
}

    </style>
</head>
<body >
    <div class="container">
    <form action="login.php" method="post">
        
    NAME:<br>
    <input type="text" name="name" id="name"/><br><br>
    PASSWORD:
    <input type="password" name="pswd" id="pswd"/><br><br>
    <div align="center"><button class="btn" >login </button></div>
</form></div>
</body>
</html>