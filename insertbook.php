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
</thead>
<tbody>
</tbody>
<?php
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
$SI_NO=$_POST['SI_NO'];
$Title=$_POST['Title'];
$Author=$_POST['Author'];
$insert="INSERT INTO `lms`.`available` (`SI_NO`, `Title` ,`Author`) VALUES ('$SI_NO', '$Title', '$Author');";
$insertres=$connection->query($insert);
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

}
$connection->close();
?>
</table>
<p><b>enter following book details to add:<b></p>
<form action="insertbook.php" method="post">
<table>
<tr><td>SI.NO:</td><td><input type="text" name="SI_NO"></td></tr>
<tr><td>Title:</td><td><input type="text" name="Title"></td></tr>
<tr><td>Author:</td><td><input type="text" name="Author"></td></tr>
<tr><td></td><td><button class="btn" style="align:center;">add book</button></td>
</tr>
<br><br>
</table>
</form>
</body>
</html>