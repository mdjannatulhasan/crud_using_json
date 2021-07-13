<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/crud_using_json/config.php');


use App\GuestBook\GuestBook;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Debugger;
use App\Utility\Utility;

$str = file_get_contents('input.json');
$array = json_decode($str, true);
$storedData = $array;
$strValidatedData = '';

$guestPosition = $_GET['guestPosition'];



unset($storedData[$guestPosition]);

$json = json_encode($storedData);

if (file_put_contents("input.json", $json)) {
    header('Location:index2.php');
} else {
    echo "Oops! No Data...";
}
