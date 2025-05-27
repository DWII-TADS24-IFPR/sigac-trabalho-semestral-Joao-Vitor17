<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CursoRepositoryInterface;
use App\Repositories\Contracts\EixoRepositoryInterface;
use App\Repositories\Contracts\NivelRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    protected $cursoRepositorio;
    protected $nivelRepositorio;
    protected $eixoRepositorio;

    public function __construct(CursoRepositoryInterface $cursoRepositorio, NivelRepositoryInterface $nivelRepositorio, EixoRepositoryInterface $eixoRepositorio)
    {
        $this->cursoRepositorio = $cursoRepositorio;
        $this->nivelRepositorio = $nivelRepositorio;
        $this->eixoRepositorio = $eixoRepositorio;
    }

    public function index()
    {
        $cursos = $this->cursoRepositorio->all();
        return view('cursos.index')->with('cursos', $cursos);
    }

    public function create()
    {
        $nivels = $this->nivelRepositorio->all();
        $eixos = $this->eixoRepositorio->all();
        return view('cursos.create')->with(['nivels' => $nivels, 'eixos' => $eixos]);
    }

    public function store(Request $request)
    {
        $cursoValidate = $request->validate([
            'nome' => 'required|string|min:3',
            'sigla' => 'required|string|min:3',
            'total_horas' => 'required|integer|min:100',
            'nivel_id' => [
                'required',
                Rule::exists('nivels', 'id')->whereNull('deleted_at')
            ],
            'eixo_id' => [
                'required',
                Rule::exists('eixos', 'id')->whereNull('deleted_at')
            ]
        ]);

        $curso = $this->cursoRepositorio->create($cursoValidate);
        return redirect()->route('cursos.index')->with(['success' => 'Curso '.$curso->nome.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $curso = $this->cursoRepositorio->findWithNivel($id);
        return view('cursos.show')->with('curso', $curso);
    }

    public function edit(string $id)
    {
        $curso = $this->cursoRepositorio->find($id);
        $nivels = $this->nivelRepositorio->all();
        $eixos = $this->eixoRepositorio->all();
        return view('cursos.edit')->with(['curso' => $curso, 'nivels' => $nivels, 'eixos' => $eixos]);
    }

    public function update(Request $request, string $id)
    {
        $cursoValidate = $request->validate([
            'nome' => 'required|string|min:3',
            'sigla' => 'required|string|min:3',
            'total_horas' => 'required|integer|min:100',
            'nivel_id' => [
                'required',
                Rule::exists('nivels', 'id')->whereNull('deleted_at')
            ],
            'eixo_id' => [
                'required',
                Rule::exists('eixos', 'id')->whereNull('deleted_at')
            ]
        ]);

        $curso = $this->cursoRepositorio->update($id, $cursoValidate);

        if(isset($curso)) {
            return redirect()->route('cursos.index')->with(['success' => 'Curso '.$curso->nome.' atualizado com sucesso!!']);
        }
    }

    public function destroy(string $id)
    {
        $curso = $this->cursoRepositorio->delete($id);
        if(isset($curso)) {
            return redirect()->route('cursos.index')->with(['success' => 'Curso '.$curso->nome.' excluido com sucesso!!']);
        }
    }
}
