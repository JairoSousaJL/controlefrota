<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\StoreClienteRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function create()
    {
        return view('admin.cliente.registroCliente');
    }

    public function store(StoreClienteRequest $request){

        $codigo = $request->codigoCliente;
        $cpf = $request->cpfCliente;

        $codigoExiste = Cliente::where('codigoCliente', $codigo)->first();

        if ($codigoExiste) {
            $msg = "Código do cliente ja existe!";
            return redirect()->back()->withErrors( $msg )->withInput();
        }else{
            if ($cpf != null) {
                $cpfExiste = Cliente::where('cpfCliente', $cpf)->first();
                if ($cpfExiste) {
                    $msg = "CPF do cliente ja existe!";
                    return redirect()->back()->withErrors( $msg )->withInput();
                }else{
                    $cliente = Cliente::create([
                        'codigoCliente' => $request->codigoCliente,
                        'cpfCliente' => $request->cpfCliente,
                        'rgCliente' => $request->rgCliente,
                        'nomeCliente' => $request->nomeCliente,
                        'telefoneCliente' => $request->telefoneCliente,
                        'celularCliente' => $request->celularCliente,
                        'emailCliente' => $request->emailCliente,
                        'estadoCliente' => $request->estadoCliente,
                        'cidadeCliente' => $request->cidadeCliente,
                        'bairroCliente' => $request->bairroCliente,
                        'logradouroCliente' => $request->logradouroCliente,
                        'numeroCliente' => $request->numeroCliente,
                        'observacaoCliente' => $request->observacaoCliente,
                    ]);
                    return redirect()->route('painel');
                }
            }else{
                $cliente = Cliente::create([
                    'codigoCliente' => $request->codigoCliente,
                    'cpfCliente' => $request->cpfCliente,
                    'rgCliente' => $request->rgCliente,
                    'nomeCliente' => $request->nomeCliente,
                    'telefoneCliente' => $request->telefoneCliente,
                    'celularCliente' => $request->celularCliente,
                    'emailCliente' => $request->emailCliente,
                    'estadoCliente' => $request->estadoCliente,
                    'cidadeCliente' => $request->cidadeCliente,
                    'bairroCliente' => $request->bairroCliente,
                    'logradouroCliente' => $request->logradouroCliente,
                    'numeroCliente' => $request->numeroCliente,
                    'observacaoCliente' => $request->observacaoCliente,
                ]);
                return redirect()->route('painel');
            }
        }
    }

    public function index(){
        $clientes = DB::table('clientes')->orderBy('nomeCliente')->paginate(10);
        return view('admin.cliente.buscarCliente', compact('clientes'));
    }

    public function show($codigo){
        //PESQUISA E MOSTRA Q PRIMEIRO CLIENTE
        $cliente = Cliente::where('codigoCliente', '=', $codigo)->first();
        if ($cliente) {
            //SE ENCONTRAR
            return view('admin.cliente.mostrarCliente', compact('cliente'));
        }else{
            //SE NÃO ENCONTRAR
            return redirect()->route('clientes');
        }
    }

    public function edit(StoreClienteRequest $request, $codigo){
        
        $cliente = Cliente::where('codigoCliente', $codigo)->first();
        
        if($cliente){
            $cliente->update([
                'rgCliente' => $request->rgCliente,
                'nomeCliente' => $request->nomeCliente,
                'telefoneCliente' => $request->telefoneCliente,
                'celularCliente' => $request->celularCliente,
                'emailCliente' => $request->emailCliente,
                'estadoCliente' => $request->estadoCliente,
                'cidadeCliente' => $request->cidadeCliente,
                'bairroCliente' => $request->bairroCliente,
                'logradouroCliente' => $request->logradouroCliente,
                'numeroCliente' => $request->numeroCliente,
                'observacaoCliente' => $request->observacaoCliente,
            ]);
            return redirect()->route('clientes');
        }
    }

    public function destroy($codigo){
        $cliente = Cliente::where('codigoCliente', '=', $codigo)->first();
        $cliente->delete();
        return redirect()->route('painel');
    }

    public function search(Request $request)
    {
        //$filters = $request->all(); (Pega todos os dados)
        //$filters = $request->except('_token'); (Pega todos os dados menos '_token')
        $filters = $request->except('_token');
        $clientes = Cliente::where('nomeCliente', 'LIKE', "%{$request->consultaCliente}%")->orWhere('codigoCliente', 'LIKE', "%{$request->consultaCliente}%")->orWhere('cpfCliente', 'LIKE', "%{$request->consultaCliente}%")->orderBy('nomeCliente')->paginate(10);
        if ($clientes->isEmpty()) {
            $msg = "Cliente Não Encontrado!";
            return redirect()->back()->withErrors( $msg )->withInput();
        }else{
            return view('admin.cliente.buscarCliente', compact('clientes', 'filters'));
        }
    }
}