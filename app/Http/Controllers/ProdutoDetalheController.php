<?php

namespace App\Http\Controllers;

use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Produto-detalhe';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$produto_detalhe = ProdutoDetalhe::all();
        $unidades = Unidade::all();
        return view('app.produto-detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        // $unidades = Unidade::all();
        // return view('app.produto-detalhe.edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
