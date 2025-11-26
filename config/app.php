<?php
session_start();
/** For ajax calls
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type"); */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$app_url="https://production.3pro.ca/";

$db_url=dirname(__DIR__)."/config/db.php";

require(__DIR__."/../src/libs/helper.php");

