<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AlunoRepositoryInterface;
use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Repositories\Contracts\ComprovanteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComprovanteController extends Controller
{
    protected $comprovanteRepositorio;
    protected $categoriaRepositorio;
    protected $alunoRepositorio;

    public function __construct(ComprovanteRepositoryInterface $comprovanteRepositorio, CategoriaRepositoryInterface $categoriaRepositorio, AlunoRepositoryInterface $alunoRepositorio)
    {
        $this->comprovanteRepositorio = $comprovanteRepositorio;
        $this->categoriaRepositorio = $categoriaRepositorio;
        $this->alunoRepositorio = $alunoRepositorio;
    }

    public function index()
    {
        $comprovantes = $this->comprovanteRepositorio->all();
        return view('comprovantes.index')->with('comprovantes', $comprovantes);
    }

    public function create()
    {
        $categorias = $this->categoriaRepositorio->all();
        $alunos = $this->alunoRepositorio->all();
        return view('comprovantes.create')->with(['categorias' => $categorias, 'alunos' => $alunos]);
    }

    public function store(Request $request)
    {
        $comprovanteValidate = $request->validate([
            'horas' => 'required|integer|min:3',
            'atividade' => 'required|string|min:3',
            'categoria_id' => [
                'required',
                Rule::exists('categorias', 'id')->whereNull('deleted_at')
            ],
            'aluno_id' => [
                'required',
                Rule::exists('alunos', 'id')->whereNull('deleted_at')
            ]
        ]);

        $comprovante = $this->comprovanteRepositorio->create($comprovanteValidate);
        return redirect()->route('comprovantes.index')->with(['success' => 'Comprovante '.$comprovante->atividade.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $comprovante = $this->comprovanteRepositorio->findWithRelations($id);
        return view('comprovantes.show')->with('comprovante', $comprovante);
    }

    public function edit(string $id)
    {
        $comprovante = $this->comprovanteRepositorio->find($id);
        $categorias = $this->categoriaRepositorio->all();
        $alunos = $this->alunoRepositorio->all();
        return view('comprovantes.edit')->with(['comprovante' => $comprovante, 'categorias' => $categorias, 'alunos' => $alunos]);
    }

    public function update(Request $request, string $id)
    {
        $comprovanteValidate = $request->validate([
            'horas' => 'required|integer|min:3',
            'atividade' => 'required|string|min:3',
            'categoria_id' => [
                'required',
                Rule::exists('categorias', 'id')->whereNull('deleted_at')
            ],
            'aluno_id' => [
                'required',
                Rule::exists('alunos', 'id')->whereNull('deleted_at')
            ]
        ]);

        $comprovante = $this->comprovanteRepositorio->update($id, $comprovanteValidate);
        return redirect()->route('comprovantes.index')->with(['success' => 'Comprovante '.$comprovante->atividade.' atualizado com sucesso!!']);
    }

    public function destroy(string $id)
    {
        $comprovante = $this->comprovanteRepositorio->delete($id);
        if(isset($comprovante)) {
            return redirect()->route('comprovantes.index')->with(['success' => 'Comprovante '.$comprovante->atividade.' excluido com sucesso!!']);
        }
    }
}
