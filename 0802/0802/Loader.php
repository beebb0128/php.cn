<?php


namespace _0802;


class Loader
{
    public static function autoLoader()
    {
        spl_autoload_register(function ($className) {
            var_dump($className);die;
            $path = str_replace('\\', '/', $className);
            $path =  __DIR__ . '/' . $path . '.php';
            if (file_exists($path)) {
                require $path;
            }
        });
    }

}