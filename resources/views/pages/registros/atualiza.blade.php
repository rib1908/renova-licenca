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

<h1 class="titulo">Atualizar Registro</h1>
<form class="form-container" method="POST" action="{{ route('atualizar.registro', $findRegistro->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="InputNome" class="form-label">Nome Registro</label>
      <input type="text" value="{{ isset($findRegistro->nome) ? $findRegistro->nome : old('nome') }}" class="form-control @error('nome') is-invalid @enderror" id="InputNome" name='nome'>
      @if ($errors->has('nome'))
        <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
      @endif
    </div>
    <div class="mb-3">
      <label for="InputDNS" class="form-label">DNS</label>
      <input type="text" value="{{ isset($findRegistro->dns) ? $findRegistro->dns : old('dns') }}" class="form-control @error('dns') is-invalid @enderror" id="InputDNS" name='dns'>
      @if ($errors->has('dns'))
        <div class="invalid-feedback"> {{ $errors->first('dns') }}</div>
      @endif
    </div>
    <div class="mb-3">
       <label for="InputIp" class="form-label">Endereço IP</label>
       <input type="text" value="{{ isset($findRegistro->ip) ? $findRegistro->ip : old('ip') }}" class="form-control @error('ip') is-invalid @enderror" id="InputIp" name='ip'>
       @if ($errors->has('dns'))
        <div class="invalid-feedback"> {{ $errors->first('ip') }}</div>
       @endif
    </div>
    <div class="mb-3">
       <label for="InputData" class="form-label">Data Registro</label>
       <input type="date" value="{{ isset($findRegistro->data_Registro) ? $findRegistro->data_registro : old('data_registro') }}" class="form-control @error('data_registro') is-invalid @enderror" id="InputData" name='data_registro'>
       @if ($errors->has('data_registro'))
        <div class="invalid-feedback"> {{ $errors->first('data_registro') }}</div>
       @endif
    </div>
    <button type="submit" href="" class="btn btn-success">GRAVAR</button>
  </form>
