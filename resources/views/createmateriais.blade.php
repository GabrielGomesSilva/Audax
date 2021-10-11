@extends('templates.template')

@section('content')

@can('administrador')

<div class="container">
    <h1>@if(isset($materiaisEdit))Editar @else Cadastrar material @endif</h1>

    @if(isset($materiaisEdit))
    <form name="formMateriaisEdit" id="formUsuarioEdit" method="POST" action="{{route('materiais.update', $materiaisEdit->id)}}">
        @method('POST')
        @else
        <form id="formmateriais" action="{{url('materiais/store')}}" method="POST">
        @endif
        @csrf
        <div class="row">

            <div class="col-12">
                
                <div class="row">
                <span>Nome do material</span>
                    <input name="name" type="text" value="{{$materiaisEdit->name ?? ''}}">
                </div>
            </div>

            <div class="col-12" style="text-align: right; margin-top:50px;">
                <a href="{{url('materiais')}}"> <button class="btn btn-light" type="button" value="cadastrar"> Cancelar</button></a>
                <input type="submit" class="btn btn-primary" value="Cadastrar material">
            </div>
        </div>
            
            
        </form>
</div>

@endcan



@endsection