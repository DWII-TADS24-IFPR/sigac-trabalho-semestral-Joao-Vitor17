<?php

namespace App\Repositories\Contracts;

interface ComprovanteRepositoryInterface extends BaseRepositoryInterface
{
    public function findWithRelations($id);
}