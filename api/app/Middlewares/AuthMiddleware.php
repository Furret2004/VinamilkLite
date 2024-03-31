<?php

namespace App\Middlewares;

use Core\Middleware;

class AuthMiddleware extends Middleware
{
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        return false;
    }
}
