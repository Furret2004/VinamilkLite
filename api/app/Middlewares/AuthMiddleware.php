<?php

namespace App\Middlewares;

use Core\Middleware;
use Exception;

class AuthMiddleware extends Middleware
{
    private $adminRight = false;
    private $userModel;
    private $accessTokenName;

    public function __construct($adminRight = false)
    {
        parent::__construct();
        $this->adminRight = $adminRight;
        $this->userModel = $this->model('auth');
        $this->accessTokenName = 'access_token';
    }

    public function handle()
    {
        $accessToken = $this->request->getCookie($this->accessTokenName);
        if (!$accessToken) {
            $this->statusCode = 401;
            $this->message = 'Unauthorized!';
            return false;
        }

        try {
            $decodedPayload = validateJwtToken($accessToken, $_ENV['ACCESS_SECRET_KEY']);

            if (!$this->adminRight) {
                return true;
            }

            $userId = $decodedPayload['userId'];
            $userRole = 'subscriber';
            $userData = $this->userModel->getById($userId);
            if (isset($userData['role'])) {
                $userRole = $userData['role'];
            }
            if ($userRole !== 'admin') {
                $this->statusCode = 403;
                $this->message = 'Forbidden!';
                return false;
            }

            return true;
        } catch (Exception $error) {
            $this->statusCode = 401;
            $this->message = $error->getMessage();

            return false;
        }
    }
}
