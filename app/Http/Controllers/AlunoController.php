<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AlunoRepositoryInterface;
use App\Repositories\Contracts\CursoRepositoryInterface;
use App\Repositories\Contracts\TurmaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AlunoController extends Controller
{
    protected $alunoRepositorio;
    protected $cursoRepositorio;
    protected $turmaRepositorio;

    public function __construct(AlunoRepositoryInterface $alunoRepositorio, CursoRepositoryInterface $cursoRepositorio, TurmaRepositoryInterface $turmaRepositorio)
    {
        $this->alunoRepositorio = $alunoRepositorio;
        $this->cursoRepositorio = $cursoRepositorio;
        $this->turmaRepositorio = $turmaRepositorio;
    }

    public function index()
    {
        $alunos = $this->alunoRepositorio->all();
        return view('alunos.index')->with('alunos', $alunos);
    }

    public function create()
    {
        $cursos = $this->cursoRepositorio->all();
        $turmas = $this->turmaRepositorio->all();
        return view('alunos.create')->with(['cursos' => $cursos, 'turmas' => $turmas]);
    }

    public function store(Request $request)
    {
        $alunoValidate = $request->validate([
            'nome' => 'required|string|min:3',
            'cpf' => 'required|string|min:11',
            'email' => 'required|string|min:10',
            'senha' => 'required|string|min:6',
            'curso_id' => [
                'required',
                Rule::exists('cursos', 'id')->whereNull('deleted_at')
            ],
            'turma_id' => [
                'required',
                Rule::exists('turmas', 'id')->whereNull('deleted_at')
            ]
        ]);

        $aluno = $this->alunoRepositorio->create($alunoValidate);
        return redirect()->route('alunos.index')->with(['success' => 'Aluno '.$aluno->nome.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $aluno = $this->alunoRepositorio->findWithRelations($id);
        return view('alunos.show')->with('aluno', $aluno);
    }

    public function edit(string $id)
    {
        $aluno = $this->alunoRepositorio->find($id);
        $cursos = $this->cursoRepositorio->all();
        $turmas = $this->turmaRepositorio->all();
        return view('alunos.edit')->with(['aluno' => $aluno, 'cursos' => $cursos, 'turmas' => $turmas]);
    }

    public function update(Request $request, string $id)
    {
        $alunoValidate = $request->validate([
            'nome' => 'required|string|min:3',
            'cpf' => 'required|string|min:11',
            'email' => 'required|string|min:10',
            'senha' => 'required|string|min:6',
            'curso_id' => [
                'required',
                Rule::exists('cursos', 'id')->whereNull('deleted_at')
            ],
            'turma_id' => [
                'required',
                Rule::exists('turmas', 'id')->whereNull('deleted_at')
            ]
        ]);

        $aluno = $this->alunoRepositorio->update($id, $alunoValidate);
        return redirect()->route('alunos.index')->with(['success' => 'Aluno '.$aluno->nome.' atualizado com sucesso!!']);
    }

    public function destroy(string $id)
    {
        $aluno = $this->alunoRepositorio->delete($id);
        if(isset($aluno)) {
            return redirect()->route('alunos.index')->with(['success' => 'Aluno '.$aluno->nome.' excluido com sucesso!!']);
        }
    }
}
