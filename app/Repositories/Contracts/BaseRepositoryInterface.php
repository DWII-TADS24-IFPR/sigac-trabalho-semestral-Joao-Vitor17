<?php

namespace App\Repositories\Contracts;

interface BaseRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $dados);
    public function update($id, array $dados);
    public function delete($id);
}