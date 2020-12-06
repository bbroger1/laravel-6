<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha View</title>
</head>
<body>
    <h1>Teste de view</h1>
    @foreach ($products as $product)
        <p>Produto: {{$product}}</p>
        <!-- a impressão com duas chaves protege de ataque xrs e a impressão dessa chave e dois pontos de exclamação mantém o formato indicado no controller -->
        <p>Produto: {!! $product !!}</p>
    @endforeach
</body>
</html>
