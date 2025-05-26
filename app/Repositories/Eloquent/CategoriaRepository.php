<?php

namespace App\Repositories\Eloquent;

use App\Models\Categoria;
use App\Repositories\Contracts\CategoriaRepositoryInterface;

class CategoriaRepository extends BaseRepository implements CategoriaRepositoryInterface
{
    public function __construct(Categoria $model)
    {
        parent::__construct($model);
    }

    public function findWithCurso($id)
    {
        return $this->model->with('curso')->findOrFail($id);
    }
}