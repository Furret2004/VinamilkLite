<?php

use App\Controllers\AuthController;

$authController = new AuthController();

$router->post('/auth/register', function () use ($authController) {
    echo $authController->register();
});

$router->post('/auth/login', function () use ($authController) {
    echo $authController->login();
});

$router->post('/auth/refresh', function () use ($authController) {
    echo $authController->refresh();
});

$router->post('/auth/logout', function () use ($authController) {
    echo $authController->logout();
});
