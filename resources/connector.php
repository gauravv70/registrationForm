<?php

$str_json = file_get_contents('php://input');

$array = json_decode($str_json,true);

$data = array(
    "0" => array(
        "First Name" => $array["fName"],
        "Last Name" => $array["lName"],
        "Email" => $array["email"],
        "Password" => $array["password"],
        "Gender" => $array["gender"],
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
?>

