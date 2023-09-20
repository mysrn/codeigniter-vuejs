<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Codeigniter\API\ResponseTrait;
use App\Models\UsersModel;

class Users extends BaseController
{
    use ResponseTrait;
    private $users;
    public function __construct()
    {
        $this->users = new UsersModel();
    }
    public function index()
    {
        return $this->respond(['users' => $this->users->findAll()], 200);
    }
}