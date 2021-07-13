<?php

include_once ($_SERVER['DOCUMENT_ROOT']. '/crud_using_json/config.php');


use App\GuestBook\GuestBook;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Debugger;
use App\Utility\Utility;

$str = file_get_contents('input.json');
$array = json_decode($str, true);
$storedData = $array;
$strValidatedData = '';

session_start();
$guestPosition = $_SESSION['guestPosition'];
echo $guestPosition;
if(Utility::isPosted()){
    $sanitizedData = Sanitizer::sanitize($_POST);
    $validatedData = Validator::validate($sanitizedData);
    $storedData[$guestPosition] = $validatedData;
    // print_r($validatedData);
    $json = json_encode($storedData);
    
    if (file_put_contents("input.json", $json)){
        echo "JSON file created successfully...";
        echo '<a href="index2.php">Go to list</a>'; 
    }
    else{
        echo "Oops! Error creating json file...";
    }

}

