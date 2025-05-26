<?php

namespace App\Repositories\Eloquent;

use App\Models\Documento;
use App\Repositories\Contracts\DocumentoRepositoryInterface;

class DocumentoRepository extends BaseRepository implements DocumentoRepositoryInterface
{
    public function __construct(Documento $model)
    {
        parent::__construct($model);
    }

    public function findWithCategoria($id)
    {
        return $this->model->with('categoria')->findOrFail($id);
    }
}