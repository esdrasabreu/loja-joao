<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Historico;
use App\Models\User;
use App\Models\ImagemProduto;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mockery\Generator\Parameter;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::get();
        return view('produtos.lista', ['produtos'=> $produtos]);
    }

    public function new(){
        return view('produtos.cadastro');
    }

    public function add(Request $request){ 
        
        //$request->file('imagem')->store('teste');
        //dd($request->file('imagem'),$request->all());
        $produto = new Produto;
        $produto = $produto->create($request->all());

        $num = count($request->allFiles());
        if($num>3){
            dd('invalido:numero de imagens superior a 3');
        }
        if($num>0 && $num >3){
            for($i=0; $i < count($request->allFiles()['imagem']);$i++){
                $file= $request->allFiles()['imagem'][$i];
                $imagemProduto = new ImagemProduto();
                $imagemProduto->produto_id = $produto->id;
                $imagemProduto->path = $file->store('produtos');
                $imagemProduto->save();
                unset($imagemProduto);
            } 
        }

        $historico = new Historico;
    
        $historico->codigo = $request->codigo;
        $historico->categoria = $request->categoria;
        $historico->nome = $request->nome;
        $historico->preco = $request->preco;
        $historico->composicao = $request->composicao;
        $historico->tamanho = $request->tamanho;
        $historico->quantidade = $request->quantidade;
        $historico->operacao = "insert";
        $historico->nome_usuario = auth()->user()->name;
        //dd($historico);
        $historico->save();

        return Redirect::to('/');
    }
    
    public function edit(Produto $produto){
        return view('produtos.edicao',['produto'=> $produto] );
    }

    public function update(Produto $produto, Request $request){
        $produto = $produto->update($request->all());

        $historico = new Historico;
    
        $historico->codigo = $request->codigo;
        $historico->categoria = $request->categoria;
        $historico->nome = $request->nome;
        $historico->preco = $request->preco;
        $historico->composicao = $request->composicao;
        $historico->tamanho = $request->tamanho;
        $historico->quantidade = $request->quantidade;
        $historico->operacao = "update";
        $historico->nome_usuario = auth()->user()->name;
        //dd($historico);
        $historico->save();

        return Redirect::to('/');
    }
    public function delete(Produto $produto){
        $produto->delete();
        $historico = new Historico;
    
        $historico->codigo = $produto->codigo;
        $historico->categoria = $produto->categoria;
        $historico->nome = $produto->nome;
        $historico->preco = $produto->preco;
        $historico->composicao = $produto->composicao;
        $historico->tamanho = $produto->tamanho;
        $historico->quantidade = $produto->quantidade;
        $historico->operacao = "delete";
        $historico->nome_usuario = auth()->user()->name;
        //dd($historico);
        $historico->save();
        return Redirect::to('/');
    }

    public function historico(){
        $historico = Historico::get();
        return view('produtos.historico', [ 
                    'historico'=>$historico
    ]);
    }
}
