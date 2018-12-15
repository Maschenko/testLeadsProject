<?php
require "constants.inc.php";
$conn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$cnt = mysqli_affected_rows($conn);
if (!$cnt) {
	$errMsg = ' <span id="errMsg" class="mdl-chip" style="margin-left: 44%; margin-top: 10%;"><span class="mdl-chip__text">Нет задач в базе</span></span>';
} else {
	$errMsg = "";
}
?>
<!DOCTYPE html>
<html lang="en" class="mdl-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./node_modules/material-design-lite/material.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">
</head>
<body>
    <div class="loader-back">
    <div id="loader" class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
    </div>
    <div class="mdl-layout mdl-js-layout">

        <header class="mdl-layout__header mdl-layout__header--scroll">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">Список дел</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="">Главная</a>
                </nav>
            </div>
        </header>

        <div class="mdl-layout__drawer">

            <span id="lTitle">Добавление задачи</span>
            <div class="mdl-grid mdl-cell--12-col">
            <form action="#" class="mdl-cell mdl-cell--12-col">
                <div id="wrongSim" class="wrongSim" style="visibility: hidden">Введен недопустимый символ " ! "</div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <textarea onkeyup="validation()" rows= "5" class="mdl-textfield__input" type="text" id="name"></textarea>
                    <label class="mdl-textfield__label" for="name">Текст задачи</label>
                </div>
                <div class="mdl-grid mdl-cell--12-col">
                <button id="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-cell--12-col" disabled>
                    добавить задачу
                </button>
                </div>
            </form>
            </div>
        </div>
        <div class="mdl-grid mdl-cell--10-col">
            <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button buttonAdd mdl-grid">
                <div class="mdl-grid mdl-cell--10-col">
                    <div class="mdl-grid mdl-cell--3-col">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-layout-spacer mdl-js-ripple-effect">
                            Добавить новую задачу
                        </button>
                    </div>
                </div>
            </div>
        </div>
		<dialog class="mdl-dialog mdl-cell--4-col">
			<form action="#" class="mdl-cell mdl-cell--12-col">
				<h4 class="mdl-dialog__title">Редактирование</h4>
				<div class="mdl-dialog__content mdl-grid">
					<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
                    <textarea onkeyup="validation()" class="mdl-textfield__input" type="text" rows= "6" id="sample5" ></textarea>
                    <label class="mdl-textfield__label" for="sample5">Текст задачи</label>
                </div>
				</div>
				<div class="mdl-dialog__actions">
					<button type="button" class="mdl-button" id="save">Сохранить</button>
					<button type="button" class="mdl-button close">Отмена</button>
				</div>
			</form>
		</dialog>
        <main class="mdl-layout__content">
            <div class="page-content">
                <div class="mdl-grid mdl-cell--10-col">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--12-col">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">id Задачи</th>
                        <th class="mdl-data-table__cell--non-numeric">Текст задачи</th>
                        <th></th>
                        <th>Дата создания</th>
                        <th>Действия с задачей</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
	while($row = mysqli_fetch_assoc($result)) {
?>
                    <tr class="mdl-list__item-primary-content edit">
                        <td type="center1" class="centerText"><?=$row["id"]?></td>
                        <i id="tooltip" class="material-icons">
                            edit
                        </i>
                        <td data-tooltip="Редактировать" class="mdl-data-table__cell--non-numeric introT">
                           <?=$row["task"]?>
                        </td>
                        <td>
                            <div class="editShow" style="display: none">
                                <button class="show-dialog" type="button" class="mdl-button mdl-js-button mdl-button--icon" style="border: none; background: none;" id="<?=$row["id"]?>">
                                    <i class="material-icons">
                                        edit
                                    </i>
                                </button>
                            </div>
                        </td>
                        <td id="time1"><?=date("d-m-Y H:i:s", $row["datetime"])?></td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon delete" id="<?=$row["id"]?>">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </tr>
<?php		
	}
	mysqli_free_result($result);
	mysqli_close($conn);
?>
                    </tbody>
                </table>
<?php
if ($errMsg) {
	echo $errMsg;
}
?>
                </div>
            </div>
        </main>
    </div>
	
    <script type="text/javascript" src="index-js.js"></script>
    <script src="./node_modules/material-design-lite/material.min.js"></script>
</body>
<!--<script>-->
    <!--function loadingPage() {-->
        <!--if (document.getElementById("load")){-->
            <!--var loadpage = document.getElementById("load");-->
            <!--if (loadpage.style.display !== "block") {-->
                <!--loadpage.style.display = "block";-->
            <!--}-->
            <!--else loadpage.style.display = "none";-->
            <!--}-->
        <!--}-->
    <!--function noloadingPage() {-->
        <!--.document.getElementById("load").style.display = "none"-->
    <!--}-->
<!--</script>-->

</html>