<?php

namespace App;

include_once 'service/databaseService.php';

use \App\service\database;

class memberList
{
    public function get()
    {
        //
    }
}

$dbName = 'simple_register';
$database = new database();
$sql = "SELECT `id`, `name`, `created_at` FROM members";
$result = $database->setConnect($dbName)->run($sql);

if ($result->num_rows === 0) {
    echo 'EMPTY';
    echo '<br />';
}
?>

<style>
    ul {
        width: 50%;
        list-style-type: none;
    }

    li:not(nth-last-of-type) {
        margin-bottom: 10px;
    }

    li:last-of-type {
        display: flex;
        justify-content: flex-end;
    }

    label {
        float: left;
    }
</style>

<div class="row">
    <ul>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<label>";
            echo "# " . $row["id"];
            echo "</label>";
            echo "<br/><span>" . $row["name"] . ", " . $row["created_at"] . "</span>";
            echo "</li>";
        }
        ?>
        <li>
            <button type="button">
                <a href="/">返回</a>
            </button>
        </li>
    </ul>
</div>