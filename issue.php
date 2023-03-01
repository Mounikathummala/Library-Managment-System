
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title> LIST OF USERS</title>
    <style>
        .btn
{
    margin:auto;
    color:white;
    background:pink;
    font-size:20px;
    border-radius:14px;
    justify-content:center;
}</style>   
</head>
<body style="margin:50px;background-color:#E7D5A5">
    <h1>LIST OF USERS</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>BOOKS ISSUED</th>
</tr>
</thead>
<tbody><?php
error_reporting(E_ERROR | E_PARSE);
$servername="localhost";
$username="root";
$password="";
$database="lms";
$connection=new mysqli($servername,$username,$password,$database);
if($connection->connect_error)
{
    die("connection failed:".$connection->connect_error);
}
$sql="SELECT username,email,pswd FROM users ";
$result=$connection->query($sql);
if(!$result)
{
    die("Invalid query:".$connection->error);
}
while($row=$result->fetch_assoc()){
    echo "<tr>
    <td>" .$row["username"]. "</td>
    <td>" .$row["email"]. "</td>
    <td><a href='manage1.php?rn=$row[username]'>LIST OF BOOKS ISSUED</td>
    </tr>";
}
?>
</tbody>
</table>



</body>
</html>