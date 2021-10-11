@extends('templates.template')

@section('content')

<!--<div class="w3-sidebar w3-bar-block w3-large w3-light-white" style="width:15%">
  <a href="#" class="w3-bar-item w3-button">Usuários</a>
  <a href="#" class="w3-bar-item w3-button">Materias</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>-->



<div class="container margin-top-5">
  @can('administrador')
    <h1 class="text">Usuários</h1>
        <div class="row">
            <div class="col-4">
              <form action="{{route('usuarios.pesquisa')}}" method="POST">
                @csrf
                <input type="text" name="pesquisa" id="">
                  <button type="submit" class="btn btn-primary"><img src="assets/icon/pesquisar_icon.svg"></button> 
              </form>
            </div>
            <div class="col-8" style="text-align: right;">
                <a href="{{url('usuarios/create')}}">
                    <button class="btn btn-primary  text-left">Novo usuario</button>
                </a>
            </div>
        </div>
        <div class="col-12">
          @csrf                  
        <table class="table table-responsive table-bordered  " style="margin-top: 10px;">
          <thead>
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Função</th>
              <th>Ações</th>    
            </tr>
          </thead>
          <tbody>
            @foreach($usuarios as $usuarioss)           
              <tr>
                  <td>{{$usuarioss->name}}</td>
                  <td>{{$usuarioss->email}}</td>
                  <td> {{$usuarioss->funcao}} </td>
                  <td style="display: flex;">                  
                      <a href="{{url("usuarios/$usuarioss->id/edit")}}" ><img src="assets/icon/editar_icon.svg"></a> 

                        <form action="{{route('usuarios.destroy', $usuarioss->id)}}" method="POST" style="width: 1px;">
                          @csrf
                          @method("DELETE")                          
                        <button type="submit" class="btn"><img src="assets/icon/lixo_icon.svg"> </button> 
                        </form>                      
                  </td>                                                  
              </tr> 
            @endforeach
          </tbody>
        </table>
       
    </div>



    @elsecan('solicitador')
    
    
    <h1>Solicitador</h1>


        <div class="row">
            <div class="col-4">
                <input type="search" name="" id="">
                <button type="submit" class="btn btn-primary"><img src="assets/icon/pesquisar_icon.svg"></button>  
            </div>
            <div class="col-8" style="text-align: right;">
                <a href="{{url('solicitacao/create')}}">
                    <button class="btn btn-success text-left">Cadastrar</button>
                </a>
            </div>
        </div>
        <div class="col-12">
          @csrf                  
        <table class="table ">
          <thead>
            <tr>
              <th>Data</th>
              <th>solicitador</th>
              <th>Status</th>
              <th>Ações</th>    
            </tr>
          </thead>
          <tbody>
            
                      
              <tr>
                
                  <td>11/10/2021</td>
                  <td>$solicitacoes->name</td>
                  
                  
                 
                                                                   
              </tr> 
            
          </tbody>
        </table>
       
    </div>

    @elsecan('aprovador')

    <h1>Aprovador</h1>

        <div class="row">
            <div class="col-4">
                <input type="search" name="" id="">
                <button  class="btn btn-primary"><img src="assets/icon/pesquisar_icon.svg"></button> 
            </div>
            <div class="col-8" style="text-align: right;">
                <a href="'solicitacao/create'">
                    <button class="btn btn-primary text-left">Cadastrar</button>
                </a>
            </div>
        </div>
        <div class="col-12">
          @csrf                  
        <table class="table ">
          <thead>
            <tr>
              <th>Nome</th>
              <th>solicitador</th>
              <th>Status</th>
              <th>Ações</th>    
            </tr>
          </thead>
          <tbody>
            
                       
              <tr>
                  <td></td>
                  <td>Gabriel</td>
                  <td>teste</td>
                  <!--<td><a href="//{("usuarios/$usuarioss->id/edit")}}" class="btn btn-primary">Editar </a></td>-->
                  
                                                                   
              </tr> 
            
          </tbody>
        </table>
       
    </div>



    @endcan

</div>



@endsection