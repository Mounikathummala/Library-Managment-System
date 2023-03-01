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
$Title=$_POST["Title"];
$Author=$_POST["Author"];
$insert="INSERT INTO `lms`.`available` (`SI_NO`, `Title` ,`Author`) VALUES ('$SI_NO', '$Title', '$Author') ;";
$insertres=$connection->query($insert);
$delete1="DELETE FROM `lms`.`available` WHERE `SI_NO`=0;";
$deleteres1=$connection->query($delete1); 
$delbookid=$_POST['delbookid'];
$delete="DELETE FROM `lms`.`available` WHERE `SI_NO`='$delbookid';";
$deleteres=$connection->query($delete); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>BOOKS AVAILABLE</title>
    <style>
        .btn {
            border: 1px solid black;
            font-size:15px;
        }
        </style>
</head>
<body style="margin:50px;background-color:#E7D5A5" >
    
<form action="manage.php" method="post">
    
        <input type ="text" name="search"  placeholder="search by book name" >

    <button class="btn" >search</button>
</form>
<br>
<br>

<h1>LIST OF BOOKS AVAILABLE</h1>
    <br><?php
    
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>SI.NO</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
            </tr>
<?php
if(isset($_POST['search']))
{
    $searchkey=$_POST['search'];
    $sql="SELECT * from `available` WHERE Title LIKE'%$searchkey%'";
    $result=$connection->query($sql);
}else{
    $sql="SELECT * from `available` ";
    $result=$connection->query($sql);}
while($row=mysqli_fetch_assoc($result)){
    if($row["SI_NO"]!=0){  
      echo "<tr>
        <td>" .$row["SI_NO"]. "</td>
    
        <td>".$row["Title"]. "</td>
        <td>" .$row["Author"]. "</td>
    </tr>";
    }
    }

?>
</thead>
</table>

<p><b>enter following book details to add:<b></p>
<form action="manage.php" method="post">
<table>
<tr>
    <td>SI.NO:</td>
    <td><input type="text" name="SI_NO" id="SI_NO"></td>
</tr>
<tr><td>Title:</td><td><input type="text" name="Title" id="Title"></td></tr>
<tr><td>Author:</td><td><input type="text" name="Author" id="Author"></td></tr>
<tr><td></td><td><button class="btn" style="align:center;">add book</button></td>
</tr>
<br><br>
</table>
</form>

<br><p><b>enter following details to delete the book<b></p><br> 
<form action="manage.php" method="post">
<table>
    <tr>
        <td><p>enter SI.No:&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
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