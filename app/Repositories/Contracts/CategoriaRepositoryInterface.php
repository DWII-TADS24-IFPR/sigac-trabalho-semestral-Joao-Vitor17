<?php

namespace App\Repositories\Contracts;

interface CategoriaRepositoryInterface extends BaseRepositoryInterface
{
    public function findWithCurso($id);
}