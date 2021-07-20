@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">{{ __('Loja João') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Historico de produtos</h2>
                    <a href="{{url('/')}}">Voltar</a>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Composição</th>
                            <th scope="col">Tamanho</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Operação</th>
                            <th scope="col">Data da Operação</th>
                            <th scope="col">Nome do Usuário</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($historico as $hist)
                      <tr>
                        <th scope="row">{{$hist->codigo}}</th>
                        <td>{{$hist->categoria}}</td>
                        <td>{{$hist->nome}}</td>
                        <td>{{$hist->preco}}</td>
                        <td>{{$hist->composicao}}</td>
                        <td>{{$hist->tamanho}}</td>
                        <td>{{$hist->quantidade}}</td>
                        <td>{{$hist->operacao}}</td>
                        <td>{{$hist->updated_at}}</td>
                        <td>{{$hist->nome_usuario}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
