<?php

namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Contracts\Repositories\UserRepository;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with('roles')->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function paginate($items = null) {
        return $items;
    }

    public function getDataByConditions($id) {
        return $this->model->where('id', $id)->first();
    }
}

