<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipe data</title>
</head>
<body>
    <h1>Belajar tipe data</h1>
    <!-- sintax php -->


    <?php
    echo "1. tipe data integer.<br>";
    $a = 5;
    $b = 10;
    $c = $a + 5;
    $d = $b + ($a * $b);
    $e = $d - $c;


    echo "hasil penjumlahan variable $<br>";
    echo   "variable a = $a<br>";
    echo "variable b = $b<br>";
    echo "variable c = $c<br>";
    echo "variable d = $d<br>";
    echo "variable e = $e<br>";

    var_dump(value: $e);
    ?>

</body>
</html>