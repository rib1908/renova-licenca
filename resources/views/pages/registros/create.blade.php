@extends('index')

<style>
.form-container {
  max-width: 800px; /* Define uma largura máxima para o formulário */
  margin: 0 auto;   /* Centraliza horizontalmente */
  padding: 50px;
  border-radius: 10px;
}

.titulo {
  max-width: 1000px; /* Define uma largura máxima  */
  padding-left: 400px ;
  padding-top: 100px ;
}
</style>

<h1 class="titulo">Cadastro Registro</h1>
<form class="form-container" method="POST" action="{{ route('cadastrar.registro') }}">
    @csrf
    <div class="mb-3">
      <label for="InputNome" class="form-label">Nome Registro</label>
      <input type="text" class="form-control @error('nome') is-invalid @enderror" id="InputNome" name='nome'>
    </div>
    <div class="mb-3">
      <label for="InputDNS" class="form-label">DNS</label>
      <input type="text" class="form-control @error('dns') is-invalid @enderror" id="InputDNS" name='dns'>
    </div>
    <div class="mb-3">
       <label for="InputIp" class="form-label">Endereço IP</label>
       <input type="text" class="form-control @error('ip') is-invalid @enderror" id="InputIp" name='ip'>
    </div>
    <div class="mb-3">
       <label for="InputData" class="form-label">Data Registro</label>
       <input type="date" class="form-control @error('data_registro') is-invalid @enderror" id="InputData" name='data_registro'>
    </div>
    <button type="submit" href="" class="btn btn-success">CADASTRAR</button>
  </form>
