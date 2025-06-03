<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GerarDeclaracaoController extends Controller
{
    public function emitirDeclaracao()
    {
        $user = Auth::user();
        $documentos = Documento::where('user_id', $user->id)->get();
        $dompdf = new Dompdf();

        $horasTotal = 0;
        $totalHorasCurso = $user->aluno->curso->total_horas;
        $cursoConcluido = false;

        foreach ($documentos as $documento) {
            if($documento->status == 'aprovado') {
                $horasTotal += $documento->horas_out;
            }
        }
        if($horasTotal >= $totalHorasCurso) {
            $cursoConcluido = true;
        }

        $html = View::make('pdf.declaracao', ['aluno' => $user->aluno, 'cursoConcluido' => $cursoConcluido, 'horasTotal' => $horasTotal])->render();
        
        $dompdf->loadHtml($html);

        $dompdf->render();

        $dompdf->stream();
    }
}
