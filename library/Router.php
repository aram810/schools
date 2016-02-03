<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/10/2015
 * Time: 22:50
 */

namespace school\library;


class Router
{
    private $defaultController = 'SiteController';

    private $defaultAction = 'actionIndex';

    private $defaultId = NULL;

    private $request;

    private $controller;

    private $action;

    private $id;

    public function __construct () {
        $this->request = new Request();
    }

    public function run() {

        $this->request->resolve();
        $routeParts = $this->request->getParts();

        $controllerName =  !empty($routeParts[1]) ?  'school\controllers\\' . ucfirst($routeParts[1]) . 'Controller' : 'school\controllers\StudentsController';
        $actionName = !empty($routeParts[2]) ?  'action' . ucfirst($routeParts[2]) : 'actionIndex';

        if (sizeof($routeParts) == 4 && !is_null($routeParts[3])) {
            $passingId = $routeParts[3];
            $this->id = $passingId;
        }

        if(!class_exists($controllerName)) {
            $controllerName = $this->defaultController;
        }

        $this->controller = new $controllerName ();

        if(!method_exists($this->controller, $actionName)) {
            $this->action = $this->defaultAction;
        }

        if($this->id == $this->defaultId) {
            echo $this->controller->$actionName();
        } else {
            echo $this->controller->$actionName($passingId);
        }

    }

}