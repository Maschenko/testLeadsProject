<?php
require "constants.inc.php";
$conn = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
$text = $_POST["txt"];
$dt = time();
$sql = "INSERT INTO tasks (task, datetime) VALUES ('" . $text . "', " . $dt .  ")";
mysqli_query($conn, $sql) or die(mysqli_error($conn));
$id = mysqli_insert_id($conn);
mysqli_close($conn);
echo'
                    <tr class="mdl-list__item-primary-content edit">
                        <td type="center1" class="centerText">' . $id . '</td>
                        <i id="tooltip" class="material-icons">
                            edit
                        </i>
                        <td data-tooltip="Редактировать" class="mdl-data-table__cell--non-numeric introT">
                           ' . $text . '
                        </td>
                        <td>
                            <div class="editShow" style="display: none">
                                <button id="show-dialog" type="button" class="mdl-button mdl-js-button mdl-button--icon">
                                    <i class="material-icons">
                                        edit
                                    </i>
                                </button>
                                <dialog class="mdl-dialog">
                                    <form action="#" class="mdl-cell mdl-cell--12-col">
                                        <h4 class="mdl-dialog__title">Редактирование</h4>
                                        <div class="mdl-dialog__content">
                                            <div class="mdl-textfield mdl-js-textfield">
                                                <input onkeyup="validation()" maxlength="15" class="mdl-textfield__input" type="text" id="name">
                                                <label class="mdl-textfield__label" for="name">Текст задачи</label>
                                            </div>
                                        </div>

                                        <div class="mdl-textfield mdl-js-textfield">
                                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
                                            <label class="mdl-textfield__label" for="sample5">Text lines...</label>
                                        </div>

                                        <div class="mdl-dialog__actions">
                                            <button type="button" class="mdl-button">Сохранить</button>
                                            <button type="button" class="mdl-button close">Отмена</button>
                                        </div>
                                    </form>
                                </dialog>
                            </div>
                        </td>
                        <td id="time1">' . date('d-m-Y H:i:s', $dt) . '</td>
                        <span for="time1" class="mdl-tooltip mdl-tooltip--right ">в 04:18</span>

                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon" id="' . $id . '">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </tr>
';