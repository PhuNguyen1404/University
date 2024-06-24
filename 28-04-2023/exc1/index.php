<?php
$classmate = [
    [
        "name" => "Honag",
        "age" => 25,
        "gender" => "female"
    ],

    [
        "name" => "Dung Viktor",
        "age" => 21,
        "gender" => "male"
    ],

    [
        "name" => "Bin",
        "age" => 18,
        "gender" => "male"
    ]

];

$bon = [
    "name" => "Bon",
    "age" => 30,
    "gender" => "female"
];

array_splice($classmate, 1, 1);
array_push($classmate, $bon);

$json = json_encode($classmate, JSON_PRETTY_PRINT);
$phpjson = json_decode($json, true);

var_dump($json);
var_dump($phpjson);

if (!file_exists("classmate.json")) {
    echo "Classmate file does not exist";
    $data = [];
    file_put_contents("classmate.json", json_encode($data));
} else {
    echo "Classmate file exists";
    file_put_contents("classmate.json", $json);
}

for ($i = 0; $i < count($classmate); $i++) {
    echo $classmate[$i]['name'] . "<br>";
}

foreach ($classmate as $classmates) { 
    echo $classmates['name'] . "<br>";
}

$age_arr = array_column($classmate, "age");
var_dump($age_arr);
?>