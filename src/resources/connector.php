<?php

$fName = $_POST["fname"];
$lName = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["pwd"];
$confirmedPassword = $_POST["conpwd"];
$gender = $_POST["gender"];


$data = array(
    "0" => array(
        "First Name" => $fName,
        "Last Name" => $lName,
        "Email" => $email,
        "Password" => $password,
        "Gender" => $gender,
    )
);
$prevData = file_get_contents('data.json');
$tempArray = json_decode($prevData);
if ($tempArray) {
    array_push($tempArray, $data[0]);
    $jsonData = json_encode($tempArray);
} else {
    $jsonData = json_encode($data);
}
file_put_contents('data.json', $jsonData);
echo "<script>alert(Details Saved)</script>";
