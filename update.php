<?php
    include ("connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn ->prepare("UPDATE user SET username = ? , password = ?  WHERE id = ?");
    $stmt ->bind_param("ssi", $username, $password, $id);

    if ($stmt -> execute()) {
        echo "data berhasil diubah";
    }
    else {
        echo "belum bisa diubah lol";
    }

    $stmt->close();
    $conn->close();
} else {
    $id = $_GET["id"];
    $stmt = $conn ->prepare("SELECT * FROM user WHERE id = ?");
    $stmt ->bind_param("i", $id, );
    $stmt -> execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $password = $row["password"];
    }
}
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update</title>
    </head>
    <body>
        <h1>Update user</h1>
        <form action="" method="POST">
        <input type="hidden" name="id" placeholder="username" value="<?= $_GET["id"] ?>" id="">
        <input type="text" name="username" placeholder="username" value="<?= $username ?>" id="">
        <input type="text" name="password" placeholder="password" value="<?= $password ?>" id="">
        <button type="submit">submit</button>
        </form>
        <a href="read.php">BACK</a>


        <?php 
        
        ?>
    </body>
    </html>