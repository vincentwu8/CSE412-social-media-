<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album search</title>
</head>
<body>
    <form method="post">
    <label>Search</label>
    <input type ="text" name="search">
    <input type="submit" name="submit">
</form>
</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=user_register",'root','');

if(isset($_POST["submit"])){
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM `albums` WHERE Name ='$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch()){
        ?>
        <br><br><br>
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>user_id</th>
                <th>Date</th>
        </tr>
        <tr>
            <td><?php echo $row->Album_id; ?></td>
            <td><?php echo $row->Name; ?></td>
            <td><?php echo $row->user_id; ?></td>
            <td><?php echo $row->Date_of_creation; ?></td>
        </tr>
    </table>
<?php        
    }else{
        echo "does not exist";
    }
}
?>