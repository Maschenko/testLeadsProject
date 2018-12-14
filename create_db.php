<?php
header("Content-type: text/html; charset=utf-8");
//Подключаем файл с константами для соединения с БД
require "constants.inc.php";
//Соединяемся с MySQL
$conn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysqli_connect_error());
$sql = "CREATE DATABASE " . DB_NAME;
//Создаем БД guest_book
mysqli_query($conn, $sql) or die(mysqli_error($conn));
//Соединяемся с БД guest_book
$conn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
$sql = "
CREATE TABLE tasks (
	id SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	task TEXT NOT NULL,
	datetime INT(10) UNSIGNED NOT NULL,
	PRIMARY KEY(id)
)";
//Создаем таблицу для хранения данных, введенных пользователями
mysqli_query($conn, $sql) or die(mysqli_error($conn));
mysqli_close($conn);
//Сообщение выводится в случае успешного создания БД и таблицы
echo "<p>База данных и таблица успешно созданы!</p>";
