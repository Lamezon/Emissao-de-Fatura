<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaturaRequest;
use App\Models\Fatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = DB::table('produtos')->get();
        $result = json_decode($produtos, true);
        $clientes = DB::table('clientes')->get();
        $result2 = json_decode($clientes, true);
        return view('bill.index', ['produtos'=> $result, 'clientes' => $result2]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FaturaRequest $request)
    {
        var_dump($_POST);
        exit();
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
     * @param  \App\Models\Fatura  $Fatura
     * @return \Illuminate\Http\Response
     */
    public function show(Fatura $Fatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fatura  $Fatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Fatura $Fatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fatura  $Fatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fatura $Fatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fatura  $Fatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fatura $Fatura)
    {
        //
    }
}
