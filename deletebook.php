<?php
$servername="localhost";
$username="root";
$password="";
$database="lms";
$connection=new mysqli($servername,$username,$password,$database);
if($connection->connect_error)
{
    die("connection failed:".$connection->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>BOOKS AVAILABLE</title>
</head>
<body style="margin:50px;" bgcolor="#E7D5A5">
    <h1>LIST OF BOOKS AVAILABLE</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>SI.NO</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
</tr>
<?php
$sql="SELECT * FROM available ";
$result=$connection->query($sql);
if(!$result)
{
    die("Invalid query:".$connection->error);
}
while($row=$result->fetch_assoc()){
    echo "<tr>
    <td>" .$row["SI_NO"]. "</td>

    <td>".$row["Title"]. "</td>
    <td>" .$row["Author"]. "</td>
</tr>";
}?>
</thead>
<tbody>
</tbody>
</table>
<form action="deletebook.php" method="post">
<br><p><b>enter following details to delete the book<b></p><br> <table><tr><td>
<p>enter SI.No:&nbsp;&nbsp;&nbsp;&nbsp;</p></td><td><input type="text" name="delbookid" id="delbookid">
<br></td></tr>
<tr><td></td><td><button class="btn">delete book</button></td></tr> </table>
</form>
<?php
$delbookid=$_POST['delbookid'];
$delete="DELETE FROM `lms`.`available` WHERE `SI_NO`='$delbookid';";
if($connection->query($delete)){ 
header('location:1.html');  }
?>
</body>
</html>