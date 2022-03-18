<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\impl\BaseInterface;

class UserRepository extends BaseRepository implements BaseInterface
{
    public $table = 'users';
    public function getModel()
    {
        return User::class;
    }
}
