<?php

use App\Controllers\UserController;
use App\Middlewares\AuthMiddleware;

$userController = new UserController();

$router->post('/users', function () use ($userController) {
    echo $userController->create();
});

$router->patch('/users/:id', function ($params) use ($userController) {
    echo $userController->update($params['id']);
});

$router->put('/users/:id', function ($params) use ($userController) {
    echo $userController->updateAll($params['id']);
});

$router->get('/users', function () use ($userController) {
    echo $userController->getAll();
});

$router->get('/users/:id', function ($params) use ($userController) {
    echo $userController->getById($params['id']);
});

$router->delete('/users/:id', function ($params) use ($userController) {
    echo $userController->delete($params['id']);
})->addMiddleware(new AuthMiddleware());
