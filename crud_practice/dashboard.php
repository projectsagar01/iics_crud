<?php 
require_once "database.php";
$sql = "select * from students";
$stmt = $conn->query($sql);
if($stmt){
    echo "Data fetched successfully";
}else{
    echo "Data fetch failed: " . $stmt->error;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display:flex;
            flex-direction:row;
            /* flex-wrap:wrap; */
            
            width: auto;
            margin: 0;
        } 
        div{
            width: 50%;
            height: 80vh;
            /* border: 1px solid black; */
            margin: 100px;
            }

</style>
</head>
<body>
<div>

    <h1>crud</h1>
    <h1> 
        <a href="add.php">add</a>
    </h1><br>
    <h1>
        <a href="edit.php">edit</a>
    </h1><br>
    <h1>
        <a href="delete.php">delete</a>
    </h1><br>
    <h1>
        <a href="view.php">view</a>
    </h1><br>
</div>
    <div>

        <table border="1" cellspacing="0">
            <tr >
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>username</th>
        <th>password</th>
        <th>course</th>
        <th>action</th>
    </tr>
    <?php while($row = $stmt->fetch_assoc()){ ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
        <td><?php echo $row["course"]; ?></td>
        <td> 
            <a href="edit.php?id=<?php echo $row["id"];?>">edit</a>
        <a href="delete.php?id=<?php echo $row["id"];?>">delete</a>
    </td>
</tr>
<?php } ?>

</div>

</body>
</html>