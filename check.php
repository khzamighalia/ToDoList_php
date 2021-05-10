<?php
session_start();
require_once "db.php";
$id = $_POST['uchk'];
$uncheck_query = "UPDATE task_table SET checked='1'  WHERE id=$id";

$run_query = $dbcon->query($uncheck_query);

header('location: index.php');

?>