<?php

namespace App\Repositories\impl;

interface PostInterface
{
    public function store($request);

    public function update($id,$request);
}
