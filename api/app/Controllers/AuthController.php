<?php

namespace App\Controllers;

use Core\Controller;
use Exception;

class AuthController extends Controller
{
    private $userModel;
    private $accessTokenName = 'access_token';
    private $refreshTokenName = 'refresh_token';

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userModel = $this->model('auth');
    }

    /**
     * User register.
     * 
     * @return  string  json response
     */
    public function register()
    {
        $userData = $this->request->body();
        $validationResult = $this->request->validate($userData, [
            'email' => 'required|email|min:5|max:100|unique:users',
            'password' => 'required|password|min:8|max:20',
            'first_name' => 'required|alpha|min:1|max:50',
            'last_name' => 'required|alpha|min:1|max:50|'
        ]);
        if (!$validationResult) {
            return $this->response->status(400)->json(
                0,
                [],
                $validationResult
            );
        }

        $userData['id'] = uniqid('user');
        $userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);

        $result = $this->userModel->create($userData + ['role' => 'subscriber']);
        if ($result === false) {
            return $this->response->status(500)->json(
                0,
                [],
                'Something was wrong!'
            );
        }

        return $this->response->status(201)->json(
            1,
            [],
            'Register successfully.'
        );
    }

    /**
     * User login.
     * 
     * @return  string  json response
     */
    public function login()
    {
        $userData = $this->request->body();
        $validationResult = $this->request->validate($userData, [
            'email' => 'required|email',
            'password' => 'required|password',
        ]);
        if (!$validationResult) {
            return $this->response->status(400)->json(
                0,
                [],
                $validationResult
            );
        }

        $data = $this->userModel->getByEmail($userData['email']);
        if (empty($data)) {
            return $this->response->status(401)->json(
                0,
                [],
                'Email or password is incorrect!'
            );
        }
        $check = password_verify($userData['password'], $data['password']);
        if ($check) {
            $accessExpireIn = 60 * 60; // expire in 1 hour 
            $accessToken = generateJwtToken($data['id'], $_ENV['ACCESS_SECRET_KEY'], $accessExpireIn);
            $this->response->setCookie($this->accessTokenName, $accessToken, time() + $accessExpireIn);

            $refreshExpireIn = 24 * 60 * 60; // expire in 1 day 
            $refeshToken = generateJwtToken($data['id'], $_ENV['REFRESH_SECRET_KEY'], $refreshExpireIn);
            $this->response->setCookie($this->refreshTokenName, $refeshToken, time() + $refreshExpireIn);

            unset($data['id']);
            unset($data['password']);

            return $this->response->status(200)->json(
                1,
                ['profile' => $data],
                'Login successfully.'
            );
        } else {
            return $this->response->status(401)->json(
                0,
                [],
                'Email or password is incorrect!'
            );
        }
    }

    /**
     * User logout.
     * 
     * @return  mixed
     */
    public function logout()
    {
        $check = $this->response->setCookie($this->accessTokenName, '', time() - 3600);
        $this->response->setCookie($this->refreshTokenName, '', time() - 3600);
        if ($check) {
            return $this->response->status(200)->json(
                1,
                [],
                'Logout successfully.'
            );
        }

        return $this->response->status(204, false);
    }

    /**
     * Refresh.
     * 
     * @return  string  json response
     */
    public function refresh()
    {
        $refeshToken = $this->request->getCookie($this->refreshTokenName);
        if (!$refeshToken) {
            return $this->response->status(401)->json(
                0,
                [],
                'Unauthorized!'
            );
        }

        try {
            $decodedPayload = validateJwtToken($refeshToken, $_ENV['REFRESH_SECRET_KEY']);
            $userId = $decodedPayload['userId'];
            $accessExpireIn = 60 * 60; // expire in 1 hour 
            $accessToken = generateJwtToken($userId, $_ENV['ACCESS_SECRET_KEY'], $accessExpireIn);
            $this->response->setCookie($this->accessTokenName, $accessToken, time() + $accessExpireIn);

            $data = $this->userModel->getById($userId);
            unset($data['id']);
            unset($data['password']);

            return $this->response->status(200)->json(
                1,
                ['profile' => $data],
                'Refresh successfully.'
            );
        } catch (Exception $error) {
            return $this->response->status(401)->json(
                0,
                [],
                'Unauthorized!'
            );
        }
    }

    /**
     * Update profile.
     * 
     * @return  string  json response
     */
    public function updateProfile()
    {
        // todo
    }
}
