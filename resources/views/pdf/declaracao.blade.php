<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Declaração de Horas Complementares</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 50px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .content {
            text-align: justify;
        }

        .signature {
            margin-top: 60px;
            text-align: center;
        }

        .footer {
            position: absolute;
            bottom: 30px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Instituto Federal do Paraná - Campus Paranaguá</h2>
        <p>CNPJ: 12.345.678/9123-45</p>
        <p>Porto Seguro, 123 - Paranaguá - Paraná</p>
    </div>

    <div class="content">
        <p>
            Declaramos, para os devidos fins, que o(a) aluno(a) <span class="bold">{{ $aluno->nome }}</span>,
            portador do cpf <span class="bold">{{ $aluno->cpf }}</span>, regularmente matriculado(a) no curso de
            <span class="bold">{{ $aluno->curso->nome }}</span>, cumpriu um total de
            <span class="bold">{{ $horasTotal }} horas</span> de atividades complementares.
        </p>

        <p>
            O(A) aluno(a) <span class="bold">{{ $aluno->nome }}</span>
            {{ $cursoConcluido ? 'foi aprovado(a)' : 'não foi aprovado(a)' }}
            na disciplina.
        </p>

        <p>
            Paranaguá, {{ \Carbon\Carbon::now()->format('d') }} de {{ \Carbon\Carbon::now()->translatedFormat('F') }} de {{ \Carbon\Carbon::now()->year }}.
        </p>
    </div>

    <div class="signature">
        ___________________________________________<br>
        Coordenação Acadêmica
    </div>

    <div class="footer">
        Documento gerado eletronicamente. Não necessita de assinatura física.
    </div>
</body>
</html>
