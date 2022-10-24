<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $categorias = Categoria::all();

     return response() -> json([
        'status' => 200,
        'mensagem' => __('Lista de categoria retornada'),
        'categorias' => CategoriaResource::collection($categorias)
     ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriaRequest $request)
    {
        //cria objeto
        $categoria = new Categoria();

        //Transfere valores 
        $categoria -> nomedacategoria = $request->nome_da_categoria;

        //Salva
        $categoria->save();

        //Retornar o resultado
        return response() -> json([
            'status'=> 200,
            'mensagem' => __('categoria criada'),
            'categoria'=> new CategoriaResource($categoria)
        ],  200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        // $categoria = Categoria::find($categoria->pkcategoria);

        // return response()-> json ([
        //     'status' => 200,
        //     'mensagem' => __("categoria "),
        // ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoriaRequest $request, Categoria $categoria)
    {
        $categoria = Categoria::find($categoria->pkcategoria);
        $categoria->nomedacategoria = $request->nome_da_categoria;
        $categoria->update();

        return response()->json([
             'status' => 200,
             'mensagem' => __('categoria atualizada')
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria-> delete();

        return response()->json([
            'status' => 200,
            'mensagem' => __('categoria apagada')
        ], 200);
    }
}
