@extends('index')

<style>
   /* Container dos cards */
   .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Seis colunas em telas grandes */
        gap: 15px;
        justify-content: start; /* Alinha os cards à esquerda */
    }

    /* Estilos do Card */
    .card {
        max-width: 250px; /* Mantém o tamanho uniforme */
        height: 250px; /* Altura fixa para alinhamento */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        overflow: hidden; /* Garante que nada saia do card */
    }

    /* Estilização do título */
    #titulo-card {
        font-size: 1.2rem;
        margin-bottom: 8px;
        white-space: nowrap; /* Evita que o título quebre */
        overflow: hidden;
        text-overflow: ellipsis; /* Adiciona "..." se for muito longo */
        width: 100%;
        color: black
    }

    /* Estilização do texto */
    .card-text {
        font-size: 1rem;
        margin-bottom: 6px;
        word-wrap: break-word; /* Quebra o texto para caber dentro do card */
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
        white-space: nowrap;
        color: black;
    }

    /* Responsividade */
    @media (max-width: 1200px) {
        .card-container {
            grid-template-columns: repeat(4, 1fr); /* 4 colunas em telas médias */
        }
    }

    @media (max-width: 768px) {
        .card-container {
            grid-template-columns: repeat(2, 1fr); /* 2 colunas em telas menores */
        }
    }

    @media (max-width: 480px) {
        .card-container {
            grid-template-columns: repeat(1, 1fr); /* 1 coluna em telas muito pequenas */
        }
    }

</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vitrine</h1>
</div>

<div class="card-container">
    @foreach ($findRegistro as $registro)
        @php
            $dataRegistro = \Carbon\Carbon::parse($registro->data_registro);
            $hoje = \Carbon\Carbon::now();
            $diferencaDias = $hoje->diffInDays($dataRegistro, false);
            $corFundo = $diferencaDias >= 15 ? 'green' : ($diferencaDias > 7 ? 'yellow' : 'red');
        @endphp

        <div class="card" style="background-color: {{ $corFundo }}">
            <h5 class="card-title" id="titulo-card">{{ $registro->nome }}</h5>
            <p class="card-text">{{ $registro->dns }}</p>
            <p class="card-text">{{ $registro->ip }}</p>
            <p class="card-text">{{ $registro->data_registro }}</p>
        </div>
    @endforeach
</div>
