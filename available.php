<!DOCTYPE html>
<html >
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>BOOKS AVAILABLE</title>
</head>
<body style="margin:50px;background-color:#E7D5A5;background-color:#E7D5A5">
<form action="available.php" method="post">
    
        <input type ="text" name="search"  placeholder="search by book name" >

    <button class="btn" >search</button>
</form>
<br>
<br>
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
<tbody><?php
$servername="localhost";
$username="root";
$password="";
$database="lms";
$connection=new mysqli($servername,$username,$password,$database);
if($connection->connect_error)
{
    die("connection failed:".$connection->connect_error);
}
if(isset($_POST['search']))
{
    $searchkey=$_POST['search'];
    $sql="SELECT * from `available` WHERE Title LIKE'%$searchkey%'";
    $result=$connection->query($sql);
}else{
    $sql="SELECT * from `available` ";
    $result=$connection->query($sql);}

while($row=$result->fetch_assoc()){
    echo "<tr>
    <td>" .$row["SI_NO"]. "</td>

    <td>".$row["Title"]. "</td>
    <td>" .$row["Author"]. "</td>
</tr>";
}
    
?>
</tbody>
</table>


</body>
</html>