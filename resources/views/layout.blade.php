<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

{{--    Bootstrap--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

{{--    Font Awesome 6 --}}
    <script src="https://kit.fontawesome.com/b2528d6f09.js" crossorigin="anonymous"></script>

    <title>@yield("titulo")</title>
</head>
<body>

<div class="container-md">

    <div class="jumbotron">
        <h1>@yield("cabecalho")</h1>
    </div>

    @yield("conteudo")


</div>
</body>
</html>
