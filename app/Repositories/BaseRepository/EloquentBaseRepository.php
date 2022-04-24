<?php

namespace App\Repositories\BaseRepository;

use Illuminate\Database\Eloquent\Model;

class EloquentBaseRepository implements BaseRepository
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
