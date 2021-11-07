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
        $produtos = DB::table('produtos')->get()->where('del', 0);
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
        $request->validated();
        $cliente = DB::table('clientes')->where('id', $_POST['id_cliente'])->first();
        $cliente_nome = $cliente->nome;
        $fatura = new Fatura();
        $fatura->nome = $cliente_nome;
        $fatura->status = 1;
        $fatura->observacao = request('observacao');
        $fatura->valor = request('totalFatura');
        $fatura->data_emissao = date("d-m-Y");
        $fatura->save();
        return redirect('/')->with('success', "Emissão Registrada");
       
        
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
    public function show($id)
    {
        $fatura = DB::table('faturas')->where('id', $id)->first();
        return view('bill.show', ['fatura'=> $fatura]);
    }

    public function emitir($id)
    {
        Fatura::where('id', $id)->update(['status' => 2]);
        
        $fatura = DB::table('faturas')->where('id', $id)->first();
        return view('bill.show', ['fatura'=> $fatura]);
    }
    public function cancelar($id)
    {
        Fatura::where('id', $id)->update(['status' => 3]);
        
        $fatura = DB::table('faturas')->where('id', $id)->first();
        return view('bill.show', ['fatura'=> $fatura]);
    }
    public function apagar($id)
    {
        Fatura::where('id', $id)->update(['del' => 1]);
        
        $faturas = DB::table('faturas')->get()->where('del', 0);
        $result = json_decode($faturas, true);
        return view('home.index', ['faturas'=> $result]);
    }
    public function print($id)
    {
        $fatura = DB::table('faturas')->where('id', $id)->first();
        return view('print.index', ['fatura'=> $fatura]);
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
