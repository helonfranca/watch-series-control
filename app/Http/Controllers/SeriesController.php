<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $series = Serie::where('user_id', $userId)->get(); //Retorna uma coleção

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('img', 'public');
            $dados['imagem'] = $caminhoImagem;
        }

        $dados['user_id'] = $userId;

        Serie::create($dados);

        return redirect('/series');
    }

    public function confirmDelete($id){

        $serie = Serie::find($id);

        return view('series.confirmDelete')->with('serie', $serie);
    }

    public function remover($id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();

        return redirect('/series');
    }

    public function editar($id)
    {
        $serie = Serie::findOrFail($id);
        return view('series.update')->with('serie', $serie);
    }

    public function atualizar(Request $request, $id)
    {
        $serie = Serie::findOrFail($id);
        $dados = $request->except('_token', '_method');

        if (!$request->hasFile('imagem')) {
            unset($dados['imagem']); // Remove o campo 'imagem' dos dados a serem atualizados
        } else {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('img', 'public');
            $dados['imagem'] = $caminhoImagem;
        }

        $serie->update($dados);

        return redirect('/series');
    }

    public function read($id)
    {
        $serie = Serie::findOrFail($id);

        return view('series.visualizar')->with('serie', $serie);
    }
}
