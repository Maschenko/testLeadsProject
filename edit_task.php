<?php
require "constants.inc.php";
$conn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
$id = $_POST["id"];
$text = $_POST["txt"];
$sql = "UPDATE tasks SET task='" . $text . "' WHERE id=" . $id;
mysqli_query($conn, $sql) or die(mysqli_error($conn));
mysqli_close($conn);