<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>REGISTER</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .content {
            margin: 150px 50px 0 50px;
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .row {
            width: 100%;
            display: flex;
            justify-content: center;
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
    </style>
</head>

<body>
    <div class="content">
        <?php
        include_once 'config/router.php';

        $router = new \App\config\Router();
        $router->run();
        ?>
        <p>HELLO!</p>
        <div class="row">
            <button type="button">
                <a href="/register">註冊點我</a>
            </button>
        </div>
    </div>
</body>

</html>