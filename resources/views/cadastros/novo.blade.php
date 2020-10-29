@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h1>Cadastrar Novo</h1><a href="{{ url('cadastros')}}"><button type="button" class="btn btn-primary" style="float: right;"><i class="fas fa-arrow-left"></i>  Voltar</button></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(Request::is('*/edit'))
                    <form class="form" action="{{ url('cadastros/update') }}/{{ $cadastro->id }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nomeLabel">Nome Completo</label>
                        <input type="text" name="nome" class="form-control" id="nome" value="{{ $cadastro->nome }}" placeholder="Insira seu nome">
                        </div>

                        <div class="form-group">
                            <label for="emailLabel">email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $cadastro->email }}" placeholder="E-Mail">
                        </div>

                        <div class="form-group">
                            <label for="telefoneLabel">Telefone</label>
                            <input type="tel" name="telefone" class="form-control" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" value="{{ $cadastro->telefone }}" placeholder="Insira seu telefone">
                        </div>

                        <div class="form-group">
                            <label for="emailLabel">Data de Nascimento</label>
                            <input name="data_nascimento" id="data_nascimento" value="{{ $cadastro->data_nascimento}} " width="276" /> 
                        </div>

                        <div class="form-group">
                            <label for="arquivo">Adicionar Curriculo</label>
                           <input type="file" name="files" class="form-control-file" id="files"> 
                           <input type="hidden" name="curriculo" class="form-control-file" id="curriculo"> 
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                 </form>
                 @endif
                 @if(Request::is('*/novo'))
                 <form class="form" action="{{ url('cadastros/add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nomeLabel">Nome Completo</label>
                    <input type="text" name="nome" class="form-control" id="nome"  placeholder="Insira seu nome">
                    </div>

                    <div class="form-group">
                        <label for="emailLabel">email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-Mail">
                    </div>

                    <div class="form-group">
                        <label for="telefoneLabel">Telefone</label>
                        <input type="tel" name="telefone" class="form-control" id="telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" placeholder="Insira seu telefone">
                    </div>

                    <div class="form-group">
                        <label for="emailLabel">Data de Nascimento</label>
                        <input name="data_nascimento" id="data_nascimento" width="276" /> 
                    </div>

                    <div class="form-group">
                        <label for="arquivo">Adicionar Curriculo</label>
                       <input type="file" name="files" class="form-control-file" id="files"> 
                       <input type="hidden" name="curriculo" class="form-control-file" id="curriculo"> 
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
             </form>
             @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
        $('#data_nascimento').datepicker({
            uiLibrary: 'bootstrap4'
        });


// Check for the File API support.
if (window.File && window.FileReader && window.FileList && window.Blob) {
  document.getElementById('files').addEventListener('change', handleFileSelect, false);
} else {
  alert('The File APIs are not fully supported in this browser.');
}

function handleFileSelect(evt) {
  var f = evt.target.files[0]; // FileList object
  var reader = new FileReader();
  // Closure to capture the file information.
  reader.onload = (function(theFile) {
    return function(e) {
      var binaryData = e.target.result;
      //Converting Binary Data to base 64
      var base64String = window.btoa(binaryData);
      //showing file converted to base64
      document.getElementById('curriculo').value = base64String;

    };
  })(f);
  // Read in the image file as a data URL.
  reader.readAsBinaryString(f);
}
</script>
@endsection
