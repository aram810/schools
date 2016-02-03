<?php
namespace school\library;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/10/2015
 * Time: 22:25
 */
class Application
{
    private static $config;

    private $router;

    public function __construct($config){
        self::$config = $config;
        $this->router = new Router();
    }

    public static function getConfig() {
        return self::$config;
    }

    public function run () {
         $this->handleRequest();
    }

    private function handleRequest() {
        
        $this->beforeRequest();

        $this->router->run();

        $this->afterRequest();
    }

    private function beforeRequest () {

    }

    private function afterRequest () {

    }
}