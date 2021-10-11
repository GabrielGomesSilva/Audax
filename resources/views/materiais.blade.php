@extends('templates.template')

    @section('content')

        @can('administrador')
<div class="container">
        <h1 class="text">Materiais</h1>
            
            
                <div class="row">
                    <div class="col-4">
                        <input type="search" name="" id="">
                        <button class="btn btn-primary"><img src="assets/icon/pesquisar_icon.svg"></button> 
                    </div>
                    <div class="col-8" style="text-align: right;">
                        <a href="{{url('materiais/create')}}">
                            <button class="btn btn-primary text-left">Novo material</button>
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    @csrf                  
                    <table class="table table-responsive table-bordered" style="margin-top: 10px;">
                        <thead>
                            <tr>
                            <th >Nome do material</th>
                            <th >Ações</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($material as $materiais)           
                            <tr>
                                <td style="width: 90%;">{{$materiais->name}}</td>
                                
                                <td style="display: flex;" >                  
                                    <a href="{{route('materiais.edit', $materiais->id)}}"><img src="assets/icon/editar_icon.svg"></a>                       
                                    
                                    <form action="{{route('materiais.destroy', $materiais->id)}}" method="POST">
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
</div>





        @endcan



    @endsection