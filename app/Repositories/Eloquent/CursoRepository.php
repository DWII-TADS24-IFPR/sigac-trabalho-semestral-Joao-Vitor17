<?php

namespace App\Repositories\Eloquent;

use App\Models\Curso;
use App\Repositories\Contracts\CursoRepositoryInterface;

class CursoRepository extends BaseRepository implements CursoRepositoryInterface
{
    public function __construct(Curso $model)
    {
        parent::__construct($model);
    }

    public function findWithNivel($id)
    {
        return $this->model->with('nivel')->findOrFail($id);
    }
}