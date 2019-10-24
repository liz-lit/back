<?php
use Classes\Students;
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
require_once __DIR__. '/vendor/autoload.php';
//include "./classes/Students.php";
$db_connect=pg_connect("host=localhost port=5432 dbname=postgres user=postgres");

$students = new Students($db_connect);
$req_res = null;
$request = $_SERVER['REQUEST_METHOD'];
switch($request){
    case "GET":
        $req_res = $students->getStudents();
        echo json_encode($req_res);
        break;
    case "POST":
        $req_res = $students->insertStudents();
        break;
}
