<?php

namespace App\Repositories\Eloquent;

use App\Models\Eixo;
use App\Repositories\Contracts\EixoRepositoryInterface;

class EixoRepository extends BaseRepository implements EixoRepositoryInterface
{
    public function __construct(Eixo $model)
    {
        parent::__construct($model);
    }
}