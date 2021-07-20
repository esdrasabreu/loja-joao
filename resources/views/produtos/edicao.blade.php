@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/')}}">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>Edição de produtos</h2>
                    <form action="{{route('produtos.update',['produto'=>$produto->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Código</label>
                                <input type="number" class="form-control" name="codigo" required value="{{$produto->codigo}}">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="inputPassword4">Preço</label>
                                <input type="number" name="preco" required value="{{$produto->preco}}" class="form-control" step="0.01" min="0">
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Categoria</label>
                              <input type="text" name="categoria" required value="{{$produto->categoria}}" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Composição</label>
                              <input type="text" name="composicao" required value="{{$produto->composicao}}" class="form-control" cols="30" rows="3">
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputCity">Nome</label>
                                <input type="text" name="nome" class="form-control" required value="{{$produto->nome}}" >
                              </div>
                              <div class="form-group col-md-4">
                                <label>Tamanho</label>
                                <select required name="tamanho" class="form-control">
                                  <option selected >{{$produto->tamanho}}</option>
                                  <option value="PP">PP</option>
                                  <option value="P">P</option>
                                  <option value="M">M</option>
                                  <option value="G">G</option>
                                  <option value="GG">GG</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Quantidade</label>
                                <input type="number" name="quantidade" required value="{{$produto->quantidade}}" class="form-control" >
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
