<?php

namespace App\Repositories\Eloquent;

use App\Models\Declaracao;
use App\Repositories\Contracts\DeclaracaoRepositoryInterface;

class DeclaracaoRepository extends BaseRepository implements DeclaracaoRepositoryInterface
{
    public function __construct(Declaracao $model)
    {
        parent::__construct($model);
    }

    public function findWithRelations($id)
    {
        return $this->model->with(['aluno', 'comprovante'])->findOrFail($id);
    }
}