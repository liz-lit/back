<?php

use Src\Lizlit\Controllers\Students;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
//require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/autoload.php';

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
//var_dump($_POST[Name]);
$db_connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password =12345");
//$rufus = pg_query($db_connect, "INSERT INTO students (Name, Login) VALUES ('$_POST[Name]', '$_POST[Login]')");
//var_dump($rufus);
$students = new Students($db_connect);
$req_res = null;
$request = $_SERVER['REQUEST_METHOD'];
switch ($request) {
    case "GET":
        $req_res = $students->getStudents();
        echo json_encode($req_res);
        break;
    case "POST":
        $req_res = $students->insertStudents();
        break;
}
