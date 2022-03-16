<?php
namespace App\Repositories;
abstract class BaseRepository
{
    public $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public abstract function getModel();

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function deleteById($id)
    {
        return $this->model->destroy($id);
    }

}
