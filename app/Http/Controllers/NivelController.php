<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Repositories\Contracts\NivelRepositoryInterface;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    protected $nivelRepositorio;

    public function __construct(NivelRepositoryInterface $nivelRepositorio)
    {
        $this->nivelRepositorio = $nivelRepositorio;
    }

    public function index()
    {
        $nivels = $this->nivelRepositorio->all();
        return view('nivels.index')->with('nivels', $nivels);
    }

    public function create()
    {
        return view('nivels.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            ['nome' => 'required|string|min:3']
        );

        $this->nivelRepositorio->create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('nivels.index')->with(['success' => 'Nivel '.$request->nome.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $nivel = $this->nivelRepositorio->find($id);
        return view('nivels.show')->with(['nivel' => $nivel]);
    }

    public function edit(string $id)
    {
        $nivel = $this->nivelRepositorio->find($id);
        return view('nivels.edit')->with(['nivel' => $nivel]);
    }

    public function update(Request $request, string $id)
    {
        $nivel = $request->validate(
            ['nome'=>'required|string|min:3']
        );
        
        $nivel = $this->nivelRepositorio->update($id, $nivel);

        if(isset($nivel)) {
            return redirect()->route('nivels.index')->with(['success' => 'Nivel '.$nivel->nome.' atualizado com sucesso!!']);
        }
    }

    public function destroy(string $id)
    {
        $nivel = $this->nivelRepositorio->delete($id);
        if(isset($nivel)) {
            return redirect()->route('nivels.index')->with(['success' => 'Nivel '.$nivel->nome.' excluido com sucesso!!']);
        }
    }
}
