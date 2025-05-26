<?php

namespace App\Repositories\Contracts;

interface AlunoRepositoryInterface extends BaseRepositoryInterface
{
    public function findWithRelations($id);
}