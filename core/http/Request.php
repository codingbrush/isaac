<?php

namespace Isaac\Core\Http;

class Request{

    public static function uri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}