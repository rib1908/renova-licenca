@extends('index')

<style>
.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    /* Cada card terá pelo menos 200px, mas cresce se tiver espaço */
    gap: 10px;
    justify-content: center;
    width: 100%;
    padding: 20px;
}

/* Estilo do Card */
.card {
    width: 100%;
    height: 250px; /* Altura fixa ou ajustável */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 15px;
    overflow: hidden;
    background-color: white;
}

/* Título e texto */
#titulo-card {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 8px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: black;
}

.card-text {
    font-size: 1rem;
    text-align: center;
    word-break: break-word;
    color: black;
}
@media (min-width: 2300px) {
    .card-container {
        grid-template-columns: repeat(8, 1fr);
    }
    #titulo-card {
    font-size: 2.0rem;
}
    .card-text {
    font-size: 1.6rem;
}
}

/* Mais colunas em telas bem grandes */
@media (min-width: 1920px) and (max-width: 2299px) {
    .card-container {
        grid-template-columns: repeat(6, 1fr);
    }
    #titulo-card {
    font-size: 1.8rem;
}
    .card-text {
    font-size: 1.4rem;
}
}

@media (min-width: 1500px) and (max-width: 1919px) {
    .card-container {
        grid-template-columns: repeat(6, 1fr);
    }
}

/* Ajuste progressivo conforme a tela diminui */
@media (max-width: 1400px) {
    .card-container {
        grid-template-columns: repeat(5, 1fr);
    }
}

@media (max-width: 1200px) {
    .card-container {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 900px) {
    .card-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 600px) {
    .card-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 400px) {
    .card-container {
        grid-template-columns: repeat(1, 1fr);
    }
}

</style>

<div class="text-bg-primary mb-5 w-100 p-5">
    <div class="card-body">
        <p class="card-text" style="text-align: center; color: white; font-size: 80px;">DNS</p>
    </div>
</div>
<div class="card-container">
    @foreach ($findRegistro as $registro)
        @php
            $dataRegistro = \Carbon\Carbon::parse($registro->data_registro);
            $hoje = \Carbon\Carbon::now();
            $diferencaDias = $hoje->diffInDays($dataRegistro, false);
            $corFundo = $diferencaDias >= 15 ? '#32CD32' : ($diferencaDias > 7 ? '#FF8C00' : 'red');
        @endphp

        <div class="card" style="background-color: {{ $corFundo }}">
            <h5 class="card-title" id="titulo-card">{{ $registro->nome }}</h5>
            <p class="card-text">{{ $registro->dns }}</p>
            <p class="card-text">{{ $registro->ip }}</p>
            <p class="card-text">{{ $registro->data_registro }}</p>
        </div>
    @endforeach
</div>
