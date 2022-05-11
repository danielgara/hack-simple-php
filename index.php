<?php

error_reporting(0);

$host = 'localhost';
$user = 'root';
$passwd = '';
$db = 'hack';
$mysqli = mysqli_connect($host, $user, $passwd, $db);

if (!$mysqli)
{
  echo 'Connection failed<br>';
  echo 'Error number: ' . mysqli_connect_errno() . '<br>';
  echo 'Error message: ' . mysqli_connect_error() . '<br>';
} else {
  include_once 'views/header.php';

  if ($_GET["id"]) {
    $id = $_GET["id"];
    //$query = "SELECT * FROM products WHERE id = '" . $mysqli->real_escape_string($id) . "'";
    $query = "SELECT * FROM product WHERE id = '" . $id . "'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    echo '<b>Product name:</b> '. $row['name'] . '</a><br /><b>Price:</b>' . $row['price'] . '<br /><br />';
    

  } else {
    $query = "SELECT * FROM product";
    $result = mysqli_query($mysqli, $query);
  
    while ($row = mysqli_fetch_assoc($result))
    {
      echo '<b>Product name:</b> <a href="/hackapps/todos/index.php?id='. $row['id'] .'">' . $row['name'] . '</a><br /><b>Price:</b>' . $row['price'] . '<br /><br />';
    }
  }
  
  include_once 'views/footer.php';
}