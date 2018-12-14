<?php
require "constants.inc.php";
$conn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
$id = $_POST["id"];
$sql = "DELETE FROM tasks WHERE id=" . $id;
mysqli_query($conn, $sql) or die(mysqli_error($conn));
mysqli_close($conn);