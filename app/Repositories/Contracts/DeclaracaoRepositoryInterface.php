<?php

namespace App\Repositories\Contracts;

interface DeclaracaoRepositoryInterface extends BaseRepositoryInterface
{
    public function findWithRelations($id);
}