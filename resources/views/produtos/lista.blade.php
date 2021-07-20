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

                    <h2>Lista de produtos</h2>
                    
                    <a href="{{url('produtos/new')}}" class="btn btn-success">Cadastrar produtos</button>
                    <a href="{{url('produtos')}}" class="btn btn-secondary">Historico</a>
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
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                          </tr>
                        </thead>
                        <tbody>
                    @foreach ($produtos as $p)
                      <tr>
                        <th scope="row">{{$p->codigo}}</th>
                        <td>{{$p->categoria}}</td>
                        <td>{{$p->nome}}</td>
                        <td>{{$p->preco}}</td>
                        <td>{{$p->composicao}}</td>
                        <td>{{$p->tamanho}}</td>
                        <td>{{$p->quantidade}}</td>
                        <td>
                            <a href="produtos/{{$p->id}}/edit" class="btn btn-warning">Editar</button>
                        </td>
                        <td>
                            <form action="{{route('produtos.destroy', ['produto'=> $p->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="produto" value="{{$p->id}}">
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
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
