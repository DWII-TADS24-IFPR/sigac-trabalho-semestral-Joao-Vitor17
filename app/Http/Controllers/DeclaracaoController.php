<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AlunoRepositoryInterface;
use App\Repositories\Contracts\ComprovanteRepositoryInterface;
use App\Repositories\Contracts\DeclaracaoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DeclaracaoController extends Controller
{
    protected $declaracaoRepositorio;
    protected $alunoRepositorio;
    protected $comprovanteRepositorio;

    public function __construct(DeclaracaoRepositoryInterface $declaracaoRepositorio, AlunoRepositoryInterface $alunoRepositorio, ComprovanteRepositoryInterface $comprovanteRepositorio)
    {
        $this->declaracaoRepositorio = $declaracaoRepositorio;
        $this->alunoRepositorio = $alunoRepositorio;
        $this->comprovanteRepositorio = $comprovanteRepositorio;
    }

    public function index()
    {
        $declaracoes = $this->declaracaoRepositorio->all();
        return view('declaracoes.index')->with('declaracoes', $declaracoes);
    }

    public function create()
    {
        $alunos = $this->alunoRepositorio->all();
        $comprovantes = $this->comprovanteRepositorio->all();
        return view('declaracoes.create')->with(['alunos' => $alunos, 'comprovantes' => $comprovantes]);
    }

    public function store(Request $request)
    {
        $declaracaoValidate = $request->validate([
            'hash' => 'required|string|min:3',
            'data' => 'required|string|min:10',
            'aluno_id' => [
                'required',
                Rule::exists('alunos', 'id')->whereNull('deleted_at')
            ],
            'comprovante_id' => [
                'required',
                Rule::exists('comprovantes', 'id')->whereNull('deleted_at')
            ],
        ]);

        $declaracao = $this->declaracaoRepositorio->create($declaracaoValidate);
        return redirect()->route('declaracoes.index')->with(['success' => 'Declaração '.$declaracao->hash.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $declaracao = $this->declaracaoRepositorio->findWithRelations($id);
        return view('declaracoes.show')->with('declaracao', $declaracao);
    }

    public function edit(string $id)
    {
        $declaracao = $this->declaracaoRepositorio->find($id);
        $alunos = $this->alunoRepositorio->all();
        $comprovantes = $this->comprovanteRepositorio->all();
        return view('declaracoes.edit')->with(['declaracao' => $declaracao, 'alunos' => $alunos, 'comprovantes' => $comprovantes]);
    }

    public function update(Request $request, string $id)
    {
        $declaracaoValidate = $request->validate([
            'hash' => 'required|string|min:3',
            'data' => 'required|string|min:10',
            'aluno_id' => [
                'required',
                Rule::exists('alunos', 'id')->whereNull('deleted_at')
            ],
            'comprovante_id' => [
                'required',
                Rule::exists('comprovantes', 'id')->whereNull('deleted_at')
            ],
        ]);

        $declaracao = $this->declaracaoRepositorio->update($id, $declaracaoValidate);
        return redirect()->route('declaracoes.index')->with(['success' => 'Declaração '.$declaracao->hash.' atualizado com sucesso!!']);
    }

    public function destroy(string $id)
    {
        $declaracao = $this->declaracaoRepositorio->delete($id);
        if(isset($declaracao)) {
            return redirect()->route('declaracoes.index')->with(['success' => 'Declaração '.$declaracao->hash.' excluido com sucesso!!']);
        }
    }
}
