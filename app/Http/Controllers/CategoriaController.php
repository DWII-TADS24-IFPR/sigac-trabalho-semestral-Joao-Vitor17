<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Repositories\Contracts\CursoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    protected $categoriaRepositorio;
    protected $cursoRepositorio;

    public function __construct(CategoriaRepositoryInterface $categoriaRepositorio, CursoRepositoryInterface $cursoRepositorio)
    {
        $this->categoriaRepositorio = $categoriaRepositorio;
        $this->cursoRepositorio = $cursoRepositorio;
    }

    public function index()
    {
        $categorias = $this->categoriaRepositorio->all();
        return view('categorias.index')->with('categorias', $categorias);
    }

    public function create()
    {
        $cursos = $this->cursoRepositorio->all();
        return view('categorias.create')->with('cursos', $cursos);
    }

    public function store(Request $request)
    {
        $categoriaValidate = $request->validate([
            'nome' => 'required|string|min:3',
            'maximo_horas' => 'required|integer|min:50',
            'curso_id' => [
                'required',
                Rule::exists('cursos', 'id')->whereNull('deleted_at')
            ]
        ]);

        $categoria = $this->categoriaRepositorio->create($categoriaValidate);
        return redirect()->route('categorias.index')->with(['success' => 'Categoria '.$categoria->nome.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $categoria = $this->categoriaRepositorio->findWithCurso($id);
        return view('categorias.show')->with('categoria', $categoria);
    }

    public function edit(string $id)
    {
        $categoria = $this->categoriaRepositorio->find($id);
        $cursos = $this->cursoRepositorio->all();
        return view('categorias.edit')->with(['categoria' => $categoria, 'cursos' => $cursos]);
    }

    public function update(Request $request, string $id)
    {
        $categoriaValidate = $request->validate([
            'nome' => 'required|string|min:3',
            'maximo_horas' => 'required|integer|min:50',
            'curso_id' => [
                'required',
                Rule::exists('cursos', 'id')->whereNull('deleted_at')
            ]
        ]);

        $categoria = $this->categoriaRepositorio->update($id, $categoriaValidate);

        if(isset($categoria)) {
            return redirect()->route('categorias.index')->with(['success' => 'Categoria '.$categoria->nome.' atualizada com sucesso!!']);
        }
    }

    public function destroy(string $id)
    {
        $categoria = $this->categoriaRepositorio->delete($id);
        if(isset($categoria)) {
            return redirect()->route('categorias.index')->with(['success' => 'Categoria '.$categoria->nome.' excluida com sucesso!!']);
        }
    }
}
