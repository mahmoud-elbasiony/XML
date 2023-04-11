<?php
session_start();
require("vendor/autoload.php");


$xmlDoc = new DOMDocument();
$xmlDoc->load("Employee.xml");

$query = "//employee";
$xpath = new DOMXPath($xmlDoc);
$handle = $xpath->query($query);


$_SESSION["index"] = isset($_SESSION["index"]) ? intval($_SESSION["index"]) : 0;



$option = isset($_POST["option"]) ? $_POST["option"] : '';
$data = ["name" =>  '', "email" => '', "phone" => "", "street" => "", "building_number" => "", "city" => "", "region" => "", "country" => ""];

switch ($option) {
    case "prev":
        $data = go_prev($handle) ?? $data;
        break;
    case "next":
        $data = go_next($handle) ?? $data;
        break;
    case "insert":
        $employee = insert($xmlDoc);
        $handle = $xpath->query($query);
        $_SESSION["index"] = $handle->count() - 1;

        $data = go_next($handle);
        break;
    case "update":
        $employee = update($xmlDoc, $handle);
        $handle = $xpath->query($query);
        $data = read($handle, $_SESSION["index"]);
        break;
    case "delete":
        delete($handle, $xmlDoc);
        $handle =  $xpath->query($query);
        $data = go_prev($handle) ?? $data;

        break;
    default:
        $data = $handle->count() > 0 ? read($handle) : $data;
        break;
}



require "views/index.php";
