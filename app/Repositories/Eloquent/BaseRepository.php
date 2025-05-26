<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all() {
        return $this->model->all();
    }
    
    public function find($id) {
        return $this->model->find($id);
    }
    
    public function create(array $dados) {
        return $this->model->create($dados);
    }
    
    public function update($id, array $dados) {
        $item = $this->find($id);
        if($item) {
            $item->update($dados);
        }
        return $item;
    }
    
    public function delete($id) {
        $item = $this->find($id);
        if($item) {
            $item->delete();
        }
        return $item;
    }
}