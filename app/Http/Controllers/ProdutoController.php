<?php

namespace App\Http\Controllers;

use App\Models\Produto as Produto;
use App\Http\Resources\Produto as ProdutoResource;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::paginate(15);
        return ProdutoResource::collection($produtos);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $produto = new Produto;
        $produto->name = $request->input('name');
        $produto->preco = $request->input('preco');
        $produto->qnty = $request->input('qnty');

        if($produto->save()){
            return new ProdutoResource($produto);
        }
    }


    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return new ProdutoResource($produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($request->id);
        $produto->name = $request->input('name');
        $produto->preco = $request->input('preco');
        $produto->qnty = $request->input('qnty');

        if($produto->save()){
            return new ProdutoResource($produto);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        if($produto->delete()){
            return new ProdutoResource($produto);
        }
    }
}
