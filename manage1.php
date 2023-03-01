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
$SI_NO=$_POST["SI_NO"];
$Book_Id=$_POST["Book_Id"];
$Title=$_POST["Title"];
$Author=$_POST["Author"];
$insert="INSERT INTO `lms`.`user1` (`SI.NO`,`Book Id`,`Title` ,`Author`,`Issue Time`,`date`) VALUES ('$SI_NO','$Book_Id', '$Title', '$Author',current_timestamp(),current_timestamp()) ;";
$insertres=$connection->query($insert);
$delete1="DELETE FROM `lms`.`user1` WHERE `Book Id`=0;";
$deleteres1=$connection->query($delete1); 
$delbookid=$_POST['delbookid'];
$delete="DELETE FROM `lms`.`user1` WHERE `Book Id`='$delbookid';";
$deleteres=$connection->query($delete); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
</head>
<body style="margin:50px;background-color:#E7D5A5;">
    <h1>LIST OF BOOKS ISSUED </h1>
    <br><?php
    $sql="SELECT * FROM `user1` ";
    $result=$connection->query($sql);
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>SI.NO</th>
                <th>Book Id</th>
                <th>Title</th>
                <th>AUTHOR</th>
                <th>ISSUE TIME</th>
                <th>DUE DATE</th>
            </tr>
<?php


while($row=$result->fetch_assoc()){
    $due=strtotime($row["date"]. ' + 15 days');
    echo "<tr>
    <td>" .$row["SI.NO"]. "</td>
    <td>" .$row["Book Id"]. "</td>
    <td>".$row["Title"]. "</td>
    <td>" .$row["Author"]. "</td>
    <td>" .$row["Issue Time"]."</td>
    <td> " .date('Y-m-d',$due). " </td>
    
    
    </tr>";
}


?>
</thead>
</table>

<p><b>enter following book details to add:<b></p>
<form action="manage1.php" method="post">
<table>
<tr>
    <td>SI.NO:</td>
    <td><input type="text" name="SI_NO" id="SI_NO"></td>
</tr>
<tr><td>BookId:</td><td><input type="text" name="Book_Id" id="Book_Id"></td></tr>
<tr><td>Title:</td><td><input type="text" name="Title" id="Title"></td></tr>
<tr><td>Author:</td><td><input type="text" name="Author" id="Author"></td></tr>
<tr><td></td><td><button class="btn" style="align:center;">add book</button></td>
</tr>
<br><br>
</table>
</form>

<br><p><b>enter following details to delete the book<b></p><br> 
<form action="manage1.php" method="post">
<table>
    <tr>
        <td><p>enter Book Id:&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
        <td><input type="text" name="delbookid" id="delbookid"><br></td>
    </tr>
<tr>
    <td></td>
    <td><button class="btn">delete book</button></td>
</tr> 
</table>
</form>
</body>
</html>