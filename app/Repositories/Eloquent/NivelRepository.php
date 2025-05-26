<?php

namespace App\Repositories\Eloquent;

use App\Models\Nivel;
use App\Repositories\Contracts\NivelRepositoryInterface;

class NivelRepository extends BaseRepository implements NivelRepositoryInterface
{
    public function __construct(Nivel $model)
    {
        parent::__construct($model);
    }
}