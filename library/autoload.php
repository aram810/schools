<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09/10/2015
 * Time: 22:34
 */
define("DS", DIRECTORY_SEPARATOR);
define("LIBRARY", dirname(__FILE__));
define("ROOT", dirname(dirname(__FILE__)));
define("CONFIG",      ROOT . DS . "config");
define("CONTROLLERS", ROOT . DS . "controllers");
define("DTO",         ROOT . DS . "dto");
define("SERVICES",    ROOT . DS . "services");
define("VIEWS",       ROOT . DS . "views");
define("MODELS",      ROOT . DS . "models");

require_once LIBRARY . DS . "Database.php";
require_once LIBRARY . DS . "Request.php";
require_once LIBRARY . DS . "Router.php";
require_once LIBRARY . DS . "Application.php";
require_once CONTROLLERS . DS . "BaseController.php";
require_once CONTROLLERS . DS . "StudentsController.php";
require_once DTO . DS . "StudentDTO.php";
require_once SERVICES . DS . "StudentManager.php";
