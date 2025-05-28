<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Repositories\Contracts\DocumentoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DocumentoController extends Controller
{
    protected $documentoRepositorio;
    protected $categoriaRepositorio;

    public function __construct(DocumentoRepositoryInterface $documentoRepositorio, CategoriaRepositoryInterface $categoriaRepositorio)
    {
        $this->documentoRepositorio = $documentoRepositorio;
        $this->categoriaRepositorio = $categoriaRepositorio;
    }

    public function index()
    {
        $documentos = $this->documentoRepositorio->all();
        return view('documentos.index')->with('documentos', $documentos);
    }

    public function create()
    {
        $categorias = $this->categoriaRepositorio->all();
        return view('documentos.create')->with('categorias', $categorias);
    }

    public function store(Request $request)
    {
        $documentoValidate = $request->validate([
            'documento' => 'required|file|mimes:pdf',
            'descricao' => 'required|string|min:10',
            'horas_in' => 'required|integer|min:3',
            'status' => 'required|string|min:3',
            'comentario' => 'required|string|min:10',
            'horas_out' => 'required|integer|min:3',
            'categoria_id' => [
                'required',
                Rule::exists('categorias', 'id')->whereNull('deleted_at')
            ]
        ]);

        $caminhoUrl = $request->file('documento')->store('documentos', 'public');
        $caminhoUrl = env('APP_URL') . ':8000/storage/' . $caminhoUrl;

        $documentoValidate['url'] = $caminhoUrl;

        $documento = $this->documentoRepositorio->create($documentoValidate);
        return redirect()->route('documentos.index')->with(['success' => 'Documento '.$documento->url.' criado com sucesso!!']);
    }

    public function show(string $id)
    {
        $documento = $this->documentoRepositorio->findWithCategoria($id);
        return view('documentos.show')->with('documento', $documento);
    }

    public function edit(string $id)
    {
        $documento = $this->documentoRepositorio->find($id);
        $categorias = $this->categoriaRepositorio->all();
        return view('documentos.edit')->with(['documento' => $documento, 'categorias' => $categorias]);
    }

    public function update(Request $request, string $id)
    {
        $documentoValidate = $request->validate([
            'url' => 'required|string|min:5',
            'descricao' => 'required|string|min:10',
            'horas_in' => 'required|integer|min:3',
            'status' => 'required|string|min:3',
            'comentario' => 'required|string|min:10',
            'horas_out' => 'required|integer|min:3',
            'categoria_id' => [
                'required',
                Rule::exists('categorias', 'id')->whereNull('deleted_at')
            ]
        ]);

        $documento = $this->documentoRepositorio->update($id, $documentoValidate);
        return redirect()->route('documentos.index')->with(['success' => 'Documento '.$documento->url.' atualizado com sucesso!!']);
    }

    public function destroy(string $id)
    {
        $documento = $this->documentoRepositorio->delete($id);
        if(isset($documento)) {
            return redirect()->route('documentos.index')->with(['success' => 'Documento '.$documento->url.' excluido com sucesso!!']);
        }
    }
}
