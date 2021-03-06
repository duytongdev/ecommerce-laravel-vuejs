<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    abstract public function model();

    public function __construct()
    {
        $this->model = app($this->model());
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($perPage)
    {
        return $this->model->paginate($perPage);
    }

    public function store($attributes)
    {
        return $this->model->create($attributes);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($attributes, $id)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    public function destroy($ids)
    {
        return $this->model->destroy(explode(',', $ids));
    }
}
