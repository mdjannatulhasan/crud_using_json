<?php
//phpinfo();
include_once ($_SERVER['DOCUMENT_ROOT']. '/crud_using_json/config.php');


use App\GuestBook\GuestBook;

$str = file_get_contents('input.json');
$array = json_decode($str, true);
$storedData = $array;
$strValidatedData = [];
session_start();

    $guestbook = new GuestBook($storedData);
    $guestPosition = $_GET['guestPosition'];
    echo "$guestPosition";
    $_SESSION['guestPosition'] = $guestPosition;
    $singleArray = $storedData[$guestPosition];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Guest Book</title>
</head>
<body>
<section>
    <div class="container">
        <h1 class="text-center mb-4">Guest Book</h1>
        <table class="table">
        <form action="update.php" method="POST" class="fw-bold">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="f-name" class="form-label">First Name</label>
                        <input type="text" name="f-name" value="<?= $singleArray['f-name'] ?>" class="form-control" id="f-name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="l-name" class="form-label">Last Name</label>
                        <input type="text" name="l-name" value="<?= $singleArray['l-name'] ?>" class="form-control" id="l-name">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" value="<?= $singleArray['email'] ?>" class="form-control" id="email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" cols="30" rows="5" class="form-control" id="message"><?= $singleArray['message']?></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" value="submit" class="btn btn-primary mb-4">Submit</button>
        </form>
        <br>
        <div class="py-6"><button class="py-2 px-8 bg-primary border-0 rounded-3"> <a class="text-white text-decoration-none" href="create.php">Go to Create page.</a></button></div> 
    </div>
</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>
