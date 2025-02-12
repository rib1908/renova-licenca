@extends('index')

<style>

.form-container {
  max-width: 800px; /* Define uma largura máxima para o formulário */
  margin: 0 auto;   /* Centraliza horizontalmente */
  padding: 80px;
  border-radius: 10px;
}

.titulo {
  max-width: 500px; /* Define uma largura máxima  */
  margin: 0 auto;   /* Centraliza horizontalmente */
  padding-top: 100px ;
}

</style>
<h1 class="titulo">Cadastro Registro</h1>
<form class="form-container">

    <div class="mb-3">
      <label for="InputNome" class="form-label">Nome Registro</label>
      <input type="text" class="form-control" id="InputNome" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="InputDNS" class="form-label">DNS</label>
      <input type="text" class="form-control" id="InputDNS" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
       <label for="InputIp" class="form-label">Endereço IP</label>
       <input type="text" class="form-control" id="InputIp" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
       <label for="InputData" class="form-label">Data Registro</label>
       <input type="date" class="form-control" id="InputData" aria-describedby="emailHelp">
    </div>
    <button type="submit" href="" class="btn btn-primary">Submit</button>
  </form>
