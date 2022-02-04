<style>
    #cabecalho{
        height: 150px;
        display: flex;
        justify-content: center;
        background-color: darkgray;
        margin-bottom: 20px;
    }

    #cabecalho h1{
        position: relative;
        top: 25%;
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
    <div class="container">
        <div id="cabecalho" class="jumbotron">
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
