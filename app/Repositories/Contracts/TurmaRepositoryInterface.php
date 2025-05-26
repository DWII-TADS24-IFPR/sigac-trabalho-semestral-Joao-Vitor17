<?php

namespace App\Repositories\Contracts;

interface TurmaRepositoryInterface extends BaseRepositoryInterface
{
    public function findWithCurso($id);
}