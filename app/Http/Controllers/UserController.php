<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\UserRepository;
use Illuminate\Http\Request;

// tài liệu sử dụng repository partern: https://viblo.asia/p/repository-pattern-trong-laravel-924lJGgm5PM
class UserController extends Controller
{

    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->userRepository->getDataByConditions(1);
        echo '<pre>';
        dd($data);
        die('sdf22');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
