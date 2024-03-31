<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');

require_once './config.php';
require_once VENDOR_PATH . 'autoload.php';

// Load environment variables
use Dotenv\Dotenv;

$dotenv = Dotenv::createMutable(__DIR__);
$dotenv->load();

// Define app
use Core\App;

$app = new App(dirname(__DIR__));

if (SHOW_ERRORS) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// Define request
use Core\Request;

$request = new Request();

// Define response
use Core\Response;

$response = new Response();

// Define router
use Core\Router;

$router = new Router($request->getUri(), $request->getMethod());

// Require routes
require_once ROUTES_PATH . 'user.route.php';

$router->dispatch();
