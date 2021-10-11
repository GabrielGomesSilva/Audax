<?php
namespace App\Http\SolicitacaoControllers;
namespace App\Http\Controllers;


use App\Http\Requests\usuariosrequest;
use Illuminate\Http\Request;
use App\models\ModelAlmoxarifado;
use App\models\Modelsolicitacao;
use Illuminate\Support\Facades\Hash;
use App\models\User;


class BookController extends Controller
{

    private $objUser;
    private $objmateriais;
    private $objSolicitacao;
    
    public function __construct()
    {
        $this->objUser = new User();
        $this->objmateriais = new ModelAlmoxarifado();
        $this->objSolicitacao = new Modelsolicitacao();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->objUser->all();
        return view('index', compact('usuarios'));

        $material = $this->objmateriais->all();
        return view('materiais', compact('material'));
        
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
    public function store(usuariosrequest $request)
    {
       $cadastro = $this->objUser->create([
            'name'=>$request->name,
            'funcao'=>$request->funcao,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),


        ])->givePermissionTo($request->funcao);

        If($cadastro){
            return redirect('usuarios');

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
        $usuariosEdit = $this->objUser->find($id);
        return view('create', compact('usuariosEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(usuariosrequest $request, $id)
    {
        
         $this->objUser->where(['id'=>$id])->update([
            'name'=>$request->name,
            'funcao'=>$request->funcao,
            'email'=>$request->email,
            'password'=>$request->password,


        ]);
        
        return redirect('usuarios');


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
        $this->objUser->destroy($id);
        return redirect('usuarios');

    }

    public function pesquisa(Request $request){
        $pesquisa = User::where('name', '=', $request->pesquisa)->paginate();
            dd($pesquisa);

        //return view('index', compact('pesquisa'));


    }


}
