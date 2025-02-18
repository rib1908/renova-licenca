@extends('index')
<style>

#card-nome {
    display: ;
    max-width: 300px; /* Largura máxima do card */
    margin: 1px ; /* Centraliza os cards com uma margem */
    padding: 1px; /* Padding interno */
    background-color: rgb(235, 29, 14) !important; /* Cor verde com a propriedade !important */
    border-radius: 12px; /* Bordas arredondadas */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */


}

#titulo-card {
    color: black; /* Cor do título em branco */
    font-size: 1.4rem; /* Tamanho do título */
    text-align: center;
    margin-bottom: 10px; /* Espaçamento abaixo do título */
}

.card-text {
    color: black; /* Cor do texto em branco */
    font-size: 1.2rem; /* Tamanho do texto */
    text-align: center;
    margin-bottom: 8px; /* Espaçamento entre os textos */
}

.card-body {
    padding: 0; /* Remove o padding extra da body do card */
}


</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Vitrine</h1>
</div>

    <div class="row g-3" >
        @foreach ($findRegistro as $registro)
        <div class="col-md-2">
         <div class="card" id="card-nome">
            <div class="card-body" >
             <h5 class="card-title" id="titulo-card"> {{$registro->nome}} </h5>
            <p class="card-text"> {{$registro->dns}} </p>
            <p class="card-text"> {{$registro->ip}} </p>
            <p class="card-text"> {{$registro->data_registro}} </p>

            </div>
         </div>
        </div>
        @endforeach
    </div>


