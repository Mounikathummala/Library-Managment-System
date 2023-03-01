
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>LIST OF BOOKS ISSUED</title>
    
</head>
<body style="margin:50px;background-color:#E7D5A5" >
<form action="books.php" method="post">
    
        <input type ="text" name="search"  placeholder="search by book name" >

    <button class="btn" >search</button>
</form>
<br>
<br>
    <h1>LIST OF BOOKS ISSUED</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>SI.NO</th>
                <th>BOOK ID</th>
                <th>TITLE</th>
                <th>AUTHOR</th>
                <th>ISSUE TIME</th> 
                <th>Due Date</th>
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
    $sql="SELECT * from `user1` WHERE Title LIKE'%$searchkey%'";
    $result=$connection->query($sql);
}else{
    $sql="SELECT * from `user1` ";
    $result=$connection->query($sql);}
if(!$result)
{
    die("Invalid query:".$connection->error);
}
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
</tbody>
</table>
</body>
</html>