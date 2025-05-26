<?php

namespace App\Repositories\Eloquent;

use App\Models\Turma;
use App\Repositories\Contracts\TurmaRepositoryInterface;

class TurmaRepository extends BaseRepository implements TurmaRepositoryInterface
{
    public function __construct(Turma $model)
    {
        parent::__construct($model);
    }

    public function findWithCurso($id)
    {
        return $this->model->with('curso')->findOrFail($id);
    }
}