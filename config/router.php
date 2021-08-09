<?php

namespace config;

class Router
{
    const METHOD_GET = 'get';
    const METHOD_POST = 'post';

    public function __construct()
    {
        // var_dump($_SERVER);
        $this->basePath = './';
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->url = $_SERVER['PATH_INFO'] ?? $_SERVER['REQUEST_URI'];
    }

    public function run()
    {
        $fileName = explode('/', $this->url);
        $fileName = $fileName[1] ?? null;
        $filePath = $fileName
            ? $this->basePath . $fileName . '.php'
            : null;

        if ($this->url !== '/' && $filePath === null) {
            die('頁面不存在!');
        }

        if (!file_exists($filePath)) {
            die('頁面不存在!');
        }

        include_once $filePath;
        $query = $this->getCurrentQuery();
        $module = new $fileName($query);

        if (!method_exists($module, $this->method)) {
            die("要呼叫的方法不存在");
        }

        // if (is_callable([$module, $this->method]))
        $module->{$this->method}();
    }

    /**
     * 所有參數
     *
     * @return array
     */
    private function getCurrentQuery()
    {
        if ($this->method === static::METHOD_GET) {
            return $_GET;
        } elseif ($this->method === static::METHOD_POST) {
            return $_POST;
        }

        return [];
    }
}