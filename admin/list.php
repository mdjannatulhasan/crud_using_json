<?php
//phpinfo();
include_once ($_SERVER['DOCUMENT_ROOT']. '/crud_using_json/config.php');


use App\GuestBook\GuestBook;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Debugger;
use App\Utility\Utility;

if(Utility::isPosted()){
    //header("location:create.php");
}

$sanitizedData = Sanitizer::sanitize($_POST);
$validatedData = Validator::validate($sanitizedData);
$guestbook = new GuestBook($validatedData);

Debugger::debug($_COOKIE);


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
        <div class="row">
            <div class="col-sm-5 offset-3">
                <dl class="row">
                    <dt class="col-sm-3">Full Name:</dt>
                    <dd class="col-sm-9"><?= isset($guestbook)? $guestbook->full_name: 'Not Provided';?></dd>
                    <dt class="col-sm-3">Comment:</dt>
                    <dd class="col-sm-9"><?= isset($guestbook)? $guestbook->comment: 'Not Provided';?></dd>
                </dl>

            </div>
        </div>
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
