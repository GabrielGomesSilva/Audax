<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{url('assets/css/style1.css')}}">
    <link rel="stylesheet" href="{{url('assets/bootstrap5/css/bootstrap.min.css')}}">
    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
  </head>
  <body>


  <div class='dashboard'>
    <div class="linhavertical">
      <div class="dashboard-nav">
          <!--<header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#"
                                                                                    class="brand-logo"><i
                  class="fas fa-anchor"></i> <span>BRAND</span></a></header>-->
          <nav class="dashboard-nav-list">
          @can('administrador')
            <a href="{{url('usuarios')}}" class="dashboard-nav-item" style="text-decoration:none">
            <img src="../../assets/icon/usuarios_icone.svg">
                Usuários 
            </a>                  
              <a href="{{url('materiais')}}" class="dashboard-nav-item" style="text-decoration:none"><img src="../../assets/icon/materiais_icone.svg"> Materiais </a>
            <div class="nav-item-divider"></div>
            
            @elsecan('solicitador')

            <a href="{{url('solicitacao')}}" class="dashboard-nav-item" style="text-decoration:none"><img src="../../assets/icon/solicitacoes_icone.svg"> Solicitações </a>
            <div class="nav-item-divider"></div>

            @elsecan('aprovador')

            <a href="{{url('usuarios')}}" class="dashboard-nav-item" style="text-decoration:none"><img src="../../assets/icon/solicitacoes_icone.svg"> Aprovação </a>
            <div class="nav-item-divider"></div>
            
            
            @endcan


            <a href="#" class="dashboard-nav-item"><img src="../../assets/icon/sair_icone.svg"> 
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <input type="submit" class="btn" value="sair">
                    
                </form> 
            </a>
          </nav>
      </div>
    </div>
    <div class='dashboard-app'>
        <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
        <div class='dashboard-content'>
            

        @yield('content')



        </div>
    </div>
</div>

     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{url('assets/bootstrap5/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/js/javascript.js')}}"></script>
    
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
  </body>
</html>
