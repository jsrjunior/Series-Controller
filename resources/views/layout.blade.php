<style>
    #cabecalho{
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: darkgray;
    }

    #cabecalho h1{
        top: 25%;
    }

    #menu-bar{
        background-color: #a9a9a9;
        display: flex;
        justify-content: space-between;
        margin: 0 0 1.5rem 0;
    }
    #menu-bar a{
        text-decoration: none;
        margin: 0 2rem 0 2rem;
    }
    .navegacao{
        display: flex;
        font-weight: 300;
    }
    .navegacao a{
        color: black;
    }
    .navegacao a:hover{
        color: black;
        font-weight: 600;
    }
    .control-acess{
        display: flex;
        font-weight: 300;
    }
    .control-acess a:hover{
        font-weight: 600;
    }
    
</style>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Séries</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/d804237bd3.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav id="menu-bar" class="navbar navbar-expand-lg">
        <div class="navegacao">
            <a class="navbar navbar-expand-lg" href="{{ route('series.index') }}">Home</a>
            @auth
                <a href="{{route('series.cadastrar')}}" class="navbar navbar-expand-lg">Adicionar</a>
            @endauth
        </div>
        
        <div class="control-acess">
            @auth
                <a href="/sair" class="text-danger">Sair</a>
            @endauth
            @guest
                <a href="/entrar" class="text-danger">Entrar</a>
            @endguest
        </div>
        

   </nav>
    <div class="container">
        <div id="cabecalho" class="">
            <h1>@yield('cabecalho')</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @yield('conteudo')
    </div>
</body>
</html>
