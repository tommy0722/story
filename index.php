<?php
include_once "db.php";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 0;
}
if ($page == 4) {
    $lastpage = $page - 1;
    $nextpage = 0;
} elseif ($page == 0) {
    $lastpage = 4;
    $nextpage = $page + 1;
} else {
    $lastpage = $page - 1;
    $nextpage = $page + 1;
}

// 
$dsn = "mysql:host=localhost;charset=utf8;dbname=storys";
$pdo = new PDO($dsn, 'root', '');
$sql = "SELECT * FROM `story` WHERE 1";
$GG = $pdo->query($sql)->fetchall();
// echo "<pre>";
// print_r($GG);
// echo "</pre>";
// echo $GG[1]['id'];


$story = $GG[$page]['story'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>story</title>
    <style>
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="container ">
    <form action="./index.php" method="GET">
        <div class="row">
            <div class="col text-center">
                <img src="<?= $GG[$page]['img'] ?>" alt="" width="600" height="400">
                
            </div>
        </div>
    </form>
    <br>
    <footer class="d-flex justify-content-between  mb-3">
        <a href="index.php?page=<?= $lastpage ?>" class="p-2"><i class="fas fa-arrow-left h1"></i></a>
        <textarea id="story" name="story" rows="5" cols="33" class="col-md-6">
            <?= $story; ?>
        </textarea>
        <a href="index.php?page=<?= $nextpage ?>" class="p-2"><i class="fas fa-arrow-right h1"></i></a>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</html>