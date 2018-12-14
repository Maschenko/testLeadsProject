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
                                <button class="show-dialog" type="button" class="mdl-button mdl-js-button mdl-button--icon" id="' . $id . '">
                                    <i class="material-icons">
                                        edit
                                    </i>
                                </button>
                            </div>
                        </td>
                        <td id="time1">' . date('d-m-Y H:i:s', $dt) . '</td>
                        <span for="time1" class="mdl-tooltip mdl-tooltip--right ">в 04:18</span>

                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon delete" id="' . $id . '">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </tr>
';