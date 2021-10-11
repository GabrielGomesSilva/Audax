@extends('templates.template')

@section('content')
  <div class="container ">
    <div class="row">
      
      <div class="col-10">
@can('administrador')
<h1 class=""> @if(isset($usuariosEdit))Editar @else Cadastrar usuário @endif </h1>
<div class="col-12 m-auto">
    @if(isset($errors)&& count($errors)>0)
    <div class="text-center mt-4 mb-4 p-2 alert-danger">
      @foreach($errors->all() as $erro)
        {{$erro}}<br>
        @endforeach

    </div>
    @endif

    @if(isset($usuariosEdit))
      <form name="formUsuarioEdit" id="formUsuarioEdit" method="POST" action="{{url("usuarios/$usuariosEdit->id")}}">
        @method('POST')
    @else
      <form name="formUsuario" id="formUsuario" method="POST" action="{{url('usuarios/store')}}">
    @endif

 
    @csrf
    <div class="row">
      <div class="col-6">
      <span>Nome</span>
        <input class="form-control" type="text" name="name" id="nomeusuario" value="{{$usuariosEdit->name ?? ''}}" >
      </div>

      <div class="col-6">
      <span>Função</span>
        <select class="form-control" type="text" name="funcao" >
            <option value="administrador ">administrador</option>
            <option value="solicitador">solicitador</option>
            <option value="aprovador">aprovador</option>
        </select>
      </div>

      
    </div>

    <div class="row">
      <div class="col-6">
        <span>E-mail</span>
          <input class="form-control" type="text" name="email" id="emailusuario"  value="{{$usuariosEdit->email ?? ''}}" >
      </div>

      <div class="col-6">
      <span>Senha</span>
          <input class="form-control" type="password" name="password" id="senhausuario"  value="{{$usuariosEdit->password ?? ''}}" >
      </div>
    </div>

    <div style="text-align: right; margin-top:50px;">
    <a href="{{url('usuarios')}}"> <button class="btn btn-light" type="button" value="cadastrar"> Cancelar</button></a>
      <input class="btn btn-primary" type="submit" value="@if(isset($usuariosEdit))Editar @else Cadastrar usuário @endif">
      
    </div>

  </form>    
</div>

@elsecan('solicitador')
<div class="container">
  <H1>NOVA SOLICITAÇÃO</H1>
  <div class="row">
  <div class="col-12">    

    <form action="{{url('solicitacao/store')}}" method="POST">
    @csrf
      <input type="checkbox" value="vassoura" name="name"><label>Vassouras</label>
      <input type="checkbox" value="rodo" name="name"><label>rodo</label>
      <input type="checkbox" value="flanela" name="name"><label>flanela</label>
      <input type="checkbox" value="desifentante" name="name"><label>desifentante</label>
      <input type="checkbox" value="detergente" name="name"><label>detergente</label>
      <input type="checkbox" value="Palhadeaco" name="name"><label>Palhadeaco</label>
      <input type="checkbox" value="balde" name="name"><label>balde</label>
      <input type="submit" class="btn btn-primary">


    </form>
    </div>
  </div>
  </div>
  @elsecan('aprovador')
    
  <h1>VISUALIZAR SOLICITAÇÃO</h1>



</div>
</div>
</div>


@endcan




@endsection