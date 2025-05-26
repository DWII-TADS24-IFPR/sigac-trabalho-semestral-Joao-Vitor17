<?php

namespace App\Repositories\Contracts;

interface CursoRepositoryInterface extends BaseRepositoryInterface
{
    public function findWithNivel($id);
}