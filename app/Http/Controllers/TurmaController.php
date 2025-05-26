<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CursoRepositoryInterface;
use App\Repositories\Contracts\TurmaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TurmaController extends Controller
{
    protected $turmaRepositorio;
    protected $cursoRepositorio;

    public function __construct(TurmaRepositoryInterface $turmaRepositorio, CursoRepositoryInterface $cursoRepositorio)
    {
        $this->turmaRepositorio = $turmaRepositorio;
        $this->cursoRepositorio = $cursoRepositorio;
    }

    public function index()
    {
        $turmas = $this->turmaRepositorio->all();
        return view('turmas.index')->with('turmas', $turmas);
    }

    public function create()
    {
        $cursos = $this->cursoRepositorio->all();
        return view('turmas.create')->with('cursos', $cursos);
    }

    public function store(Request $request)
    {
        $turmaValidate = $request->validate([
            'ano' => [
                'required',
                'integer',
                'digits:4',
                'min:2000',
                'max:'.date('Y'),
            ],
            'curso_id' => [
                'required',
                Rule::exists('cursos', 'id')->whereNull('deleted_at')
            ]
        ]);

        $turma = $this->turmaRepositorio->create($turmaValidate);
        return redirect()->route('turmas.index')->with(['success' => 'Turma do ano: '.$turma->ano.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $turma = $this->turmaRepositorio->findWithCurso($id);
        return view('turmas.show')->with('turma', $turma);
    }

    public function edit(string $id)
    {
        $turma = $this->turmaRepositorio->find($id);
        $cursos = $this->cursoRepositorio->all();
        return view('turmas.edit')->with(['turma' => $turma, 'cursos' => $cursos]);
    }

    public function update(Request $request, string $id)
    {
        $turmaValidate = $request->validate([
            'ano' => [
                'required',
                'integer',
                'digits:4',
                'min:2000',
                'max:'.date('Y'),
            ],
            'curso_id' => [
                'required',
                Rule::exists('cursos', 'id')->whereNull('deleted_at')
            ]
        ]);

        $turma = $this->turmaRepositorio->update($id, $turmaValidate);
        return redirect()->route('turmas.index')->with(['success' => 'Turma do ano: '.$turma->ano.' atualizado com sucesso!!']);
    }

    public function destroy(string $id)
    {
        $turma = $this->turmaRepositorio->delete($id);
        if(isset($turma)) {
            return redirect()->route('turmas.index')->with(['success' => 'Turma do ano: '.$turma->ano.' excluido com sucesso!!']);
        }
    }
}
