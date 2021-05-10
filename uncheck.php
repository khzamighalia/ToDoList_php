<?php
session_start();
require_once "db.php";
  $id = $_POST['chk'];
  $uncheck_query = "UPDATE task_table SET checked='0'  WHERE id=$id";
  
  $run_query = $dbcon->query($uncheck_query);

  header('location: index.php');



?>