<?php

namespace App\Http\Controllers;
use App\models\User;
use App\Models\Modelsolicitacao;

use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    
    
    private $objUser;
    private $objSolicitacao;
    
    public function __construct()
    {
        $this->objUser = new User();
        $this->objSolicitacao = new Modelsolicitacao();
        
    }
    
    
    /**
     * Display a listing of the resource.
     * 
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitacao = $this->objSolicitacao->all();
        return view('index', compact('solicitacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $cadastro = $this->objSolicitacao->create([
            'name'=>$request->name,
                            

        ]);

        If($cadastro){
            return redirect('solicitacao');

        }


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
    public function edit($id)
    {
        
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
