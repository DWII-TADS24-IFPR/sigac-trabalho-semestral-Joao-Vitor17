<?php

namespace App\Repositories\Eloquent;

use App\Models\Comprovante;
use App\Repositories\Contracts\ComprovanteRepositoryInterface;

class ComprovanteRepository extends BaseRepository implements ComprovanteRepositoryInterface
{
    public function __construct(Comprovante $model)
    {
        parent::__construct($model);
    }

    public function findWithRelations($id)
    {
        return $this->model->with(['categoria', 'aluno'])->findOrFail($id);
    }
}