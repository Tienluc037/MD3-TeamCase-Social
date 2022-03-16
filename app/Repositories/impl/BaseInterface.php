<?php
namespace App\Repositories\impl;
interface BaseInterface
{
    public function getAll();

    public function getById($id);

    public function deleteById($id);
}
