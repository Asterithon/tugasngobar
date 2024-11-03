<?php
    include ("connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn ->prepare("INSERT INTO user (username,password) VALUES (? , ?)");
    $stmt ->bind_param("ss", $username, $password);

    if ($stmt -> execute()) {
        echo "data berhasil masuk";
    }
    else {
        echo "belum bisa masuk lol";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="username" id="">
        <input type="text" name="password" placeholder="password" id="">
        <button type="submit">submit</button>
    </form>
        <a href="read.php">LIHAT DATA</a>


</body>
</html>