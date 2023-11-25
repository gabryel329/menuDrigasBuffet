<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Produtos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produtos.index');
    }

    public function produtos(Request $request)
    {
        $filtroTipo = $request->query('tipo');

        // Se um tipo foi fornecido, filtre os produtos por tipo
        $query = Produtos::query();
        if ($filtroTipo !== null) {
            $query->where('tipo', $filtroTipo);
        }

        $produtos = $query->get();

        return response()->json(['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }
}
