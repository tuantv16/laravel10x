<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\UserRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        //$this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo 'Đã vào api post222';
        die('hihi');
    }
}
