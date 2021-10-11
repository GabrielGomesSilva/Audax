<?php

namespace App\Http\Controllers;

use App\Http\Requests\materiaisrequest;
use Illuminate\Http\Request;
use App\models\ModelAlmoxarifado;
use App\models\User;

class MateriaisController extends Controller
{

    private $objUser;
    private $objmateriais;
    
    public function __construct()
    {
        //$this->objUser = new User();
        $this->objmateriais = new ModelAlmoxarifado();
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$usuarios = $this->objUser->all();
        return view('index', compact('usuarios'));*/
        $material = $this->objmateriais->all();
        return view('materiais', compact('material'));
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createmateriais');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
       $cadastro = $this->objmateriais->create([
            'name'=>$request->name,
            
        ]);

        If($cadastro){
            return redirect('materiais');

        } //Criar um else depois 

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
        $materiaisEdit = $this->objmateriais->find($id);
        return view('createmateriais', compact('materiaisEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        
         $this->objmateriais->where(['id'=>$id])->update([
            'name'=>$request->name,
            


        ]);
        
        return redirect('materiais');


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
        //dd('deletar');
        $this->objmateriais->destroy($id);
        return redirect('materiais');

    }
}
