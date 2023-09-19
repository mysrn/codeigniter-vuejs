<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use \Firebase\JWT\JWT;

class Auth extends BaseController
{
    use ResponseTrait;
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $this->userModel->where('email', $email)->first();
        $errorMessage = 'Invalid';
        if (is_null($user)) 
            return $this->respond(['error' => $errorMessage.' email'], 401);
        $passwordVerify = password_verify($password, $user['password']);
        if (!$passwordVerify)
            return $this->respond(['error' => $errorMessage.' password'], 401);
        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;
        $payload = [
            'iss' => 'Issuer of the JWT',
            'aud' => 'Audience that the JWT',
            'sub' => 'Subject of the JWT',
            'iat' => $iat,
            'exp' => $exp, 
            'email' => $user['email'],
        ];
        $token = JWT::encode($payload, $key, 'HS256');
        $response = [
            'message' => 'Login success',
            'data' => $user,
            'token' => $token
        ];
        return $this->respond($response, 200);
    }

    public function register()
    {
        $rules = [
            'name' => ['rules' => 'required'],
            'email' => [
                'rules' => 'required|min_length[4]|valid_email|is_unique[users.email]'
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[255]'
            ],
            'confirm_password' => ['rules' => 'matches[password]']
        ];
        if ($this->validate($rules)) {
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => 
                    password_hash($this->request->getvar('password'), 
                        PASSWORD_DEFAULT)
            ];
            $this->userModel->save($data);
            return $this->respond(['message' => 'Register successfully'], 200);
        } else {
            return $this->fail([
                'error' => $this->validator->getErrors(),
                'message' => 'Register successfully'
            ], 409);
        }
    }
}