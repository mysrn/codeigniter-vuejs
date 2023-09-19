<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Codeigniter\API\ResponseTrait;
use App\Models\UserModel;

class User extends BaseController
{
    use ResponseTrait;
    private $users;
    public function __construct()
    {
        $this->users = new UserModel();
    }
    public function index()
    {
        return $this->respond(['users' => $this->users->findAll()], 200);
    }
}