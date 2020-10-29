@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ url('cadastros/novo') }}" class="btn btn-primary">Cadastrar Novo</a> <a href="{{ url('home') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-arrow-left"></i>  voltar</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Lista de Cadastros</h1>
                    
                    @foreach( $cadastros as $C )
                    
                     <div class="card border-success mb-2">
                        <div class="card-body">
                          <h5 class="card-title mb-4">{{ $C->nome }}<a href="cadastros/{{ $C->id }}/edit"><button type="button" class="btn btn-warning" style="float: right;"><i class="fas fa-user-edit"></i></button></a></h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{ $C->email }}</h6>
                          <h6 class="card-text"><strong>Telefone:</strong> {{ $C->telefone }}</h6>
                          <h6 class="card-text"><strong>Data de Nascimento:</strong> {{ $C->data_nascimento }}</h6>
                          <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#exampleModal{{ $C->id }}">Mostrar Curriculo</button>   
                        <form action="cadastros/delete/{{ $C->id }}" method="post">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" style="float: right;"><i class="fas fa-trash-alt"></i></button>
                        </form>                             
                        </div>
                      </div>
                   

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{ $C->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $C->nome }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <iframe src="data:application/pdf;base64,{{ $C->curriculo }}" width="100%" height="600" frameborder="0" allowtransparency="true"></iframe> 
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                   @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
