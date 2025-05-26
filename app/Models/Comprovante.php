<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comprovante extends Model
{
    use SoftDeletes;

    protected $table = 'comprovantes';
    protected $fillable = ['horas', 'atividade', 'categoria_id', 'aluno_id'];

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }

    public function declaracoes() {
        return $this->hasMany(Declaracao::class);
    }
}
