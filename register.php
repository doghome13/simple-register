<?php

namespace App;

use App\service\database;
use App\config\Router;
use App\migrate;

class register
{
    public function __construct($query = [])
    {
        $this->query = $query;
    }

    public function get()
    {
        //
    }

    public function getParam()
    {
        return $this->param;
    }

    public function post()
    {
        $name = $this->query['name'] ?? '';
        $password = $this->query['password'] ?? '';

        if ($name === '' || $password === '') {
            die('不得為空值');
        }

        $datetime = date('Y-m-d h:i:s');
        $dbName = 'simple_register';

        include_once 'service/databaseService.php';
        $database = new database();
        $sql = "INSERT INTO members (`name`, `password`, `created_at`)
            VALUES ('{$name}', PASSWORD('{$password}'), '{$datetime}')";
        $database->setConnect($dbName)->run($sql);

        //
        print_r("註冊成功!");
        echo '<br />';
    }
}

$action = htmlspecialchars($_SERVER["REQUEST_URI"]);
$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === Router::METHOD_POST) {
    $data = $_POST;
    $name = $data['name'] ?? '';
    $password = $data['password'] ?? '';
}

?>

<style>
    form {
        width: 50%;
    }

    ul {
        list-style-type: none;
    }

    li:not(nth-last-of-type) {
        margin-bottom: 10px;
    }

    li:last-of-type {
        display: flex;
        justify-content: flex-end;
    }

    input {
        width: -webkit-fill-available;
    }

    button,
    a {
        color: black;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
    }

    a {
        text-decoration: none;
    }

    button:not(last-of-type) {
        margin-left: 10px;
    }
</style>

<div class="row">
    <form method="post" action="<?php echo $action; ?>">
        <ul>
            <li>
                <input type="text" id="member-name" name="name" value="<?php echo $name ?? ''; ?>" />
            </li>
            <li>
                <input type="password" id="member-password" name="password" value="<?php echo $password ?? ''; ?>" />
            </li>
            <li>
                <button type="button">
                    <a href="/">返回</a>
                </button>
                <button type="button" onclick="clearForm();">清除</button>
                <button type="submit">確定</button>
            </li>
        </ul>
    </form>
</div>

<script>
    function clearForm() {
        document.getElementById("member-name").value = '';
        document.getElementById("member-password").value = '';
    }
</script>