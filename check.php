<?php
session_start();
require_once "db.php";
$id = $_POST['uchk'];
$uncheck_query = "UPDATE task_table SET checked='1'  WHERE id=$id";

$run_query = $dbcon->query($uncheck_query);

$to = "eg.khzami@gmail.com";
$subject = "Todos : Une tâche a été marquée ";

$message = "<b>Une tâche a été marquée.</b>";
$message .= "<p>Consultez l'application pour voir laquelle .</p>";
$header = "From:elghaliakhzami@gmail.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$message,$header);

   header('location: index.php');







?>