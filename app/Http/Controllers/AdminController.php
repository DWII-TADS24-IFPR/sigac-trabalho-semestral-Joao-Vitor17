<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\DocumentoRepositoryInterface;

class AdminController extends Controller
{
    protected $documentoRepositorio;

    public function __construct(DocumentoRepositoryInterface $documentoRepositorio)
    {
        $this->documentoRepositorio = $documentoRepositorio;
    }

    public function index()
    {
        $documentos = $this->documentoRepositorio->all()->where('status', 'analise');
        return view('admin')->with('documentos', $documentos);
    }

    public function aprovar(string $id)
    {
        $this->documentoRepositorio->update($id, ['status' => 'aprovado']);
        return redirect()->route('admin')->with(['success' => 'Documento foi aprovado com sucesso!!']);
    }

    public function rejeitar(string $id)
    {
        $this->documentoRepositorio->update($id, ['status' => 'rejeitado']);
        return redirect()->route('admin')->with(['success' => 'Documento foi rejeitado com sucesso!!']);
    }
}
