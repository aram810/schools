<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/10/2015
 * Time: 23:57
 */

namespace school\controllers;


class BaseController
{
    protected function render ($view, $params = []) {

        $removeNamespaceController = str_replace('school\controllers\\', '', get_called_class());
        $pureControllerName = strtolower(str_replace('Controller', '', $removeNamespaceController));

        ob_start();
        ob_implicit_flush(false);
        extract($params, EXTR_OVERWRITE);

        require(VIEWS . DS . $pureControllerName . DS . $view . '.php');

        return ob_get_clean();
    }

    protected function redirect ($url) {

    }
}