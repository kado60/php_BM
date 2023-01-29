<?php
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_conn(){
    try {
      $db_name = "gs_bm";
      $db_id   = "root";
      $db_pw   = "";
      $db_host = "localhost";
      $db_port = "3306";
      $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host.';port='.$db_port.'', $db_id, $db_pw);
      return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

function redirect($file_name){
    header('Location: '. $file_name);
}