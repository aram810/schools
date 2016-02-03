<?php
namespace school\library;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/10/2015
 * Time: 22:47
 */
class Request
{
    private $uri;

    private $request;

    private $get;

    private $post;

    private $parts;

    public function __construct () {

        $this->uri = $_SERVER['REQUEST_URI'];

        $this->request = $_REQUEST;
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function resolve() {

        $parts = explode('/', trim(str_replace('/school/', '', $_SERVER['REQUEST_URI'])));

        if (empty($parts)) {
            $this->parts = [
                '0' => 'site',
                '1' => 'index'
            ];
        } else {

            if(sizeof($parts) == 1) {
                array_push($parts , 'index');
            }

            $this->parts =  $parts;
        }
    }

    public function getParts(){
        return $this->parts;
    }
}