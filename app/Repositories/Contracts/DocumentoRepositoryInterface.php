<?php

namespace App\Repositories\Contracts;

interface DocumentoRepositoryInterface extends BaseRepositoryInterface
{
    public function findWithCategoria($id);
}