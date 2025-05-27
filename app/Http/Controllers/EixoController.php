<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\EixoRepositoryInterface;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    protected $eixoRepositorio;

    public function __construct(EixoRepositoryInterface $eixoRepositorio)
    {
        $this->eixoRepositorio = $eixoRepositorio;
    }

    public function index()
    {
        $eixos = $this->eixoRepositorio->all();
        return view('eixos.index')->with('eixos', $eixos);
    }

    public function create()
    {
        return view('eixos.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            ['nome' => 'required|string|min:3']
        );

        $this->eixoRepositorio->create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('eixos.index')->with(['success' => 'Eixo '.$request->nome.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $eixo = $this->eixoRepositorio->find($id);
        return view('eixos.show')->with(['eixo' => $eixo]);
    }

    public function edit(string $id)
    {
        $eixo = $this->eixoRepositorio->find($id);
        return view('eixos.edit')->with(['eixo' => $eixo]);
    }

    public function update(Request $request, string $id)
    {
        $eixo = $request->validate(
            ['nome'=>'required|string|min:3']
        );
        
        $eixo = $this->eixoRepositorio->update($id, $eixo);

        if(isset($eixo)) {
            return redirect()->route('eixos.index')->with(['success' => 'Eixo '.$eixo->nome.' atualizado com sucesso!!']);
        }
    }

    public function destroy(string $id)
    {
        $eixo = $this->eixoRepositorio->delete($id);
        if(isset($eixo)) {
            return redirect()->route('eixos.index')->with(['success' => 'Eixo '.$eixo->nome.' excluido com sucesso!!']);
        }
    }
}
