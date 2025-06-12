<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\UserRepository;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
class QueryOrmController extends Controller
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
        // Setting 1 user vào 1 role22
        //( Thêm 1 row vào bảng trung gian users_roles)
        // $data = $this->addUserRole(1,8);
        // $data = $this->addUserRole(1,9);
        // Xóa 1 bản ghi trong bảng trung gian users_roles
        //$data = $this->deleteUserRole(1,2);

        // Sửa 1 bản ghi trong bảng trung gian users_roles
        //$data = $this->updateUserRole(1,8);

        // Sửa 1 bản ghi trong bảng trung gian users_roles (dùng sync)
        //$data = $this->updateUserRoleUseSync(1,[3,4,7]);
        // echo '<pre>';
        // var_dump($data);
        // die('sdf2');
    }

    public function addUserRole($userId, $roleId) {
        $user = User::find($userId); // Tìm user theo ID
        return $user->roles()->attach($roleId); // Thêm role vào user
    }

    public function deleteUserRole($userId, $roleId) {
        $user = User::find($userId); // Tìm user theo ID
        return $user->roles()->detach($roleId); // Xóa role vào user
    }

    public function updateUserRole($userId, $roleId) {
        $user = User::find($userId);
        $user->roles()->detach(); // Gỡ bỏ tất cả các roles
        $user->roles()->attach($roleId); // Thêm role mới
    }

    public function updateUserRoleUseSync($userId, $roleId) { //$roleId có thể là 1 mảng (chứ danh sách id)
        $user = User::find($userId); // Tìm user theo ID
        $user->roles()->sync($roleId); // Xóa và thêm

        // lệnh sync này tương đương với 2 lệnh sau
        // $user->roles()->detach(); // Gỡ bỏ tất cả các roles
        // $user->roles()->attach($roleId); // Thêm role mới
    }



}
